<?php
session_start();

include_once "./dtbase.php";

if (isset($_POST['loc'])){
    $namatempat= $_POST['loc'];
    $snrs = $_POST['snrs'];
    $sss = $_POST['sss'];
    $iqas = $_POST['iqas'];
}else {
    $namatempat= "depok";
    $snrs = "0";
    $sss = "0";
    $iqas = "0";
}

$sql = "SELECT * FROM dataum";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>projek_1</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="./vendor/owl-carousel/css/owl.theme.default.min.css">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">


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
            <a href="index.html" class="brand-logo">
                <i class="logo-abbr fas fa-desktop"></i>
                <p class="brand-title" style="max-width: 350px; margin-bottom: 0;">UG TV Digital Monitoring</p>
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

                        <ul class="navbar-nav header-right ml-auto">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
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
                            <a href="./index.php" class="nav-text"><i class="fas fa-globe"></i> Dashboard</a>
                        </li>

                        <?php
                        if (isset($_SESSION["login"])){
                            echo "<li><a href='./minn/index.php'><i class='icon icon-single-04'></i> Admin</a></li>";
                        }
                        ?>

                        <!-- <li>
                            <a href="javascript:void" class="nav-text"><i class="icon icon-single-04"></i> Dashboard</a>
                        </li> -->

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

                <div class="row">
                    <div class="col-lg-9 col-md-9">
                        <div class="mapouter">
                            <div class="gmap_canvas">
                                <iframe style="width: 100%; height: 300px;" id="gmap_canvas"
                                    src="https://maps.google.com/maps?q=
                                        <?php
                                        $arrk = explode(" ",$namatempat);
                                        $i = 0;
                                        while($i < count($arrk)-1){
                                        echo $arrk[$i] . "%20";
                                        $i++;
                                        }
                                        echo $arrk[count($arrk)-1];
                                        ?>
                                        &t=&z=13&ie=UTF8&iwloc=&output=embed"
                                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                <a href="https://2piratebay.org"></a>
                                <br>
                                <style>
                                    .mapouter {
                                        position: relative;
                                        text-align: right;
                                        height: 350px;
                                        width: 100%;
                                    }
                                </style>
                                <a href="https://www.embedgooglemap.net">google map</a>
                                <style>
                                    .gmap_canvas {
                                        overflow: hidden;
                                        background: none !important;
                                    }
                                </style>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">



                    <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Location</h4>
                            </div>
                            <div class="card-body px-0" style="height: 250px; overflow: scroll;">
                                

                                <?php
                                        while($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <form action="<?php $_SERVER['PHP_SELF'];?>" method="post">
                                <input type="text" name="nama_tempat" value="<?= $row["nama_tempat"]?>" hidden>
                                <input type="text" name="snrs" value="<?= $row["snrs"]?>" hidden>
                                <input type="text" name="sss" value="<?= $row["sss"]?>" hidden>
                                <input type="text" name="iqas" value="<?= $row["iqas"]?>" hidden>
                                <div class="">
                                <button class="btn-secondary btn btn-large text-left col-11 ml-2 mb-2" type="submit" name="loc"
                                    value="<?= $row["alamat"]?>"><?= $row["nama_tempat"]?>
                                </button>
                                </div>
                                </form>
                                <?php
                                    }
                                ?>
                                
                                


                            </div>
                        </div>
                        </div>
                </div>

                <?php
                include "progressbar.php"
                ?>
                <div class="row">
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">SnR Score</div>
                                    <div class="stat-digit"> <i class="fas fa-percent"></i><?= $snrs?></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-<?=$color_bar_snrs?> w-<?=$progres_bar_snrs?>" role="progressbar" aria-valuenow="<?= $snrs?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">Signal Strength Score</div>
                                    <div class="stat-digit"> <i class="fas fa-wifi"></i><?= $sss?></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-<?=$color_bar_sss?> w-<?=$progres_bar_sss?>" role="progressbar" aria-valuenow="<?= $sss?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="stat-content">
                                    <div class="stat-text">IQA Score</div>
                                    <div class="stat-digit"> <i class="fas fa-satellite-dish"></i><?= $iqas?></div>
                                </div>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-<?=$color_bar_iqas?> w-<?=$progres_bar_iqas?>" role="progressbar" aria-valuenow="<?= $iqas?>" aria-valuemin="0" aria-valuemax="100"></div>
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
                <p>Copyright © Designed &amp; Developed by <a href="#" target="_blank">Quixkit</a> 2019</p>
                <p>Distributed by <a href="https://themewagon.com/" target="_blank">Themewagon</a></p> 
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

    <!-- Maps -->
    <!-- <script>
        function initMap(){
            var location = {lat: -25.363, lng: 131.044};
            var map = new google.maps.Map(document.getElementById("map"), {
                zoom: 4,
                center: location
            });
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBvSRBoy6Zroojf7KAQel-OosRExA1-26I&callback=initMap"></script> -->

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

    <!--  flot-chart js -->
    <script src="./vendor/flot/jquery.flot.js"></script>
    <script src="./vendor/flot/jquery.flot.resize.js"></script>

    <!-- Owl Carousel -->
    <script src="./vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <!-- Counter Up -->
    <script src="./vendor/jqvmap/js/jquery.vmap.min.js"></script>
    <script src="./vendor/jqvmap/js/jquery.vmap.usa.js"></script>
    <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>


    <script src="./js/dashboard/dashboard-1.js"></script>

</body>

</html>