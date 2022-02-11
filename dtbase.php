<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ugtvmonitoring";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// GeoDataSource.com (C) All Rights Reserved 2022

function distance($lat1, $lon1, $lat2, $lon2, $unit) {
  if (($lat1 == $lat2) && ($lon1 == $lon2)) {
    return 0;
  }
  else {
    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
      return ($miles * 1.609344);
    } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
      return $miles;
    }
  }
}

// echo distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
// echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
// echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";

//zoomer

function zoom($x){
  $arr =explode('.',$x);
  if (count($arr) == 1){
  
    $zkm = $arr[0];
    if ($zkm <= 3){
      return 12.8;
    }else if($zkm <= 8 && $zkm > 3){
      return 11.5;
    }else if($zkm <= 12 && $zkm > 8){
      return 10.5;
    }else if($zkm <= 20 && $zkm > 12){
      return 9.5;
    }else if($zkm <= 35 && $zkm > 20){
      return 8.5;
    }else if($zkm > 35){
      return 7.5;
    }
    
    }else{
    if ($arr[0] == 0){
    $result_m1 =str_split($arr[1],3);  
    
    $zm = $result_m1[0];
      if ($zm <= 300){
        return 15;
      }else if($zm <= 550 && $zm > 300){
        return 14.2;
      }else if($zm > 550){
        return 13.7;
      }
      
      
      }else{
      
      $zkm = $arr[0];
        if ($zkm <= 3){
          return 12.8;
        }else if($zkm <= 8 && $zkm > 3){
          return 11.5;
        }else if($zkm <= 12 && $zkm > 8){
          return 10.5;
        }else if($zkm <= 20 && $zkm > 12){
          return 9.5;
        }else if($zkm <= 35 && $zkm > 20){
          return 8.5;
        }else if($zkm > 35){
          return 7.5;
        }
      
      }
  }
}

?>