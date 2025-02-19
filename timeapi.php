<?php 
 header("Access-Control-Allow-Origin: *");
?>
<?php 
$url = 'http://v6.ipv6-test.com/api/myip.php';

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);

curl_close($ch);
?>
<?php 
     $timezone = "Europe/Athens";
     $dateTime = new DateTime("now",new DateTimeZone($timezone));
     $utcdateTime = new DateTime("now",new DateTimeZone("UTC"));
     $day_of_week = $dateTime->format("w");
     $week_number = $dateTime->format("W");
     $day_of_year = $dateTime->format("z");
     $miliseconds = $dateTime->format("U");
     $abbreviation = $dateTime->format("T");
     //--//
     $myObj = new stdClass();
     $myObj->datetime =  $dateTime->format("l d F Y H:i:s");
     $myObj->utcdatetime = $utcdateTime->format("l d F Y H:i:s");
     $myObj->day_of_week = (int)$day_of_week + 1;
     $myObj->week_number = (int)$week_number;
     $myObj->day_of_year = (int)$day_of_year;
     $myObj->unixtime = (int)$miliseconds;
     $myObj->abbreviation = $abbreviation;
     $myObj->timezone = $timezone;
     $myObj->ip = $response;
     //--//
     $myJSON = json_encode($myObj);
     echo $myJSON;
?>
