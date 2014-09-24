<?php
class database_manipulation
{

	//member variables - Start

	var $servername;

	var $dbname;

	var $dbusername;

	var $dbpassword;

	var $dbresource_id;

	//member variables - End

	//Constructor - Start

	function database_manipulation($server_name='', $db_name='', $db_username='', $db_password='')
	{

		if(strlen($server_name) <= 0)

		$server_name = $GLOBALS['site_config']['DATABASE_SERVER'];

		if(strlen($db_name) <= 0)

		$db_name = $GLOBALS['site_config']['DATABASE_NAME'];

		if(strlen($db_username) <= 0)

		$db_username = $GLOBALS['site_config']['DATABASE_USERNAME'];

		if(strlen($db_password) <= 0)

		$db_password = $GLOBALS['site_config']['DATABASE_PASSWORD'];

		$this->servername = $server_name;

		$this->dbname = $db_name;

		$this->dbusername = $db_username;

		$this->dbpassword = $db_password;

		$this->dbresource_id = $this->connect_db();
		
		//exit();

	}
	//Constructor - End

	/**********************************************************************************************

							Method To Establish Database Connection.

	***********************************************************************************************/

	function connect_db()
	{

		$error_title = 'Error In Method : database_manipulation::connect_db()';

		$error_str = '';
		
		global $con;
		
		$con = mysql_connect($this->servername,$this->dbusername,$this->dbpassword);

		$error_str .= mysql_error();

		$res = mysql_select_db($this->dbname, $con);

		$error_str .= mysql_error();

		return $con;

	}//end function connect_db

	
	/**********************************************************************************************
	Method to check the uniqueness of a db field value. Like checking uniqueness for email, username, etc
	***********************************************************************************************/
	function record_exists($tbl_name, $chk_flds, $chk_vals, $primary_fld="id", $primary_val="", $while="insert", $use_cond="and")
	{
		$param_array = func_get_args();
		$GLOBALS['logger_obj']->debug('<br>METHOD database_manipulation::record_exists() - PARAMETER LIST : ', $param_array);
		$qry = "select " . $chk_flds . " from " . $tbl_name . " where 1 = 1 ";
		$fld_arr = explode(",", $chk_flds);
		$val_arr = explode(",", $chk_vals);
		$where_part = " and (";
		foreach($fld_arr as $k => $v)
		{
			$where_part .= $v . " = '" . WrapValues(trim($val_arr[$k])) . "' " . $use_cond . " ";
		}
		$where_part = substr($where_part,0,(0 - (strlen($use_cond) + 2))) . ")";
		if($while == "update")
		{
			$where_part .= " and " . $primary_fld . " <> '" . WrapValues(trim($primary_val)) . "'";
		}
		$qry .= $where_part;
		$arr = $this->execute_sql($qry);
		if($arr[1] > 0)
			$ret_val = true;
		else
			$ret_val = false;

		$GLOBALS['logger_obj']->debug('<br>METHOD database_manipulation::record_exists() - Return Value : ', $ret_val);
		return $ret_val;
	}
	

	function execute_sql($qry, $purpose="select")
	{
			
		$error_title = 'Error In Method : database_manipulation::execute_sql()';
			
		$res = mysql_query($qry);
		
		
		
		$error_str = '';

		$error_str .= mysql_error();

		$no_rows = 0;

		switch($purpose)
		{

			case "select":
				
				$no_rows = @mysql_num_rows($res);
				
			break;

			case "insert":

				$no_rows = @mysql_affected_rows();

				$insert_id = mysql_insert_id();

			break;

			case "update":

				$no_rows = @mysql_affected_rows();

			break;

			case "delete":

				$no_rows = @mysql_affected_rows();

			break;

		} //end switch

		$error_str .= mysql_error();
		

		if($purpose == "insert")

			$temp_arr = array($res, $no_rows, $insert_id);

		else

			$temp_arr = array($res, $no_rows);

		if(strlen($error_str) > 0)

		$error_str .= "<br>SQL STATEMENT : " . $qry;
		
		$GLOBALS['logger_obj']->error($error_title, $error_str, 'mysql');

		$GLOBALS['logger_obj']->debug('<br>METHOD database_manipulation::execute_sql() - Return Value : ', $temp_arr, true);
		
		return $temp_arr;

	}

	function insert_sql($obj)
	{
		$initial_qry = "insert into ".$obj->tbl_name." ( ";
		
		$mid_qry = " ) values ( ";
		
		$flds = get_object_vars($obj);
		
		$fld_var_arr = "";
		
		$fld_val_arr = "";
		
		$upload_dir = "";
		
		foreach($flds as $key => $data)
		{
			if(is_array($data))
			{
				if($obj->{$key}['fld_type'] == "image")
				{
					/*if(file_exists($obj->upload_dir))
						$upload_dir = $obj->upload_dir;
					else if(file_exists("..".$obj->upload_dir))
						$upload_dir = "..".$obj->upload_dir;*/
						
					$upload_dir = $obj->upload_dir;
					
					
					if(is_array($obj->{$key}['value']))
					{
						
						foreach($obj->{$key}['value'] as $imgkey => $imgval)
						{
							if(is_array($imgval))
							{
								$filename = basename($imgval['name']);
								$tmp_name = $imgval['tmp_name'];
							}
						}
						if(strlen($filename) > 0 && strlen($tmp_name) > 0)
						{
							$new_file_name = date("YmdHis")."_".$filename;
							
							if(move_uploaded_file($tmp_name,$upload_dir.$new_file_name))
							{
								
								if(strlen($obj->imgcopy) > 0)
								{
									$imgarr = explode("|",$obj->imgcopy);
									if(count($imgarr) > 0)
									{
										
										for($i = 0; $i < count($imgarr); $i++)
										{
											
										
											$resizearr = explode(",",$imgarr[$i]);
											
											if(count($resizearr) == 3)
											{
												if($resizearr[1] != "" && $resizearr[1] > 0 && $resizearr[2] != "" && $resizearr[2] > 0)
												{
													
													$directory = $upload_dir;
													
													$directory = $resizearr[0];
													
													$new_thumb = date("YmdHis")."_".$filename;
													
													ResizeImage($upload_dir.$new_file_name, $directory.$new_thumb, $resizearr[1], $resizearr[2], $obj->exact_resize);
													
												} // end count resize
												
											}
											else
											{
												
												$new_thumb = "th_".date("YmdHis")."_".$filename;
												
												if($resizearr[0] != "" && $resizearr[0] > 0 && $resizearr[1] != "" && $resizearr[1] > 0)
													ResizeImage($upload_dir.$new_file_name, $upload_dir.$new_thumb, $resizearr[0], $resizearr[1], $obj->exact_resize);
												
											}
											
											
										} // end for
										
										//echo count($imgarr);
										//exit();
										
									} // end image arr
									
								} // end image copy
								  
							} // end file upload
							
							$fld_var_arr .= $key.", ";
							$fld_val_arr .= "'".WrapValues($new_file_name)."', ";
							
						}
						
						//move_uploaded_file();
					}
					
				}
				else
				{
					$fld_var_arr .= $key.", ";
					$fld_val_arr .= "'".WrapValues($obj->{$key}['value'])."', ";
				}
			}
		}
		
		$fld_vars = substr($fld_var_arr,0,-2);
		
		$fld_vals = substr($fld_val_arr,0,-2);
		
		$fld_vals .= " )";
		
		/*echo*/ $final_qry = $initial_qry.$fld_vars.$mid_qry.$fld_vals;
		/*exit();*/
		$res = $this->execute_sql($final_qry, "insert");
		
		return $res;		
	}
	
	function update_sql($obj, $where_condition, $keyid, $primary, $param_method='request')
	{

		$initial_qry = "update " . $obj->tbl_name . " set ";

		$fld_arr = get_object_vars($obj);

		$qry_fval_list = "";
		
		foreach($fld_arr as $key => $value)
		{
			
			
			if(is_array($value) && $key != $primary)
				$qry_fval_list .= $key . " = '" . WrapValues($value['value']) . "', ";
			
			/*if(is_array($value) && strlen($value['value']) > 0)
				$qry_fval_list .= $key . " = '" . WrapValues($value['value']) . "', ";*/
			
			
			/*if(is_array($value))
			{	
				if($obj->{$key}['fld_type'] == "image")
				{
							
						$upload_dir = $obj->upload_dir;
						
						
						if(is_array($obj->{$key}['value']))
						{
							
							foreach($obj->{$key}['value'] as $imgkey => $imgval)
							{
								if(is_array($imgval))
								{
									$filename = basename($imgval['name']);
									$tmp_name = $imgval['tmp_name'];
								}
							}
							if(strlen($filename) > 0 && strlen($tmp_name) > 0)
							{
								$new_file_name = date("YmdHis")."_".$filename;
								
								if(move_uploaded_file($tmp_name,$upload_dir.$new_file_name))
								{
									
									if(strlen($obj->imgcopy) > 0)
									{
										$imgarr = explode("|",$obj->imgcopy);
										if(count($imgarr) > 0)
										{
											
											for($i = 0; $i < count($imgarr); $i++)
											{
												
											
												$resizearr = explode(",",$imgarr[$i]);
												
												if(count($resizearr) == 3)
												{
													if($resizearr[1] != "" && $resizearr[1] > 0 && $resizearr[2] != "" && $resizearr[2] > 0)
													{
														
														$directory = $upload_dir;
														
														$directory = $resizearr[0];
														
														$new_thumb = date("YmdHis")."_".$filename;
														
														ResizeImage($upload_dir.$new_file_name, $directory.$new_thumb, $resizearr[1], $resizearr[2], $obj->exact_resize);
														
													} // end count resize
													
												}
												else
												{
													
													$new_thumb = "th_".date("YmdHis")."_".$filename;
													
													if($resizearr[0] != "" && $resizearr[0] > 0 && $resizearr[1] != "" && $resizearr[1] > 0)
														ResizeImage($upload_dir.$new_file_name, $upload_dir.$new_thumb, $resizearr[0], $resizearr[1], $obj->exact_resize);
													
												}
												
												
											} // end for
											
											//echo count($imgarr);
											//exit();
											
										} // end image arr
										
									} // end image copy
									  
								} // end file upload
								
								$qry_fval_list .= $key . " = '" . WrapValues($new_file_name) . "', ";
								
							}
							
							//move_uploaded_file();
						}
							
					} // if image check
					else
					{
						if(strlen($value['value']) > 0)
							$qry_fval_list .= $key . " = '" . WrapValues($value['value']) . "', ";
					}	
			 }	*/	
		
		}
		//exit();
		$qry_fval_list = substr($qry_fval_list, 0, -2);

		/*echo*/ $final_query = $initial_qry . $qry_fval_list . " where " . $where_condition;
		//exit();
		//echo $final_query ;
		$res = $this->execute_sql($final_query,"update");
		
		return $res;
	
	}


	function delete_sql($obj,$val)
	{

		$where = $obj->primary_fld . " = '" . $val . "'";

		$deleted = false;

		$sql = "delete from " . $obj->tbl_name . " where " . $where;

		$res = $this->execute_sql($sql,"delete");

		$temp_res = $res;

		$deleted = true;

		$temp_res[] = $deleted;

		return $deleted;
	}
	
	function fetch_flds($tbl_name, $flds, $where_condition)
	{
		
		$qry = "select " . $flds . " from " . $tbl_name . " where 1 = 1 and " . $where_condition;
		/*if($tbl_name==EMPLOYEE_QUALIFICATION)
		 echo $qry;*/
		$res = $this->execute_sql($qry);

		return $res;

	}
	
	function fetch_field($tbl_name, $flds, $where_condition)
	{

		$qry = "select " . $flds . " from " . $tbl_name . " where 1 = 1 and " . $where_condition;
		/*if($tbl_name=="hrm_calendar"){
		 echo $qry;
		}*/
		$res = $this->execute_sql($qry);
		
		echo mysql_error();
		//print_r($res);

		$data = mysql_fetch_array($res[0]);

		$ret_val = $data[0];

		return $ret_val;

	}

	
	function db_close()
	{
		mysql_close($this->dbresource_id);
	}

}



?>