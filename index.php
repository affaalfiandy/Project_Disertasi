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
                                <?php
                                if (isset($_SESSION["login"])){
                                    $namee =  $_SESSION["username"];
                                echo"<h6 class='m-1 mr-4'>Selamat datang, $namee </h6>
                                     <p style='font-size: 34px;' class='mt-2'> | </p>";
                                    
                                }?>
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
                        <a href="../index.php"><i class="fas fa-globe"></i><span class="nav-text">Dashboard</span></a>
                    </li>

                        <?php
                        if (isset($_SESSION["login"])){
                            echo "<li><a href='./minn/index.php'><i class='icon icon-single-04'></i><span class='nav-text'> Admin</span></a></li>";
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
                <div class="row justify-content-lg-center">
                    <div class="col-lg-10">
                        <div class="card"> 
                            <div class="stat-widget-two card-body">
                                <div class="container mt-0">
                                    <div class="stat-content">
                                        <div class="stat-text">SnR Score</div>
                                    </div>
                                    <div class="row my-0 py-0">
                                    <div class="card-body col-8">
                                        <div class="cpu-load-chart">
                                            <div id="cpu-load-1" class="cpu-load"></div>
                                        </div>
                                    </div>
                                    <div class="col-4 my-5">
                                        <div class="stat-digit"><i class="fas fa-percent"></i><?= $snrs?></div>
                                    </div>
                                    </div>
                                </div>

                                <div class="progress" style="margin: 10px 20%;">
                                    <div class="progress-bar progress-bar-<?=$color_bar_snrs?> w-<?=$progres_bar_snrs?>" role="progressbar" aria-valuenow="<?= $snrs?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-10">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                            <div class="container mt-0">
                                    <div class="stat-content">
                                        <div class="stat-text">Signal Strength Score</div>
                                    </div>
                                    <div class="row my-0 py-0">
                                    <div class="card-body col-8">
                                        <div class="cpu-load-chart">
                                            <div id="cpu-load-2" class="cpu-load"></div>
                                        </div>
                                    </div>
                                    <div class="col-4 my-5">
                                        <div class="stat-digit"><i class="fas fa-percent"></i><?= $sss?></div>
                                    </div>
                                    </div>
                                </div>
                                <div class="progress" style="margin: 10px 20%;">
                                    <div class="progress-bar progress-bar-<?=$color_bar_sss?> w-<?=$progres_bar_sss?>" role="progressbar" aria-valuenow="<?= $sss?>" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-10">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                            <div class="container mt-0">
                                    <div class="stat-content">
                                        <div class="stat-text">IQA Score</div>
                                    </div>
                                    <div class="row my-0 py-0">
                                    <div class="card-body col-8">
                                        <div class="cpu-load-chart">
                                            <div id="cpu-load-3" class="cpu-load"></div>
                                        </div>
                                    </div>
                                    <div class="col-4 my-5">
                                        <div class="stat-digit"><i class="fas fa-percent"></i><?= $iqas?></div>
                                    </div>
                                    </div>
                                </div>
                                <div class="progress" style="margin: 10px 20%;">
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


    <script>
    (function($) {
    "use strict";

    var data = [],
        totalPoints = 300;

    function getRandomData() {

        if (data.length > 0)
            data = data.slice(1);

        // Do a random walk

        while (data.length < totalPoints) {

            var prev = data.length > 0 ? data[data.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;

            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }

            data.push(y);
        }

        // Zip the generated y values with the x values

        var res = [];
        for (var i = 0; i < data.length; ++i) {
            res.push([i, data[i]])
        }

        return res;
    }

    // Set up the control widget

    var updateInterval = 30;
    $("#updateInterval").val(updateInterval).change(function() {
        var v = $(this).val();
        if (v && !isNaN(+v)) {
            updateInterval = +v;
            if (updateInterval < 1) {
                updateInterval = 1;
            } else if (updateInterval > 3000) {
                updateInterval = 3000;
            }
            $(this).val("" + updateInterval);
        }
    });

    //graph 1

    var plot1 = $.plot("#cpu-load-1", [getRandomData()], {
        series: {
            shadowSize: 0 // Drawing is faster without shadows
        },
        yaxis: {
            min: 0,
            max: 100
        },
        xaxis: {
            show: false
        },
        colors: ["#007BFF"],
        grid: {
            color: "transparent",
            hoverable: true,
            borderWidth: 0,
            backgroundColor: 'transparent'
        },
        tooltip: true,
        tooltipOpts: {
            content: "Y: %y",
            defaultTheme: false
        }
    });
    function update1() {
        plot1.setData([getRandomData()]);
        // Since the axes don't change, we don't need to call plot.setupGrid()
        plot1.draw();
        setTimeout(update1, updateInterval);
    }
    update1();

    // graph 2

    var plot2 = $.plot("#cpu-load-2", [getRandomData()], {
        series: {
            shadowSize: 0 // Drawing is faster without shadows
        },
        yaxis: {
            min: 0,
            max: 100
        },
        xaxis: {
            show: false
        },
        colors: ["#007BFF"],
        grid: {
            color: "transparent",
            hoverable: true,
            borderWidth: 0,
            backgroundColor: 'transparent'
        },
        tooltip: true,
        tooltipOpts: {
            content: "Y: %y",
            defaultTheme: false
        }
    });
    function update2() {
        plot2.setData([getRandomData()]);
        // Since the axes don't change, we don't need to call plot.setupGrid()
        plot2.draw();
        setTimeout(update2, updateInterval);
    }
    update2();

    //graph 3

    var plot3 = $.plot("#cpu-load-3", [getRandomData()], {
        series: {
            shadowSize: 0 // Drawing is faster without shadows
        },
        yaxis: {
            min: 0,
            max: 100
        },
        xaxis: {
            show: false
        },
        colors: ["#007BFF"],
        grid: {
            color: "transparent",
            hoverable: true,
            borderWidth: 0,
            backgroundColor: 'transparent'
        },
        tooltip: true,
        tooltipOpts: {
            content: "Y: %y",
            defaultTheme: false
        }
    });
    function update3() {
        plot3.setData([getRandomData()]);
        // Since the axes don't change, we don't need to call plot.setupGrid()
        plot3.draw();
        setTimeout(update3, updateInterval);
    }
    update3();
    
})(jQuery);
const wt = new PerfectScrollbar('.widget-todo');
const wtl = new PerfectScrollbar('.widget-timeline');
</script>

</body>

</html>