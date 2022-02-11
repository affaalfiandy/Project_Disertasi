<?php
session_start();

include_once "./dtbase.php";

if (isset($_POST['loc'])){
    $nama_tempat = $_POST['nama_tempat'];
    $snrs = $_POST['snrs'];
    $sss = $_POST['sss'];
    $iqas = $_POST['iqas'];
    $location= $_POST['alamat'];
    $tschannelid= $_POST['tschannelid'];
    $alamat_transmitter= $_POST['alamat_transmitter'];
    $device_lat= $_POST['device_lat'];
    $device_long= $_POST['device_long'];
    $dtvt_lat= $_POST['dtvt_lat'];
    $dtvt_long= $_POST['dtvt_long'];
    $zoom= zoom(distance($device_lat, $device_long, $dtvt_lat, $dtvt_long, "K"));
}else {
    $nama_tempat = "";
    $snrs = "";
    $sss = "";
    $iqas = "";
    $location= "depok";
    $tschannelid= ""; 
    $alamat_transmitter= "";
    $device_lat= "";
    $device_long= "";
    $dtvt_lat= "";
    $dtvt_long= "";
    $zoom= 14;
}

if($device_lat == "" && $device_long == ""){
    $c_lat= -6.370082146399079;
    $c_long= 106.83961719605158;
}else{
    $c_lat= $_POST['device_lat'];
    $c_long= $_POST['device_long'];   
}

$sql = "SELECT * FROM dataum ORDER BY `nama_tempat` ASC";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>UG TV MONITORING</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <!-- Mapbox -->
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.css" rel="stylesheet">
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.7.0/mapbox-gl.js"></script>
    <style>
    #map { height: 330px; margin-bottom: 30px;}
    </style>
    
    <!-- infile css -->
    <style>
        @media only screen and (max-width: 800px){
            .nv-head{
               display: none; 
            }
        }
    </style>


</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->


    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <a href="index.php" class="brand-logo">
                <i class="logo-abbr fas fa-desktop"></i>
                <p class="brand-title" style="max-width: 350px; margin-bottom: 0;">UGTV - SIQM</p>
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        
                        <ul class="navbar-nav navbar-expand"><h3 class="my-1 nv-head">UG Digital TV Signal & Image Quality Monitoring</h3></ul>

                        <ul class="navbar-nav header-right ml-auto">
                            <li class="nav-item dropdown header-profile">
                                <?php
                                if (isset($_SESSION["login"])){
                                    $namee =  $_SESSION["username"];
                                echo"<h6 class='m-1 mr-4'>Welcome, $namee </h6>
                                     <p style='font-size: 34px;' class='mt-2'> | </p>";
                                    
                                }?>
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="fas fa-user ml-2"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                        <?php
                                        if (isset($_SESSION["login"])){
                                            echo "<a href='./minn/logout.php' class='dropdown-item'>
                                                    <i class='fas fa-power-off'></i>
                                                    <span class='ml-2'>Logout</span>";
                                        }else{
                                            echo "<a href='./minn/index.php' class='dropdown-item'>
                                                    <i class='fas fa-sign-in-alt'></i>
                                                    <span class='ml-2'>Login</span>";
                                        }
                                        ?>
                                        
                                    </a>
                                </div>
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="quixnav">
            <div class="quixnav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>

                    <li>
                        <a href="./index.php"><i class="fas fa-globe"></i><span class="nav-text">Dashboard</span></a>
                    </li>


                        <?php
                        if (isset($_SESSION["login"])){
                            echo "<li><a href='#'><i class='fas fa-file-export'></i><span class='nav-text'>Export Data</span></a></li>
                                  <li><a href='./minn/index.php'><i class='fas fa-user'></i><span class='nav-text'>Admin</span></a></li>";
                        }
                        ?>

                </ul>
            </div>


        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body" style="min-height: 630px;">
            <!-- row -->
            <div class="container-fluid">
                <h5>Dashboard</h5>
                <h3>Overview</h3>

                <!-- Mapbox -->
                <div class="row">
                    <div class="col-lg-9 col-md-9">
                        <div id="map" style="border-radius: 5px;">
                        <i class="fa-solid fa-location-dot" style="color: darkblue; position:absolute; z-index: 1; margin: 5px;"></i>
                            <p style="color: white; position:absolute; z-index: 1; margin: 2px 16px 0; font-size: 10px;">Digital TV Transmitter Location</p><br>
                            <i class="fa-solid fa-location-dot" style="color: red; position:absolute; z-index: 1; margin: 5px;"></i>
                            <p style="color: white; position:absolute; z-index: 1; margin: 2px 16px 0; font-size: 10px;">Device Location</p><br>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">



                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Select Location</h4>
                            </div>
                            <div class="card-body px-0" style="height: 150px; overflow: scroll;">


                                <?php
                                while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                                    <input type="text" name="nama_tempat" value="<?= $row["nama_tempat"]?>" hidden>
                                    <input type="text" name="snrs" value="<?= $row["snrs"]?>" hidden>
                                    <input type="text" name="sss" value="<?= $row["sss"]?>" hidden>
                                    <input type="text" name="iqas" value="<?= $row["iqas"]?>" hidden>
                                    <input type="text" name="alamat" value="<?= $row["alamat"]?>" hidden>
                                    <input type="text" name="tschannelid" value="<?= $row["tschannelid"]?>" hidden>
                                    <input type="text" name="alamat_transmitter" value="<?= $row["alamat_transmitter"]?>" hidden>
                                    <input type="text" name="device_long" value="<?= $row["device_long"]?>" hidden>
                                    <input type="text" name="device_lat" value="<?= $row["device_lat"]?>" hidden>
                                    <input type="text" name="dtvt_long" value="<?= $row["dtvt_long"]?>" hidden>
                                    <input type="text" name="dtvt_lat" value="<?= $row["dtvt_lat"]?>" hidden>
                                    <div class="">
                                        <button class="btn-secondary btn btn-large text-left col-11 ml-2 mb-2"
                                            type="submit" name="loc"><?= $row["nama_tempat"]?>
                                        </button>
                                    </div>
                                </form>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        <div class="card" style="background-color: lightskyblue; height:100px;">
                            <div class="card-body">
                                <h5 class="text-muted" style="font-weight: 500;">Distance to station</h5>
                                <div class="stat-digit text-dark text-center">
                                    <span style="font-size: 25px; font-weight: 500;">
                                        <?php
                                        $arr =explode('.',distance($device_lat, $device_long, $dtvt_lat, $dtvt_long, "K"));

                                        if (count($arr) == 1){
                                            echo "$arr[0]";

                                            }else{
                                              if ($arr[0] == 0){
                                              $result_m1 =str_split($arr[1],3);
                                              $result_m2 =str_split($result_m1[1],2);  
                                              echo "$result_m1[0].$result_m2[0] "."m";

                                              }else{
                                              $resultkm =str_split($arr[1],2);
                                              echo "$arr[0].$resultkm[0] "."km";

                                              }
                                            }

                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card" style="background-color: lightblue; height:120px;">
                            <div class="card-body">
                                <h4 class="text-muted">IQA Score</h4>
                                <div class="stat-digit text-dark text-center">
                                    
                                    <span id="IQADigit" style="font-size: 30px; font-weight: 500;"></span >
                                </div>
                                <div class="progress">
                                    <div id="IQABar"></div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card" style="background-color: lightgreen; height:120px;">
                            <div class="card-body">
                                <h4 class="text-muted">SnR</h4>
                                <div class="stat-digit text-dark text-center">
                                    <span id="SNRDigit" style="font-size: 30px; font-weight: 500;"></span><span style="font-size: 25px;"> dB</span>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card" style="background-color: lightsalmon; height:120px;">
                            <div class="card-body">
                                <h4 class="text-muted">Signal Strength</h4>
                                <div class="stat-digit text-dark text-center"> 
                                    <span id="SSSDigit" style="font-size: 30px; font-weight: 500;"></span><span style="font-size: 25px;"> dBm</span>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-lg-center">

                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="container mt-0">
            
                                    <div class="row my-0 py-0">
                                        
                                        <div class="col-12">
                                            <div class="cpu-load-chart">
                                                <iframe width="100%" height="260" style="border: 1px solid transparent;" src="https://thingspeak.com/channels/1078947/charts/4?bgcolor=%23ffffff&color=%230e416e&width=460&dynamic=true&results=50&title=Image+Quality+Score&type=line&xaxis=Time&yaxis=Score&type=line&update=15&width=auto&height=auto"></iframe>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="container mt-0">
                                    
                                    <div class="row my-0 py-0">
                                        
                                        <div class="col-12">
                                            <div class="cpu-load-chart">
                                                <iframe width="100%" height="260" style="border: 1px solid transparent;" src="https://thingspeak.com/channels/1078947/charts/1?bgcolor=%23ffffff&color=%23186b38&dynamic=true&results=50&title=Signal+to+Noise+Ratio&type=line&xaxis=Time&yaxis=dBm&width=auto&height=auto"></iframe>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="container mt-0">
                                    
                                    <div class="row my-0 py-0">
                                        
                                        <div class="col-12">
                                            <div class="cpu-load-chart">
                                                <iframe width="100%" height="260" style="border: 1px solid transparent;" src="https://thingspeak.com/channels/1078947/charts/2?bgcolor=%23ffffff&color=%23d62020&dynamic=true&results=50&title=Signal+Strength&type=line&xaxis=Time&yaxis=dB&width=auto&height=auto"></iframe>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->


        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © 2022</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

        <!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->

    <!-- Mapbox -->
    <script>
	mapboxgl.accessToken = 'pk.eyJ1IjoidWd0dnNpcW0wMDEiLCJhIjoiY2t6aWIwbnJ6MDY5dzJvbnh5NDl1cmZnaSJ9.-CKcIQOA6Up3zaeg6LZ87Q';
    // A GeoJSON object with a LineString route from the White House to Capitol Hill
    const geojson = {
        'type': 'FeatureCollection',
        'features': [
            {
                'type': 'Feature',
                'geometry': {
                    'type': 'LineString',
                    'properties': {},
                    'coordinates': [
                        [<?= $device_long .','. $device_lat?>],
                        [<?= $dtvt_long .','. $dtvt_lat?>]
                    ]
                }
            }
        ]
    };

    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/satellite-v9',
        center: [<?= $c_long .','. $c_lat?>],
        zoom: <?=$zoom?>
    });

    const marker1 = new mapboxgl.Marker({color: "red"})
    .setLngLat([<?= $device_long .','. $device_lat?>])
    .addTo(map); // add the marker to the map

    const marker2 = new mapboxgl.Marker({color: "darkblue"})
    .setLngLat([<?= $dtvt_long .','. $dtvt_lat?>])
    .addTo(map); // add the marker to the map

    const scale = new mapboxgl.ScaleControl({
    maxWidth: 80,
    unit: 'imperial'
    });
    map.addControl(scale);
    
    scale.setUnit('metric');

    map.on('load', () => {
        map.addSource('LineString', {
            'type': 'geojson',
            'data': geojson
        });
        map.addLayer({
            'id': 'LineString',
            'type': 'line',
            'source': 'LineString',
            'layout': {
                'line-join': 'round',
                'line-cap': 'round'
            },
            'paint': {
                'line-color': 'rgba(100, 100, 255, 0.5)',
                'line-width': 5
            }
        });

        
    });
    </script>


    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>


    <!-- Vectormap -->
    <script src="./vendor/raphael/raphael.min.js"></script>
    <script src="./vendor/morris/morris.min.js"></script>


    <script src="./vendor/circle-progress/circle-progress.min.js"></script>
    <script src="./vendor/chart.js/Chart.bundle.min.js"></script>

    <script src="./vendor/gaugeJS/dist/gauge.min.js"></script>

    <!-- Owl Carousel -->
    <script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="./vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>

    <script src="index.js"></script>

</body>

</html>