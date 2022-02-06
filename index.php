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
                                echo"<h6 class='m-1 mr-4'>Welcome, $namee </h6>
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
                        <a href="./index.php"><i class="fas fa-globe"></i><span class="nav-text">Dashboard</span></a>
                    </li>


                        <?php
                        if (isset($_SESSION["login"])){
                            echo "<li><a href='#'><i class='fas fa-file-export'></i><span class='nav-text'> Export Data</span></a></li>
                                  <li><a href='./minn/index.php'><i class='icon icon-single-04'></i><span class='nav-text'> Admin</span></a></li>";
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
                                <h4 class="card-title">Select Location</h4>
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

                <div class="row">
                    <div class="col-4">
                        <div class="card" style="background-color: lightblue; height:120px;">
                            <div class="card-body">
                                <h4 class="text-muted">IQA Score</h4>
                                <div class="stat-digit text-dark text-center" style="font-size: 19px;">
                                    <i class="fas fa-percent"></i> 
                                    <span id="IQADigit" style="font-size: 30px; font-weight: 500;"></span >
                                </div>
                                <div class="progress">
                                    <div id="IQABar"></div>
                                </div> 
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card" style="background-color: lightgreen; height:120px;">
                            <div class="card-body">
                                <h4 class="text-muted">SnR</h4>
                                <div class="stat-digit text-dark text-center" style="font-size: 19px;">
                                    <span id="SNRDigit" style="font-size: 30px; font-weight: 500;"></span><span style="font-size: 25px;"> dB</span>
                                </div>
                                <!-- <div class="progress" style="margin: 10px 20%;">
                                    <div id="SNRBar"></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="card" style="background-color: lightsalmon; height:120px;">
                            <div class="card-body">
                                <h4 class="text-muted">Signal Strength</h4>
                                <div class="stat-digit text-dark text-center" style="font-size: 19px;"> 
                                    <span id="SSSDigit" style="font-size: 30px; font-weight: 500;"></span><span style="font-size: 25px;"> dBm</span>
                                </div>
                                <!-- <div class="progress" style="margin: 10px 20%;">
                                    <div id="SSSBar" role="progressbar"></div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-lg-center">

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="container mt-0">
                                    <div class="stat-content">
                                        <div class="stat-text">Image Quality Assesment (IQA) Score</div>
                                    </div>
                                    <div class="row my-0 py-0">
                                        <div class=" p-0 mx-0"
                                            style="position:absolute; top:45%; transform: rotate(-90deg);">
                                            <span style="font-size: 12px; color:darkslategrey;">Score</span>
                                        </div>
                                        <div class="col-12 pl-4">
                                            <div class="cpu-load-chart">
                                                <div id="cpu-load-3" class="cpu-load"></div>
                                            </div>
                                            <span style="font-size: 12px; color:darkslategrey;">Time</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="container mt-0">
                                    <div class="stat-content">
                                        <div class="stat-text">Signal to Noise Ratio (SnR) Score</div>
                                    </div>
                                    <div class="row my-0 py-0">
                                        <div class=" p-0 mx-0"
                                            style="position:absolute; top:45%; transform: rotate(-90deg);">
                                            <span style="font-size: 12px; color:darkslategrey;">dB</span>
                                        </div>
                                        <div class="col-12 pl-4">
                                            <div class="cpu-load-chart">
                                                <div id="cpu-load-1" class="cpu-load"></div>
                                            </div>
                                            <span style="font-size: 12px; color:darkslategrey;">Time</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card">
                            <div class="stat-widget-two card-body">
                                <div class="container mt-0">
                                    <div class="stat-content">
                                        <div class="stat-text">Signal Strength</div>
                                    </div>
                                    <div class="row my-0 py-0">
                                        <div class=" p-0 mx-0"
                                            style="position:absolute; top:45%; transform: rotate(-90deg);">
                                            <span style="font-size: 12px; color:darkslategrey;">dBm</span>
                                        </div>
                                        <div class="col-12 pl-4">
                                            <div class="cpu-load-chart">
                                                <div id="cpu-load-2" class="cpu-load"></div>
                                            </div>
                                            <span style="font-size: 12px; color:darkslategrey;">Time</span>
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

    <script src="index.js"></script>

    <script>
    (function($) {
    "use strict";

    var data1 = [],
        totalPoints = 300;
    var data2 = [],
        totalPoints = 300;
    var data3 = [],
        totalPoints = 300;

    function getRandomData1(valIN) {
        if (data1.length > 0)
            data1 = data1.slice(1);

        // Do a random walk

        while (data1.length < totalPoints) {

            var prev = data1.length > 0 ? data1[data1.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;

            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }

            data1.push(valIN);
        }

        // Zip the generated y values with the x values

        var res = [];
        for (var i = 0; i < data1.length; ++i) {
            res.push([i, data1[i]])
        }

        return res;
    }

    function getRandomData2(valIN) {
        if (data2.length > 0)
            data2 = data2.slice(1);

        // Do a random walk

        while (data2.length < totalPoints) {

            var prev = data2.length > 0 ? data2[data2.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;

            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }

            data2.push(valIN);
        }

        // Zip the generated y values with the x values

        var res = [];
        for (var i = 0; i < data2.length; ++i) {
            res.push([i, data2[i]])
        }

        return res;
    }

    function getRandomData3(valIN) {
        if (data3.length > 0)
            data3 = data3.slice(1);

        // Do a random walk

        while (data3.length < totalPoints) {

            var prev = data3.length > 0 ? data3[data3.length - 1] : 50,
                y = prev + Math.random() * 10 - 5;

            if (y < 0) {
                y = 0;
            } else if (y > 100) {
                y = 100;
            }

            data3.push(valIN);
        }

        // Zip the generated y values with the x values

        var res = [];
        for (var i = 0; i < data3.length; ++i) {
            res.push([i, data3[i]])
        }

        return res;
    }

    // Set up the control widget

    var updateInterval = 100;
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

    var options = {

};

    //graph SNRS

    var plot1 = $.plot("#cpu-load-1", [getRandomData1()], {
        label: "foo",
        series: {
            shadowSize: 0 // Drawing is faster without shadows
        },
        yaxis: {
            min: 0,
            max: 40
        },
        xaxis: {
            show: false
        },
        colors: ["#007BFF"],
        grid: {
            borderColor: {right: "transparent", left:"grey", bottom:"grey", top:"grey"},
            color: "grey",
            hoverable: true,
            borderWidth: 0.5,
            backgroundColor: 'transparent'
        },
        tooltip: true,
        tooltipOpts: {
            content: "Y: %y",
            defaultTheme: false
        }
    });
    function update1() {
        const data1up = Number(document.getElementById("SNRDigit").innerHTML)
        plot1.setData([getRandomData1(data1up)]);
        // Since the axes don't change, we don't need to call plot.setupGrid()
        plot1.draw();
        setTimeout(update1, updateInterval);
    }
    update1();

    // graph SSS

    var plot2 = $.plot("#cpu-load-2", [getRandomData2()], {
        series: {
            shadowSize: 0 // Drawing is faster without shadows
        },
        yaxis: {
            min: -100,
            max: 0
        },
        xaxis: {
            show: false
        },
        colors: ["#007BFF"],
        grid: {
            borderColor: {right: "transparent", left:"grey", bottom:"grey", top:"grey"},
            color: "grey",
            hoverable: true,
            borderWidth: 0.5,
            backgroundColor: 'transparent'
        },
        tooltip: true,
        tooltipOpts: {
            content: "Y: %y",
            defaultTheme: false
        }
    });
    function update2() {
        const data2up = Number(document.getElementById("SSSDigit").innerHTML)
        plot2.setData([getRandomData2(data2up)]);
        // Since the axes don't change, we don't need to call plot.setupGrid()
        plot2.draw();
        setTimeout(update2, updateInterval);
    }
    update2();

    //graph IQAS

    var plot3 = $.plot("#cpu-load-3", [getRandomData3()], {
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
            borderColor: {right: "transparent", left:"grey", bottom:"grey", top:"grey"},
            color: "grey",
            hoverable: true,
            borderWidth: 0.5,
            backgroundColor: 'transparent'
        },
        tooltip: true,
        tooltipOpts: {
            content: "Y: %y",
            defaultTheme: false
        }
    });
    function update3() {
        const data3up = Number(document.getElementById("IQADigit").innerHTML)
        plot3.setData([getRandomData3(data3up)]);
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