<?php

/*
 * This file contains the globakl functions that can be used anywhere in the site.
*/


include "code_header.php";

function WrapValues($str)
{
	
	$ret_val = addslashes(stripslashes($str));
	
	return $ret_val;

}

function ShowShortDescription($description_txt, $length)
{
	$temp_arr = explode(" ", $description_txt);
	
	$temp_str = "";
	$final_str = "";
	foreach($temp_arr as $value)
	{
		$temp_str .= $value . " ";

		if(strlen($temp_str) >= $length)
		break;
		
		$final_str = $temp_str;
	}
	
	$final_str .= "...";
	
	return $final_str;
}

function GetIpAddress($purpose="client")
{
	if($purpose == "client")
	
		$ip = (getenv(HTTP_X_FORWARDED_FOR))? getenv(HTTP_X_FORWARDED_FOR):getenv(REMOTE_ADDR);
	
	else
	
		$ip = $_SERVER['SERVER_ADDR'];
		
	return $ip;
}
function SetValues($obj,$param_method='request')
{

	$fld_arr = get_object_vars($obj);
	
	global $param_arr;
	
	switch ($param_method)
	{

		case "request":
			$param_arr = $_REQUEST;
			break;

		case "post":
			$param_arr = $_POST;
			break;

		case "get":
			$param_arr = $_GET;
			break;
		
	}

	foreach($fld_arr as $key => $value)
	{
	
		if(is_array($value))
		{
					
			if(isset($param_arr[$value['frm_fldname']]))
				$new_value = $param_arr[$key];
			else
				$new_value = $obj->{$key}['value'];					

			if($param_method == "csv")
			$obj->{$key}['frm_fld_type'] = "text";
			
			if(!is_array($new_value))
			$obj->{$key}['value'] = trim($new_value);
			else
			$obj->{$key}['value'] = $new_value;
			
			unset($new_value);

		}
	
	}

	return $obj;

}
function FrameNotices($msg_str, $cls_name="greenfont", $concat=0)
{
	if($concat == 1)
	{
		$t_arr = explode("<br>", $_SESSION['ses_msg_str']);
		if(!in_array($msg_str, $t_arr))
			$_SESSION['ses_msg_str'] = $msg_str . "<br>" . $_SESSION['ses_msg_str'];
		
		if(strlen($_SESSION['ses_msg_cls_str']) <= 0)
		$_SESSION['ses_msg_cls_str'] = $cls_name;
	}
	else
	{
		$_SESSION['ses_msg_str'] = $msg_str;
		$_SESSION['ses_msg_cls_str'] = $cls_name;
	}
}

function ConvertDate($date, $format="")
{
	if(strlen($format) <= 0)
	{
		$format = $GLOBALS['site_config']['date_format'];
	}

	if($date == "0000-00-00 00:00:00" || $date == "0000-00-00" || $date == "" || $date == "-- ::" || $date == "--")
	{
		$temp_dt = "";	
	}
	else
	{
		$temp_dt = date($format, strtotime($date));
	}
	return $temp_dt;
}

function TrimText($description_txt, $length=10)
{
	$tmp_text="";
	if(strlen($description_txt) > $length)
	{
	  $tmp_text=substr($description_txt,0,$length)."...";
	}
	else
	{ 
	 $tmp_text=$description_txt;
	}
	$tmp_text = stripslashes($tmp_text);
    return $tmp_text;
}

function EvalPhpContent($eval_str)
{
	preg_match_all("/(<\?php|<\?)(.*?)\?>/si", $eval_str, $raw_php_matches);
	$php_idx = 0;
	while (isset($raw_php_matches[0][$php_idx]))
	{
	 $raw_php_str = $raw_php_matches[0][$php_idx];
	 $raw_php_str = str_replace("<?php", "", $raw_php_str);
	 $raw_php_str = str_replace("?>", "", $raw_php_str);
	 ob_start();
	 eval("$raw_php_str;");
	 $exec_php_str = ob_get_contents();
	 ob_end_clean();
	
	 $eval_str = preg_replace("/(<\?php|<\?)(.*?)\?>/si",
										$exec_php_str, $eval_str, 1);
	 $php_idx++;
	}
    return stripslashes($eval_str);  
}

function CreateRandomPassword()
{
	$num = "0123456789";
	$small = "abcdefghijklmnopqrstuvwxyz";
	srand((double)microtime()*1000000);
	$pass .= rand(0,9);
	for($i = 0; $i <= 3; $i++){
		$pass.=substr($small,rand(0,25),1);	
	}
	for($i = 4;$i <= 5; $i++){
		$pass .= rand(0,9);
	}
	$pass .= substr($small,rand(0,25),1);
	return $pass;
}

function ExportCsv($qry="", $flds="", $heading_cols="", $export_csv_file_path="")
{
	//echo $qry."--";
	$res = database_manipulation::execute_sql($qry);
	$handle = fopen($export_csv_file_path, "w");
	$str = "";
	$fld_arr = @explode(",", $flds);
	$head_col_arr = @explode(",", $heading_cols);
	$flds = @implode("\",\"",$head_col_arr);
	$flds = "\"" . $flds . "\"";
	$str .= $flds . "\r\n";
	
	while($data = @mysql_fetch_assoc($res[0]))
	{
		$str .= "\"";
		for($i = 0; $i < count($fld_arr); $i++)
		{
			$str .= str_replace("\"", "\"\"", $data[trim($fld_arr[$i])]);
			if($i <= (count($fld_arr) - 2))
				$str .= "\",\"";
			else
				$str .= "\"" . "\r\n";
		}
	}
	//exit();
	fwrite($handle, $str);
	fclose($handle);
	chmod($export_csv_file_path, 0777);
	return $export_csv_file_path;
}

function WriteCsv($file_path, $heading_cols, $value_arr, $value_keys_arr)
{
	$handle = fopen($file_path, "w");
	$str = "";
	$head_col_arr = @explode(",", $heading_cols);
	$flds = @implode("\",\"", $head_col_arr);
	$flds = "\"" . $flds . "\"";
	$str .= $flds . "\r\n";
	$cnt = 0;
	foreach($value_arr as $key => $value)
	{
		$str .= "\"";
		$str .= str_replace("\"", "\"\"", trim($value_arr[$value_keys_arr[$key]]));
		if($i <= (count($value_keys_arr) - 2))
			$str .= "\",\"";
		else
			$str .= "\"" . "\r\n";

		$cnt++;
	}
	fwrite($handle, $str);
	fclose($handle);
	chmod($file_path, 0777);
	return $file_path;
}

function DateDiff($dformat, $endDate, $beginDate)
{
    $date_parts1=explode($dformat, $beginDate);
    $date_parts2=explode($dformat, $endDate);
    $start_date=gregoriantojd($date_parts1[1], $date_parts1[2], $date_parts1[0]);
    $end_date=gregoriantojd($date_parts2[1], $date_parts2[2], $date_parts2[0]);
    return $end_date - $start_date;
}

function ResizeImage($thimg, $newthumb, $wth=0, $ht=0, $exact_resize=1)
{

	if($wth>$ht)
			$dimen = $wth;
	else
			$dimen = $ht;
			
	list($thwidth, $thheight, $thtype, $thattr) = getimagesize($thimg);
	$ext = pathinfo($thimg);

	if($thwidth>$thheight)
			$newper = $dimen/$thwidth;
	else
			$newper = $dimen/$thheight;
							
	if($exact_resize == 1)
	{
		$width = $wth;
		$height = $ht;
	}
	else
	{
		$width = round($thwidth*$newper);
		$height = round($thheight*$newper);
	}				

	if(strcasecmp($ext["extension"], "jpg") == 0 || strcasecmp($ext["extension"], "jpeg") == 0)
	{
		$image_p = imagecreatetruecolor($width, $height);
		$image = imagecreatefromjpeg($thimg);
		imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $thwidth, $thheight);
		$ret = imagejpeg($image_p,$newthumb);
	}

	if(strcasecmp($ext["extension"], "gif")==0)
	{
			$image_p = imagecreatetruecolor($width, $height);
			$image = imagecreatefromgif($thimg);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $thwidth, $thheight);
			$ret = imagegif($image_p,$newthumb);
	}

	if(strcasecmp($ext["extension"], "png")==0)
	{
			$image_p = imagecreatetruecolor($width, $height);
			$image = imagecreatefrompng($thimg);
			imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $thwidth, $thheight);
			$ret = imagepng($image_p,$newthumb);
	}

	chmod($newthumb, 0777);
	
	return $ret;

} // end ImageResize

function WriteFile($fpth, $content, $mode='a')
{

	$filename = $fpth;
	
	$bool = true;
	
	if(strlen($content) > 0)
	{
		$err = "";
		if (is_writable($filename)) 
		{
			if (!$handle = fopen($filename, $mode)) 
			{
				 $err .= "Cannot open file ($filename)";
				 $bool = false;
			}
		
			if (fwrite($handle, $content) === FALSE) {
				$err .= "Cannot write to file ($filename)";
			    $bool = false;
			}
			
			fclose($handle);
							
		} 
		else 
		{
			$err .= "The file $filename is not writable";
		    $bool = false;
		}
		
	}
	
	$error_title = 'Error In Method : write_file()';
	
	return $bool;

}//end function write_file

/*function GetUsers($user = 0,$sublev = 0, $ini = 0, $view = '') 
{
	$res = database_manipulation::execute_sql("select * from reny_user where team_id = '".$user."'");
	if($res[1])
	{
		while($item = mysql_fetch_array($res[0]))
		{
			$desc_res = database_manipulation::execute_sql("select shortname, designation_sk from reny_designation where designation_sk='".$item["designation_id"]."'");
			$desc_data = mysql_fetch_array($desc_res[0]);
			$ss='';
			if($sublev!=='0' && $ini == 0)
			{
				for($i=1;$i<=($sublev-5)*5;$i++)
				{
					$ss.='&nbsp;';
				}				
			}
			$sel = '';
			$val = "specific_team_".$item['user_sk'];
			if($view == $item["user_sk"] || $view == $val)
				$sel = 'selected = selected';
			$desc = " [".$desc_data["shortname"]."]";	
			if($desc_data["shortname"] == "CSO" || $desc_data["shortname"] == "BDO" || $desc_data["shortname"] == "DBDM")
			{
				echo "<option value=\"specific_team_".$item['user_sk']."\" ".$sel." style='padding-top:2px; padding-bottom:2px;'>".$ss.$item['fullname']." Team".$desc."</option>\r\n";
				$sel = '';
			}	
			echo "<option value=\"".$item['user_sk']."\" ".$sel." style='padding-top:2px; padding-bottom:2px;'>".$ss.$item['fullname'].$desc."</option>\r\n";
			GetUsers($item['user_sk'],$sublev+1,0,$view);
	   }
	}
}*/

function number_to_words($num){
    $ones = array(
        1 => "one",
        2 => "two",
        3 => "three",
        4 => "four",
        5 => "five",
        6 => "six",
        7 => "seven",
        8 => "eight",
        9 => "nine",
        10 => "ten",
        11 => "eleven",
        12 => "twelve",
        13 => "thirteen",
        14 => "fourteen",
        15 => "fifteen",
        16 => "sixteen",
        17 => "seventeen",
        18 => "eighteen",
        19 => "nineteen"
        );
    $tens = array(
        2 => "twenty",
        3 => "thirty",
        4 => "forty",
        5 => "fifty",
        6 => "sixty",
        7 => "seventy",
        8 => "eighty",
        9 => "ninety"
    );
    $hundreds = array(
        "hundred",
        "thousand",
        "million",
        "billion",
        "trillion",
        "quadrillion"
    );
    $num = number_format($num,2,".",",");
    $num_arr = explode(".",$num);
    $wholenum = $num_arr[0];
    $decnum = $num_arr[1];
    $whole_arr = array_reverse(explode(",",$wholenum));
    krsort($whole_arr);
    $rettxt = "";
    foreach($whole_arr as $key => $i){
        if($i < 20){
            $rettxt .= $ones[$i];
        }elseif($i < 100){
            $rettxt .= $tens[substr($i,0,1)];
            $rettxt .= " ".$ones[substr($i,1,1)];
        }else{
            $rettxt .= $ones[substr($i,0,1)]." ".$hundreds[0];
            $rettxt .= " ".$tens[substr($i,1,1)];
            $rettxt .= " ".$ones[substr($i,2,1)];
        }
        if($key > 0){
            $rettxt .= " ".$hundreds[$key]." ";
        }
    }
    if($decnum > 0){
    $rettxt .= " and ";
        if($decnum < 20){
            $rettxt .= $ones[$decnum];
        }elseif($decnum < 100){
            $rettxt .= $tens[substr($decnum,0,1)];
            $rettxt .= " ".$ones[substr($decnum,1,1)];
        }
    }
    return $rettxt;
}

function convert_number_to_words($amount)
{
	$output_string = '';

	$tokens = explode('.', $amount);
	$current_amount = $tokens[0];
	$fraction = '';
	if(count($tokens) > 1)
	{
		$fraction = (double)('0.' . $tokens[1]);
		$fraction = $fraction * 100;
		$fraction = round($fraction, 0);
		$fraction = (int)$fraction;
		$fraction = translate_to_words($fraction) . ' paise';
		$fraction = ' & ' . $fraction;
	}

	$crore = 0;
	if($current_amount >= pow(10,7))
	{
		$crore = (int)floor($current_amount / pow(10,7));
		$output_string .= translate_to_words($crore) . ' crore ';
		$current_amount = $current_amount - $crore * pow(10,7);
	}

	$lakh = 0;
	if($current_amount >= pow(10,5))
	{
		$lakh = (int)floor($current_amount / pow(10,5));
		$output_string .= translate_to_words($lakh) . ' lakh ';
		$current_amount = $current_amount - $lakh * pow(10,5);
	}

	$current_amount = (int)$current_amount;
	$output_string .= translate_to_words($current_amount);

	$output_string = $output_string . $fraction . ' only';
	$output_string = ucwords($output_string);
	return $output_string;
}

function translate_to_words($number)
{
/*****
	 * A recursive function to turn digits into words
	 * Numbers must be integers from -999,999,999,999 to 999,999,999,999 inclussive.
	 *
	 *  (C) 2010 Peter Ajtai
	 *    This program is free software: you can redistribute it and/or modify
	 *    it under the terms of the GNU General Public License as published by
	 *    the Free Software Foundation, either version 3 of the License, or
	 *    (at your option) any later version.
	 *
	 *    This program is distributed in the hope that it will be useful,
	 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
	 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	 *    GNU General Public License for more details.
	 *
	 *    See the GNU General Public License: <http://www.gnu.org/licenses/>.
	 *
	 */
	// zero is a special case, it cause problems even with typecasting if we don't deal with it here

	$max_size = pow(10,18);
	if (!$number) return "zero";
	if (is_int($number) && $number < abs($max_size))
	{
		$prefix = '';
		$suffix = '';
		switch ($number)
		{
			// set up some rules for converting digits to words

			case $number < 0:
				$prefix = "negative";
				$suffix = translate_to_words(-1*$number);
				$string = $prefix . " " . $suffix;
				break;
			case 1:
				$string = "one";
				break;
			case 2:
				$string = "two";
				break;
			case 3:
				$string = "three";
				break;
			case 4:
				$string = "four";
				break;
			case 5:
				$string = "five";
				break;
			case 6:
				$string = "six";
				break;
			case 7:
				$string = "seven";
				break;
			case 8:
				$string = "eight";
				break;
			case 9:
				$string = "nine";
				break;
			case 10:
				$string = "ten";
				break;
			case 11:
				$string = "eleven";
				break;
			case 12:
				$string = "twelve";
				break;
			case 13:
				$string = "thirteen";
				break;
			// fourteen handled later

			case 15:
				$string = "fifteen";
				break;
			case $number < 20:
				$string = translate_to_words($number%10);
				// eighteen only has one "t"

				if ($number == 18)
				{
				$suffix = "een";
				} else
				{
				$suffix = "teen";
				}
				$string .= $suffix;
				break;
			case 20:
				$string = "twenty";
				break;
			case 30:
				$string = "thirty";
				break;
			case 40:
				$string = "forty";
				break;
			case 50:
				$string = "fifty";
				break;
			case 60:
				$string = "sixty";
				break;
			case 70:
				$string = "seventy";
				break;
			case 80:
				$string = "eighty";
				break;
			case 90:
				$string = "ninety";
				break;
			case $number < 100:
				$prefix = translate_to_words($number-$number%10);
				$suffix = translate_to_words($number%10);
				//$string = $prefix . "-" . $suffix;

				$string = $prefix . " " . $suffix;
				break;
			// handles all number 100 to 999

			case $number < pow(10,3):
				// floor return a float not an integer

				$prefix = translate_to_words(intval(floor($number/pow(10,2)))) . " hundred";
				if ($number%pow(10,2)) $suffix = " and " . translate_to_words($number%pow(10,2));
				$string = $prefix . $suffix;
				break;
			case $number < pow(10,6):
				// floor return a float not an integer

				$prefix = translate_to_words(intval(floor($number/pow(10,3)))) . " thousand";
				if ($number%pow(10,3)) $suffix = translate_to_words($number%pow(10,3));
				$string = $prefix . " " . $suffix;
				break;
		}
	} else
	{
		echo "ERROR with - $number<br/> Number must be an integer between -" . number_format($max_size, 0, ".", ",") . " and " . number_format($max_size, 0, ".", ",") . " exclussive.";
	}
	return $string;
}

function monthPullDown($month, $montharray)
{
	echo "<select name=\"month\">\n";

	$selected[$month - 1] = ' selected="selected"';

	for($i=0;$i < 12; $i++) {
		$val = $i + 1;
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "	<option value=\"$val\"$sel>$montharray[$i]</option>\n";
	}
	echo "</select>\n\n";
}

# ###################################################################

function yearPullDown($year)
{
	echo "<select name=\"year\">\n";

	$selected[$year] = ' selected="selected"';
	$years_before_and_after = 3;
	$start_year = $year - $years_before_and_after;
	$end_year   = $year + $years_before_and_after;

	for($i=$start_year;$i <= $end_year; $i++) {
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "	<option value=\"$i\"$sel>$i</option>\n";
	}
	echo "</select>\n\n";
}

# ###################################################################

function dayPullDown($day)
{
	echo "<select name=\"day\">\n";

	$selected[$day] = ' selected="selected"';

	for($i=1;$i <= 31; $i++) {
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "	<option value=\"$i\"$sel>$i</option>\n";
	}
	echo "</select>\n\n";
}

# ###################################################################

function hourPullDown($hour, $namepre)
{
	echo "\n<select name=\"" . $namepre . "_hour\">\n";
	
	$selected[$hour] = ' selected="selected"';

	for($i=0;$i <= 12; $i++) {
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "	<option value=\"$i\"$sel>$i</option>\n";
	}
	echo "</select>\n\n";
}

# ###################################################################

function minPullDown($min, $namepre)
{
	echo "\n<select name=\"" . $namepre . "_min\">\n";
	
	$selected[$min] = ' selected="selected"';

	for($i=0;$i < 60; $i+=5) {
		$disp_min = sprintf("%02d", $i);
		$sel = (isset($selected[$i])) ? $selected[$i] : "";
		echo "\t<option value=\"$i\"$sel>$disp_min</option>\n";
	}

	echo "</select>\n\n";
}

# ###################################################################

function amPmPullDown($pm, $namepre)
{
	$sel = ' selected="selected"';
	$am  = null;
	if ($pm) { $pm = $sel; } else { $am = $sel; }

	echo "\n<select name=\"" . $namepre . "_am_pm\">\n";
	echo "	<option value=\"0\"$am>am</option>\n";
	echo "	<option value=\"1\"$pm>pm</option>\n";
	echo "</select>\n\n";
}

# ###################################################################

function javaScript($from_page)
{
	if($from_page=="marketing")
		$location="appointments.php?1=1";
	if($from_page=="reports")
		$location="reports.php?action=appointment_dashboard";
?>
	<script language="javascript">
	function submitMonthYear() {
		document.monthYear.method = "post";
		document.monthYear.action = "<?php echo $location; ?>"+
			"&month=" + document.monthYear.month.value + 
			"&year=" + document.monthYear.year.value;
		document.monthYear.submit();
	}
	
	/*function postMessage(day, month, year) {
		eval(
		"page" + day + " = window.open('eventform.php?d=" + day + "&m=" + 
		month + "&y=" + year + "', 'postScreen', 'toolbar=0,scrollbars=1," +
		"location=0,statusbar=0,menubar=0,resizable=1,width=340,height=400');"
		);
	}
	
	function openPosting(pId) {
		eval(
		"page" + pId + " = window.open('eventdisplay.php?id=" + pId + 
		"', 'mssgDisplay', 'toolbar=0,scrollbars=1,location=0,statusbar=0," +
		"menubar=0,resizable=1,width=340,height=400');"
		);
	}
	
	function loginPop(month, year) {
		eval("logpage = window.open('login.php?month=" + month + "&year=" + 
		year + "', 'mssgDisplay', 'toolbar=0,scrollbars=1,location=0," +
		"statusbar=0,menubar=0,resizable=1,width=340,height=400');"
		);
	}*/
	</script>
<?php
}

# ###################################################################

/*function footprint($auth, $m, $y) 
{
	global $lang;

	echo "
	<br><br><span class=\"footprint\">
	phpEventGallery <span style=\"color: #666\">by ikemcg at </span> 
	<a href=\"http://www.ikemcg.com/pec\" target=\"new\">
	ikemcg.com</a><br />\n[ ";
	
	if ( $auth == 2 ) {
		echo "
		<a href=\"useradmin.php\">" . $lang['adminlnk'] . "</a> |
		<a href=\"login.php?action=logout&month=$m&year=$y\">" 
		. $lang['logout'] . "</a>";
	} elseif ( $auth == 1 ) {
		echo "
		<a href=\"useradmin.php?flag=changepw\">" . $lang['changepw'] . "</a> |
		<a href=\"login.php?action=logout&month=$m&year=$y\">"
		 . $lang['logout'] . " </a>";
	} else {
		echo "<a href=\"javascript:loginPop($m, $y)\">"
		. $lang['login'] . "</a>";
	}
	echo " ]</span>";
}
*/
# ###################################################################

function scrollArrows($m, $y)
{
	// set variables for month scrolling
	$nextyear  = ($m != 12) ? $y : $y + 1;
	$prevyear  = ($m != 1)  ? $y : $y - 1;
	$prevmonth = ($m == 1)  ? 12 : $m - 1;
	$nextmonth = ($m == 12) ? 1  : $m + 1;

	return "
	<a href=\"appointments.php?month=" . $prevmonth . "&year=" . $prevyear . "\">
	<img src=\"images/leftArrow.gif\" border=\"0\"></a>
	<a href=\"appointments.php?month=" . $nextmonth . "&year=" . $nextyear . "\">
	<img src=\"images/rightArrow.gif\" border=\"0\"></a>
	";
}

# ###################################################################

function writeCalendar($month, $year, $from_page)
{
	$str = getDayNameHeader();
	$eventdata = getEventDataArray($month, $year);

	# get first row position of first day of month.
	$weekpos = getFirstDayOfMonthPosition($month, $year);

	# get user permission level
	/*$auth = (isset($_SESSION['authdata'])) 
		? $_SESSION['authdata']['userlevel'] 
		: false;*/

	# get number of days in month
	$days = date("t", mktime(0,0,0,$month,1,$year));

	# initialize day variable to zero, unless $weekpos is zero
	if ($weekpos == 0) $day = 1; else $day = 0;
	
	# initialize today's date variables for color change
	$timestamp = mktime() + CURR_TIME_OFFSET * 3600;
	$d = date('j', $timestamp); 
	$m = date('n', $timestamp); 
	$y = date('Y', $timestamp);

	# lookup for testing whether day is today
	$today["$y-$m-$d"] = 1;

	# loop writes empty cells until it reaches position of 1st day of 
	# month ($wPos).  It writes the days, then fills the last row with empty 
	# cells after last day
	while($day <= $days) {
		$str .="<tr>\n";
		
		# write row
		for($i=0;$i < 7; $i++) {
			# if cell is a day of month
			if($day > 0 && $day <= $days) {
				# set css class today if cell represents current date
				$class = (isset($today["$year-$month-$day"])) ? 'today' : 'day';

				$str .= "
				<td class=\"{$class}_cell\" valign=\"top\">
				<span class=\"day_number\">\n";
				
				if($from_page=="marketing")
					$str .= "<a href=\"appointments.php?action=add&day=$day&month=$month&year=$year\">$day</a>";
				if($from_page=="reports")
					$str .= "$day";
									
				$str .= "</span><br>";
				
				if (isset($eventdata[$day]["title"])) {
					// enforce title limit
					$eventcount = count($eventdata[$day]["title"]);
	
					if (MAX_TITLES_DISPLAYED < $eventcount) {
						$eventcount = MAX_TITLES_DISPLAYED;
					}
					
					// write title link if day's postings 
					for($j=0;$j < $eventcount;$j++) {
						$str .= "
						<span class=\"title_txt\">
						-<a href=\"#\" onclick='TINY.box.show({iframe:\"appointment_detail.php?app=". $eventdata[$day]["id"][$j] . "\",boxid:\"frameless\",width:850,height:550,fixed:false,maskid:\"bluemask\",maskopacity:40})' class=\"cust_link\">"
						. $eventdata[$day]["title"][$j] . "</a></span>"
						. $eventdata[$day]["timestr"][$j];
					}
				}

				$str .= "</td>\n";
				$day++;
			} elseif($day == 0)  {
     			$str .= "
				<td class=\"empty_day_cell\" valign=\"top\">&nbsp;</td>\n";
				$weekpos--;
				if ($weekpos == 0) $day++;
     		} else {
				$str .= "
				<td class=\"empty_day_cell\" valign=\"top\">&nbsp;</td>\n";
			}
     	}
		$str .= "</tr>\n\n";
	}
	$str .= "</table>\n\n";
	return $str;
}

# ###################################################################

function getDayNameHeader()
{
	global $lang;

	// adjust day name order if weekstart not Sunday
	if (WEEK_START != 0) {
		for($i=0; $i < WEEK_START; $i++) {
			$tempday = array_shift($lang['abrvdays']);
			array_push($lang['abrvdays'], $tempday);
		}
	}

	$s = "<table cellpadding=\"1\" cellspacing=\"1\" border=\"0\" width=\"100%\">\n<tr>\n";

	foreach($lang['abrvdays'] as $day) {
		$s .= "\t<td class=\"column_header\">&nbsp;$day</td>\n";
	}

	$s .= "</tr>\n\n";
	return $s;
}

# ###################################################################

function getEventDataArray($month, $year)
{
	$eventdata = null;
	
	
	/*$sql = "SELECT id, d, title, start_time, end_time, ";
	
	if (TIME_DISPLAY_FORMAT == "12hr") {
		$sql .= "TIME_FORMAT(start_time, '%l:%i%p') AS stime, ";
		$sql .= "TIME_FORMAT(end_time, '%l:%i%p') AS etime ";
	} elseif (TIME_DISPLAY_FORMAT == "24hr") {
		$sql .= "TIME_FORMAT(start_time, '%H:%i') AS stime, ";
		$sql .= "TIME_FORMAT(end_time, '%H:%i') AS etime ";
	} else {
		echo "Bad time display format, check your configuration file.";
	}
	
	$sql .= "
		FROM " . DB_TABLE_PREFIX . "mssgs WHERE m = $month AND y = $year
		ORDER BY start_time";*/
		//$sql="select * from appointment";
	
	if($month>9)
		$month_new=$month;
	else
		$month_new="0".$month;
	//echo "select * from appointment where active_status=1 and substring(appointment_date,1,7)='".$year."-".$month_new."'";
	$result = mysql_query("select * from appointment where active_status=1 and substring(appointment_date,1,7)='".$year."-".$month_new."'");
	
	while($row = mysql_fetch_array($result)) {
		$day = date("d",strtotime($row["appointment_date"]));
		$eventdata[$day]["id"][] = $row["appointment_sk"];

		# set title string; limit char length and append ellipsis if necessary
		//echo "select companyname from customers where customer_sk=".$row["customer_fk"];
		$rs_title = mysql_query("select companyname from customers where customer_sk=".$row["customer_fk"]);
		$title=mysql_result($rs_title,0,"companyname");
		$eventdata[$day]["title"][] = (strlen($title) > TITLE_CHAR_LIMIT)
			? substr($title, 0, TITLE_CHAR_LIMIT) . '...'
			: $title; 
		$time_array=explode(" ",$row["appointment_date"]);
		$time=$time_array[1]." ".$time_array[2];
		# set time string
		
			$timestr = "<div align=\"right\" class=\"time_str\">$time&nbsp;</div>\n";
		
		$eventdata[$day]["timestr"][] = $timestr;
	}
	return $eventdata;
}

# ###################################################################

function getFirstDayOfMonthPosition($month, $year)
{
	$weekpos = date("w", mktime(0,0,0,$month,1,$year));

	// adjust position if weekstart not Sunday
	if (WEEK_START != 0) {
		if ($weekpos < WEEK_START) {
			$weekpos = $weekpos + 7 - WEEK_START;
		} else {
			$weekpos = $weekpos - WEEK_START;
		}
	}
	return $weekpos;
}

	# ###################################################################
	
	/* backup the db OR just a table */
	function backup_tables()
	{
		$tables = '*';
		//$link = mysql_connect($host,$user,$pass);
		//mysql_select_db($name,$link);
		
		//get all of the tables
		if($tables == '*')
		{
			$tables = array();
			$result = mysql_query('SHOW TABLES');
			while($row = mysql_fetch_row($result))
			{
				$tables[] = $row[0];
			}
		}
		else
		{
			$tables = is_array($tables) ? $tables : explode(',',$tables);
		}
		
		//cycle through
		foreach($tables as $table)
		{
			$result = mysql_query('SELECT * FROM '.$table);
			$num_fields = mysql_num_fields($result);
			
			$return.= 'DROP TABLE '.$table.';';
			$row2 = mysql_fetch_row(mysql_query('SHOW CREATE TABLE '.$table));
			$return.= "\n\n".$row2[1].";\n\n";
			
			for ($i = 0; $i < $num_fields; $i++) 
			{
				while($row = mysql_fetch_row($result))
				{
					$return.= 'INSERT INTO '.$table.' VALUES(';
					for($j=0; $j<$num_fields; $j++) 
					{
						$row[$j] = addslashes($row[$j]);
						$row[$j] = ereg_replace("\n","\\n",$row[$j]);
						if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
						if ($j<($num_fields-1)) { $return.= ','; }
					}
					$return.= ");\n";
				}
			}
			$return.="\n\n\n";
		}
		
		//save file
//		$handle = fopen('backup/db-backup-'.date("dmY-His").'.sql','w+');
		$handle = fopen('backup/db_backup_'.date("Y-m-d").'.sql','w+');
		fwrite($handle,$return);
		fclose($handle);
	}
	
	
function getCurrentLogFileame($typ="err")
{

	$param_array = func_get_args();
	$GLOBALS['logger_obj']->debug('<br>METHOD getCurrentLogFileame() - PARAMETER LIST : ', $param_array);

    $set_file_size=512;
	
	$log_dt = date("mdY");
	
	switch ($typ)
	{
		case "err":
			$tmp_filename = "errorhandler_" . $log_dt;
			$filename = "errorhandler_" . $log_dt . ".html";
			break;

		case "pay":
			$tmp_filename = "payemntlog_" . $log_dt;
			$filename = "payemntlog_" . $log_dt . ".html";
			break;
	
		case "img":
			$tmp_filename = "imagelog_" . $log_dt;
			$filename = "imagelog_" . $log_dt . ".html";
			break;
	
		case "mysql":
			$tmp_filename = "mysqllog_" . $log_dt;
			$filename = "mysqllog_" . $log_dt . ".html";
			break;
	
		case "email":
			$tmp_filename = "emaillog_" . $log_dt;
			$filename = "emaillog_" . $log_dt . ".html";
			break;
	
		case "url":
			$tmp_filename = "urllog_" . $log_dt;
			$filename = "urllog_" . $log_dt . ".html";
			break;
	
		case "ups":
			$tmp_filename = "upslog_" . $log_dt;
			$filename = "upslog_" . $log_dt . ".html";
			break;
	
		case "file":
			$tmp_filename = "file_" . $log_dt;
			$filename = "file_" . $log_dt . ".html";
			break;
			
		case "cron":
			$tmp_filename = "cron_" . $log_dt;
			$filename = "cron_" . $log_dt . ".html";
			break;
			
	} //end switch
	
	$filename = "log/" . $filename;

	if(!file_exists($filename))
	{

		$stylesheet_file = "";
		
		$stext = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'>
		<html>
		<head>
		<title>Logged on " . date("m/d/Y") . "</title>
		<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
		<link href='".$stylesheet_file."' type='text/css' rel='stylesheet'>
		</head>
		<body></body></html>";
		

		$handle = fopen($filename, "w");
		chmod($filename, 0777);

		if (fwrite($handle,$stext) === FALSE) {
				//echo "Cannot write to file ($filename)";
			}
		fclose($handle);
	}
	
	$GLOBALS['logger_obj']->debug('<br>METHOD getCurrentLogFileame() - RETURN VALUE : ', $filename);

	return $filename;
	
}
function deptName($dept)
{
	return $GLOBALS['db_con_obj']->fetch_field(DEPARTMENT,"dept_name","department_sk=".$dept);		
}
function desgName($desg)
{
	return $GLOBALS['db_con_obj']->fetch_field(DESIGNATION,"fullname","designation_sk=".$desg);		
}
function getdeptName($desg)
{
	return $GLOBALS['db_con_obj']->fetch_field(DEPARTMENT,"dept_name","department_sk=(select department_fk from ".EMPLOYEE." where employee_sk='".$desg."')");			
}
function getdesgName($desg)
{
	return $GLOBALS['db_con_obj']->fetch_field(DESIGNATION,"fullname","designation_sk=(select designation_fk from ".EMPLOYEE." where employee_sk='".$desg."')");			
}
function skillName($skill)
{
	//$skills=explode(",",$skill);
	$res_skill = $GLOBALS['db_con_obj']->fetch_flds(SKILL,"skill","skill_sk in(".$skill.")");
	while($res_data=mysql_fetch_object($res_skill[0]))
	{
		$skills.=$res_data->skill.",";
	}
	return substr($skills,0,-1);
}
function qualification($qual)
{
	return $GLOBALS['db_con_obj']->fetch_field(QUALIFICATION,"qualification","qualification_sk=".$qual);		
}

function getCallHistoryDate($callTracking)
{
	return $GLOBALS['db_con_obj']->fetch_field(CALL_TRACKING_HISTORY,"date_of_entry","call_tracking_fk=".$callTracking);
}

function getSelResource($res)
{
	return $GLOBALS['db_con_obj']->fetch_field(CANDIDATE_SKILLLEVEL,"count(*)","joining_status='1' and resource_request_fk=".$res);
}

function getPosition($resource)
{
	return $GLOBALS['db_con_obj']->fetch_field(RESOURCE_REQUEST,"position","resource_request_sk=".$resource);
}

function getNextCallDate($callTracking)
{
	return $GLOBALS['db_con_obj']->fetch_field(CALL_TRACKING_HISTORY,"next_call_date","call_tracking_history_sk=(select max(call_tracking_history_sk) from ".CALL_TRACKING_HISTORY." where  call_tracking_fk='".$callTracking."')");
}
function wage_name($wage)
{
	return $GLOBALS['db_con_obj']->fetch_field(SALARY_STRUCTURE,"name","salary_structure_sk=".$wage);
}	
function empName($empid)
{
	return $GLOBALS['db_con_obj']->fetch_field(EMPLOYEE,"fullname","employee_sk=".$empid);
}
function letTitle($letid)
{
	return $GLOBALS['db_con_obj']->fetch_field(LETTERS,"letter_title","letters_sk=".$letid);
}
function candName($empid)
{
	return $GLOBALS['db_con_obj']->fetch_field(CANDIDATE_SKILLLEVEL,"candidate_name","candidate_sk=".$empid);
}

function getempName($empid)
{
	return $GLOBALS['db_con_obj']->fetch_field(EMPLOYEE,"fullname","employee_sk=(select employee_fk from ".USER." where user_sk='".$empid."')");
}
function userName($empid)
{
	return $GLOBALS['db_con_obj']->fetch_field(USER,"fullname","user_sk=".$empid);
}
function empCode($emp)
{
	return $GLOBALS['db_con_obj']->fetch_field(EMPLOYEE,"employee_id","employee_sk=".$emp);
}

function totEmployee( )
{
	$getEmployee = $GLOBALS['db_con_obj']->fetch_field(EMPLOYEE,"*","delete_status = 0");	
	return @mysql_num_rows($getEmployee);
}
function empGross($empsk)
{
	return $GLOBALS['db_con_obj']->fetch_field(EMPLOYEE,"gross_pay","employee_sk=".$empsk);
}
function shiftName($shift)
{
	return $GLOBALS['db_con_obj']->fetch_field(TIMESLOT,"slot_name","timeslot_sk=".$shift);
}
function fromTime($ftime)
{
	return $GLOBALS['db_con_obj']->fetch_field(TIMESLOT,"from_time","timeslot_sk=".$ftime);
}
function toTime($ttime)
{
	return $GLOBALS['db_con_obj']->fetch_field(TIMESLOT,"to_time","timeslot_sk=".$ttime);
}
function empEarningDeductionShrt($earndeduct)
{
	return $GLOBALS['db_con_obj']->fetch_field(SALARY_STRUCTURE,"short_name","salary_structure_sk=".$earndeduct);
}
function empEarningDeductionName($earndeduct)
{
	return $GLOBALS['db_con_obj']->fetch_field(SALARY_STRUCTURE,"name","salary_structure_sk=".$earndeduct);
}
function getAttendanceStatus($attendanceStatus)
{
	return $GLOBALS['db_con_obj']->fetch_field(ATTENDANCE_STATUS,"attendance_status","attendance_status_sk=".$attendanceStatus);
}

function getEmployeeDesignation($empId)
{
	return $GLOBALS['db_con_obj']->fetch_field(DESIGNATION,"fullname","designation_sk = (select designation_fk from ".EMPLOYEE." where employee_sk =".$empId." )"   );
}

function salaryStructure($struct)
{
	return $GLOBALS['db_con_obj']->fetch_field(SALARY_STRUCTURE,"name","salary_structure_sk=".$struct);
}


function getEmpBankAccNo($empId)
{
	return $GLOBALS['db_con_obj']->fetch_field(EMPLOYEE,"bank_account_number","employee_sk=".$empId);
}

function getEmpBankName($empId)
{
	return $GLOBALS['db_con_obj']->fetch_field(EMPLOYEE,"bank_name","employee_sk=".$empId);
}

function getEmpPanNo($empId)
{
	return $GLOBALS['db_con_obj']->fetch_field(EMPLOYEE,"pan_card","employee_sk=".$empId);
}

function getEmpPFno($empId)
{
	return $GLOBALS['db_con_obj']->fetch_field(EMPLOYEE,"pf_number","employee_sk=".$empId);
}

function getEmpEsiNo($empId)
{
	return $GLOBALS['db_con_obj']->fetch_field(EMPLOYEE,"esic","employee_sk=".$empId);
}

function getCompanyDetails()
{
 	$settings_det = $GLOBALS['db_con_obj']->fetch_flds(SETTINGS,"*","1=1");
	return $set_det = mysql_fetch_object($settings_det[0]);
}
function getLeaveType($leaveId)
{
	return $GLOBALS['db_con_obj']->fetch_field(LEAVE_TYPE,"leave_type","leave_sk=".$leaveId);
}
function getSumGross($emp)
{
	return $GLOBALS['db_con_obj']->fetch_field(SALARYSLIP,"sum(gross_pay)","employee_fk=".$emp);	
}
function getSumDeduct($emp)
{
	return $GLOBALS['db_con_obj']->fetch_field(SALARYSLIP,"sum(deduction)","employee_fk=".$emp);	
}
function getSumNet($emp)
{
	return $GLOBALS['db_con_obj']->fetch_field(SALARYSLIP,"sum(net_pay)","employee_fk=".$emp);	
}
function getSumWorkDay($emp)
{
	return $GLOBALS['db_con_obj']->fetch_field(SALARYSLIP,"sum(working_days)","employee_fk=".$emp);	
}
function getSumPerm($emp)
{
	return $GLOBALS['db_con_obj']->fetch_field(SALARYSLIP,"sum(permission_count)","employee_fk=".$emp);	
}
function getSumPermLimit($emp)
{
	return $GLOBALS['db_con_obj']->fetch_field(SALARYSLIP,"sum(permission_limit)","employee_fk=".$emp);	
}
function getSumLeave($emp)
{
	return $GLOBALS['db_con_obj']->fetch_field(SALARYSLIP,"sum(no_absent)","employee_fk=".$emp);	
}
function getSumCasLeave($emp)
{
	return $GLOBALS['db_con_obj']->fetch_field(SALARYSLIP,"sum(cl_month)","employee_fk=".$emp);	
}
function getSumLop($emp)
{
	return $GLOBALS['db_con_obj']->fetch_field(SALARYSLIP,"sum(lop)","employee_fk=".$emp);	
}
/*function getLeaveType($type)
{
	return $GLOBALS['db_con_obj']->fetch_field(LEAVE_TYPE,"leave_type","leave_sk=".$type);	
}*/

function convert_digit_to_words($no)  
	{   
	
	//creating array  of word for each digit
	 $words = array('0'=> 'Zero' ,'1'=> 'One' ,'2'=> 'Two' ,'3' => 'Three','4' => 'Four','5' => 'Five','6' => 'Six','7' => 'Seven','8' => 'Eight','9' => 'Nine','10' => 'Ten','11' => 'Eleven','12' => 'Twelve','13' => 'Thirteen','14' => 'Fourteen','15' => 'Fifteen','16' => 'Sixteen','17' => 'Seventeen','18' => 'Eighteen','19' => 'Nineteen','20' => 'Twenty','30' => 'Thirty','40' => 'Forty','50' => 'Fifty','60' => 'Sixty','70' => 'Seventy','80' => 'Eighty','90' => 'Ninty','100' => 'Hundred','1000' => 'Thousand','100000' => 'Lakh','10000000' => 'Crore');
	 //$words = array('0'=> '0' ,'1'=> '1' ,'2'=> '2' ,'3' => '3','4' => '4','5' => '5','6' => '6','7' => '7','8' => '8','9' => '9','10' => '10','11' => '11','12' => '12','13' => '13','14' => '14','15' => '15','16' => '16','17' => '17','18' => '18','19' => '19','20' => '20','30' => '30','40' => '40','50' => '50','60' => '60','70' => '70','80' => '80','90' => '90','100' => '100','1000' => '1000','100000' => '100000','10000000' => '10000000');
	 
	 
	 //for decimal number taking decimal part
	 
	$cash=(int)$no;  //take number wihout decimal
	$decpart = $no - $cash; //get decimal part of number
	
	$decpart=sprintf("%01.2f",$decpart); //take only two digit after decimal
	
	$decpart1=substr($decpart,2,1); //take first digit after decimal
	$decpart2=substr($decpart,3,1);   //take second digit after decimal  
	
	$decimalstr='';
	
	//if given no. is decimal than  preparing string for decimal digit's word
	
	if($decpart>0)
	{
	 $decimalstr.="point ".$words[$decpart1]." ".$words[$decpart2];
	}
	 
	    if($no == 0)
	        return ' ';
	    else {
	    $novalue='';
	    $highno=$no;
	    $remainno=0;
	    $value=100;
	    $value1=1000;       
	            while($no>=100)    {
	                if(($value <= $no) &&($no  < $value1))    {
	                $novalue=$words["$value"];
	                $highno = (int)($no/$value);
	                $remainno = $no % $value;
	                break;
	                }
	                $value= $value1;
	                $value1 = $value * 100;
	            }       
	          if(array_key_exists("$highno",$words))  //check if $high value is in $words array
	              return $words["$highno"]." ".$novalue." ".convert_digit_to_words($remainno).$decimalstr;  //recursion
	          else {
	             $unit=$highno%10;
	             $ten =(int)($highno/10)*10;
	             return $words["$ten"]." ".$words["$unit"]." ".$novalue." ".convert_digit_to_words($remainno
	             ).$decimalstr; //recursion
	           }
	    }
	}


function fullName($user)
{
	return $GLOBALS['db_con_obj']->fetch_field(USER,"fullname","user_sk=".$user);
}

	function calcTotalHours($project_id)
	{
		$rs_hours=$GLOBALS['db_con_obj']->fetch_flds("pms_projects","*","project_sk=".$project_id);
		$item_hours=mysql_fetch_object($rs_hours[0]);
		$tot=$item_hours->analysis_hours+$item_hours->design_hours+$item_hours->development_hours+$item_hours->testing_hours+$item_hours->deploy_hours;
		return $tot;
	}
	
	function usedMins($project_id)
	{
		return $GLOBALS['db_con_obj']->fetch_field("pms_daily_status","sum(mins)","project_fk=".$project_id);
	}
	
	function usedMinsModules($module_id)
	{
		return $GLOBALS['db_con_obj']->fetch_field("pms_daily_status","sum(mins)","specification=".$module_id);
	}
	
	/*function fullName($user)
	{
		return $GLOBALS['db_con_obj']->fetch_field("pms_user","fullname","user_sk=".$user);
	}
	
	function userName($user)
	{
		return $GLOBALS['db_con_obj']->fetch_field("pms_user","username","user_sk=".$user);
	}*/
	
	function projectName($project)
	{
		return $GLOBALS['db_con_obj']->fetch_field("pms_projects","project_name","project_sk=".$project);
	}
	
	function projectCode($project)
	{
		return $GLOBALS['db_con_obj']->fetch_field("pms_projects","project_code","project_sk=".$project);
	}
	
	function projectCategory($project)
	{
		return $GLOBALS['db_con_obj']->fetch_field("pms_project_types","project_type","project_type_sk=".$project);
	}
	
	function moduleName($module)
	{
		return $GLOBALS['db_con_obj']->fetch_field("pms_modules","module_name","module_sk=".$module);
	}
	
	function clientName($client)
	{
		return $GLOBALS['db_con_obj']->fetch_field("pms_client","client_name","client_sk=".$client);
	}
	
	function m2h($min) 
	{
		$mins = abs($min);
		$neg = ($min < 0) ? '-' : '' ;
		$hours = $mins / 60;
		$onlyhours = floor($hours);
		$onlymins = $mins - ($onlyhours*60);
		if ($onlyhours < 1)
		{
			$output = sprintf("%02dmins",$neg,$onlyhours,$onlymins);
		} 
		else 
		{
			$output = sprintf("%s%dhrs %02dmins",$neg,$onlyhours,$onlymins);
		}
		return $output;
	
	}
	
function GetUsers($user = 0,$sublev = 0, $ini = 0, $view = '') 
{	
	$res = database_manipulation::execute_sql("select * from crm_user where team_id = '".$user."'");
	
	if($res[1])
	{
		
		while($item = mysql_fetch_array($res[0]))
		{			
			$desc_res = database_manipulation::execute_sql("select shortname, designation_sk from crm_designation where designation_sk='".$item["designation_id"]."'");
			
			$desc_data = mysql_fetch_array($desc_res[0]);
						
			$ss='';
			if($sublev!=='0' && $ini == 0)
			{
				for($i=1;$i<=($sublev-5)*5;$i++)
				{
					$ss.='&nbsp;';
				}				
			}
			
			$sel = '';
			
			$val = "specific_team_".$item['user_sk'];
									  
			/*if($view == $item["user_sk"] || $view == $val)
				$sel = 'selected = selected';*/
											
			$desc = " [".$desc_data["shortname"]."]";	
			
			if($desc_data["shortname"] == "CSO" || $desc_data["shortname"] == "BDO" || $desc_data["shortname"] == "DBDM")
			{
				if("specific_team_".$item['user_sk']==$view)
				  $sel = 'selected = selected';
				echo "<option value=\"specific_team_".$item['user_sk']."\" ".$sel." style='padding-top:2px; padding-bottom:2px;'>".$ss.$item['fullname']." Team".$desc."</option>\r\n";
				$sel = '';
			}	
			
			$sel = '';
			
			if($item['user_sk']==$view)
			  	$sel = 'selected = selected';
				
			echo "<option value=\"".$item['user_sk']."\" ".$sel." style='padding-top:2px; padding-bottom:2px;'>".$ss.$item['fullname'].$desc."</option>\r\n";
	   		
			GetUsers($item['user_sk'],$sublev+1,0,$view);
	   }
	  	  
	}
}
 
?>