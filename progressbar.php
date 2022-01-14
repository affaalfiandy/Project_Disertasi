<?php
// SnR Score
if($snrs == 100){
    $color_bar_snrs = "primary";
    $progres_bar_snrs = 100;
}else if($snrs < 100 and $snrs >= 95){
    $color_bar_snrs = "primary";
    $progres_bar_snrs = 95;
}else if($snrs < 95 and $snrs >= 90){
    $color_bar_snrs = "primary";
    $progres_bar_snrs = 90;
}else if($snrs < 90 and $snrs >= 85){
    $color_bar_snrs = "primary";
    $progres_bar_snrs = 85;
}else if($snrs < 85 and $snrs >= 80){
    $color_bar_snrs = "info";
    $progres_bar_snrs = 80;
}else if($snrs < 80 and $snrs >= 75){
    $color_bar_snrs = "info";
    $progres_bar_snrs = 75;
}else if($snrs < 75 and $snrs >= 70){
    $color_bar_snrs = "info";
    $progres_bar_snrs = 70;
}else if($snrs < 70 and $snrs >= 65){
    $color_bar_snrs = "info";
    $progres_bar_snrs = 65;
}else if($snrs < 65 and $snrs >= 60){
    $color_bar_snrs = "success";
    $progres_bar_snrs = 60;
}else if($snrs < 60 and $snrs >= 55){
    $color_bar_snrs = "success";
    $progres_bar_snrs = 55;
}else if($snrs < 55 and $snrs >= 50){
    $color_bar_snrs = "success";
    $progres_bar_snrs = 50;
}else if($snrs < 50 and $snrs >= 45){
    $color_bar_snrs = "success";
    $progres_bar_snrs = 45;
}else if($snrs < 45 and $snrs >= 40){
    $color_bar_snrs = "warning";
    $progres_bar_snrs = 40;
}else if($snrs < 40 and $snrs >= 35){
    $color_bar_snrs = "warning";
    $progres_bar_snrs = 35;
}else if($snrs < 35 and $snrs >= 30){
    $color_bar_snrs = "warning";
    $progres_bar_snrs = 30;
}else if($snrs < 30 and $snrs >= 25){
    $color_bar_snrs = "warning";
    $progres_bar_snrs = 25;
}else if($snrs < 25 and $snrs >= 20){
    $color_bar_snrs = "danger";
    $progres_bar_snrs = 20;
}else if($snrs < 20 and $snrs >= 15){
    $color_bar_snrs = "danger";
    $progres_bar_snrs = 15;
}else if($snrs < 15 and $snrs >= 10){
    $color_bar_snrs = "danger";
    $progres_bar_snrs = 10;
}else if($snrs < 10 and $snrs >= 5){
    $color_bar_snrs = "danger";
    $progres_bar_snrs = 5;
}else{
    $color_bar_snrs = "danger";
    $progres_bar_snrs = 0;
}



// Signal Strength Score
if($sss == 100){
    $color_bar_sss = "primary";
    $progres_bar_sss = 100;
}else if($sss < 100 and $sss >= 95){
    $color_bar_sss = "primary";
    $progres_bar_sss = 95;
}else if($sss < 95 and $sss >= 90){
    $color_bar_sss = "primary";
    $progres_bar_sss = 90;
}else if($sss < 90 and $sss >= 85){
    $color_bar_sss = "primary";
    $progres_bar_sss = 85;
}else if($sss < 85 and $sss >= 80){
    $color_bar_sss = "info";
    $progres_bar_sss = 80;
}else if($sss < 80 and $sss >= 75){
    $color_bar_sss = "info";
    $progres_bar_sss = 75;
}else if($sss < 75 and $sss >= 70){
    $color_bar_sss = "info";
    $progres_bar_sss = 70;
}else if($sss < 70 and $sss >= 65){
    $color_bar_sss = "info";
    $progres_bar_sss = 65;
}else if($sss < 65 and $sss >= 60){
    $color_bar_sss = "success";
    $progres_bar_sss = 60;
}else if($sss < 60 and $sss >= 55){
    $color_bar_sss = "success";
    $progres_bar_sss = 55;
}else if($sss < 55 and $sss >= 50){
    $color_bar_sss = "success";
    $progres_bar_sss = 50;
}else if($sss < 50 and $sss >= 45){
    $color_bar_sss = "success";
    $progres_bar_sss = 45;
}else if($sss < 45 and $sss >= 40){
    $color_bar_sss = "warning";
    $progres_bar_sss = 40;
}else if($sss < 40 and $sss >= 35){
    $color_bar_sss = "warning";
    $progres_bar_sss = 35;
}else if($sss < 35 and $sss >= 30){
    $color_bar_sss = "warning";
    $progres_bar_sss = 30;
}else if($sss < 30 and $sss >= 25){
    $color_bar_sss = "warning";
    $progres_bar_sss = 25;
}else if($sss < 25 and $sss >= 20){
    $color_bar_sss = "danger";
    $progres_bar_sss = 20;
}else if($sss < 20 and $sss >= 15){
    $color_bar_sss = "danger";
    $progres_bar_sss = 15;
}else if($sss < 15 and $sss >= 10){
    $color_bar_sss = "danger";
    $progres_bar_sss = 10;
}else if($sss < 10 and $sss >= 5){
    $color_bar_sss = "danger";
    $progres_bar_sss = 5;
}else{
    $color_bar_sss = "danger";
    $progres_bar_sss = 0;
}



// IQA Score
if($iqas == 100){
    $color_bar_iqas = "primary";
    $progres_bar_iqas = 100;
}else if($iqas < 100 and $iqas >= 95){
    $color_bar_iqas = "primary";
    $progres_bar_iqas = 95;
}else if($iqas < 95 and $iqas >= 90){
    $color_bar_iqas = "primary";
    $progres_bar_iqas = 90;
}else if($iqas < 90 and $iqas >= 85){
    $color_bar_iqas = "primary";
    $progres_bar_iqas = 85;
}else if($iqas < 85 and $iqas >= 80){
    $color_bar_iqas = "info";
    $progres_bar_iqas = 80;
}else if($iqas < 80 and $iqas >= 75){
    $color_bar_iqas = "info";
    $progres_bar_iqas = 75;
}else if($iqas < 75 and $iqas >= 70){
    $color_bar_iqas = "info";
    $progres_bar_iqas = 70;
}else if($iqas < 70 and $iqas >= 65){
    $color_bar_iqas = "info";
    $progres_bar_iqas = 65;
}else if($iqas < 65 and $iqas >= 60){
    $color_bar_iqas = "success";
    $progres_bar_iqas = 60;
}else if($iqas < 60 and $iqas >= 55){
    $color_bar_iqas = "success";
    $progres_bar_iqas = 55;
}else if($iqas < 55 and $iqas >= 50){
    $color_bar_iqas = "success";
    $progres_bar_iqas = 50;
}else if($iqas < 50 and $iqas >= 45){
    $color_bar_iqas = "success";
    $progres_bar_iqas = 45;
}else if($iqas < 45 and $iqas >= 40){
    $color_bar_iqas = "warning";
    $progres_bar_iqas = 40;
}else if($iqas < 40 and $iqas >= 35){
    $color_bar_iqas = "warning";
    $progres_bar_iqas = 35;
}else if($iqas < 35 and $iqas >= 30){
    $color_bar_iqas = "warning";
    $progres_bar_iqas = 30;
}else if($iqas < 30 and $iqas >= 25){
    $color_bar_iqas = "warning";
    $progres_bar_iqas = 25;
}else if($iqas < 25 and $iqas >= 20){
    $color_bar_iqas = "danger";
    $progres_bar_iqas = 20;
}else if($iqas < 20 and $iqas >= 15){
    $color_bar_iqas = "danger";
    $progres_bar_iqas = 15;
}else if($iqas < 15 and $iqas >= 10){
    $color_bar_iqas = "danger";
    $progres_bar_iqas = 10;
}else if($iqas < 10 and $iqas >= 5){
    $color_bar_iqas = "danger";
    $progres_bar_iqas = 5;
}else{
    $color_bar_iqas = "danger";
    $progres_bar_iqas = 0;
}
?>