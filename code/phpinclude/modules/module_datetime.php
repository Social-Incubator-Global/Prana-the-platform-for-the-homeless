<?php

function get_date_time_intervals()
{
	return array("day" => "+1 day", "week" => "+1 week", "2week" => "+2 week", "month" => "+1 month", "year" => "+1 year", "monday" => "next monday", "tuesday" => "next tuesday", "wednesday" => "next wednesday", "thursday" => "next thursday", "friday" => "next friday", "saturday" => "next saturday", "sunday" => "next sunday");
}

function get_days_fromdate_day($start_date, $day)
{
	//BIWEEKLY
	$intervals = get_date_time_intervals();
	$dates = array();
	$date = strtotime($start_date);
	array_push($dates, $date);
	//echo($start_date. "/".$day);
	
	for($i = 0; $i < 36; $i++)
	{
		$date = $dates[$i];
		$date = strtotime($intervals[strtolower($day)], $date);
		//echo(date("Y-m-d", $dates[$i - 1]));
		//echo(date("Y-m-d h:i:sa", $date));
		array_push($dates, $date);
		//echo(date("Y-m-d h:i:sa", $dates[$i]));
	}
	//echo(date("Y-m-d h:i:sa", $dates[5]));
	return $dates;
}

function get_days_fromdate_all($start_date, $interval)
{
	$intervals = get_date_time_intervals();
	$dates = array();
	$date = strtotime($start_date);
	array_push($dates, $date);
	
	for($i = 0; $i < 36; $i++)
	{
		$date = $dates[$i];
		//echo(sizeof($dates).",");
		//echo(date("Y-m-d", $dates[$i]));
		
		$date = strtotime($intervals[$interval], $date);
		//echo($date);
		//echo($date);
		// Output

		//echo(date("Y-m-d", $dates[$i - 1]));
		//echo(date("Y-m-d h:i:sa", $date));
		array_push($dates, $date);
	}
	return $dates;
}

/*function get_days_fromdate_twoweekly($start_date)
{
	//WEEKLY
	$intervals = get_date_time_intervals();
	$dates = array();
	$date = strtotime($start_date);
	array_push($dates, $date);
	
	for($i = 0; $i < 36; $i++)
	{
		$date = $dates[$i];
		//echo(sizeof($dates).",");
		echo(date("Y-m-d", $dates[$i]));
		
		$date = strtotime($intervals["2week"], $date);
		//echo($date);
		//echo($date);
		// Output

		//echo(date("Y-m-d", $dates[$i - 1]));
		//echo(date("Y-m-d h:i:sa", $date));
		array_push($dates, $date);
	}
	return $dates;
}*/

function get_multidays_fromdate($start_date, $day, $iteration)
{
	$sd = new DateTime($start_date);
	return;
}

function get_days_in_month($month, $year)
{
	return cal_days_in_month(CAL_GREGORIAN, $month, $year);
}

function get_this_monthfirstweekday()
{
	$inputMonth = date("Y").'-'.date("M").'-01';
	$month = date("m" , strtotime($inputMonth));
	$year = date("Y" , strtotime($inputMonth));
	$getdate = getdate(mktime(null, null, null, $month, 1, $year));
	return $getdate["weekday"];
}

function get_this_weekfirstweekday()
{
	$inputMonth = date("Y").'-'.date("M").'-'.date("D");
	$month = date("m" , strtotime($inputMonth));
	$year = date("Y" , strtotime($inputMonth));
	$getdate = getdate(mktime(null, null, null, $month, 1, $year));
	return $getdate["weekday"];
}

function get_today_weekday()
{
	$jd = cal_to_jd(CAL_GREGORIAN, date("m"), date("d"), date("Y"));
	return JDDayOfWeek($jd, 1); 
}

function get_today()
{
	return date('d');
}

function get_today_full()
{
	return date("dd/mm/YYYY");
}

function get_today_full_html_cal()
{
	return date("YYYY-mm-dd");
}

?>