<?php
session_start();
if (!isset($_SESSION["login"])){
  header("location: ./login.php");
  exit;
}

include_once "../dtbase.php";

$id = $_GET['id'];

$sql = "SELECT * FROM `dataum` WHERE id = $id";
$result = mysqli_query($conn, $sql);


if (isset($_POST['ubah'])){

$nama_tempat = mysqli_real_escape_string($conn, $_POST['nama_tempat']);
$snrs = mysqli_real_escape_string($conn, $_POST['snrs']);
$sss = mysqli_real_escape_string($conn, $_POST['sss']);
$iqas = mysqli_real_escape_string($conn, $_POST['iqas']);
$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);
$tschannelid = mysqli_real_escape_string($conn, $_POST['tschannelid']);
$alamat_transmitter = mysqli_real_escape_string($conn, $_POST['alamat_transmitter']);
$device_long = mysqli_real_escape_string($conn, $_POST['device_long']);
$device_lat = mysqli_real_escape_string($conn, $_POST['device_lat']);
$dtvt_long = mysqli_real_escape_string($conn, $_POST['dtvt_long']);
$dtvt_lat = mysqli_real_escape_string($conn, $_POST['dtvt_lat']);

$sql = "UPDATE `dataum` 
        SET `nama_tempat`='$nama_tempat',
            `snrs`='$snrs',
            `sss`='$sss',
            `iqas`='$iqas',
            `alamat`='$alamat',
            `tschannelid`='$tschannelid',
            `alamat_transmitter`='$alamat_transmitter',
            `device_long`='$device_long',
            `device_lat`='$device_lat',
            `dtvt_long`='$dtvt_long',
            `dtvt_lat`='$dtvt_lat'
        WHERE `id` = $id";
$result = mysqli_query($conn, $sql);

if (mysqli_affected_rows($conn) > 0) {
    echo "<script>alert('Data has been changed'); 
    location.href='index.php'</script>";
    exit;
}else{
    echo "<script>alert('Fail to change this data');
    location.href='index.php'</script>";
    exit;
}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>UGTVM Admin</title>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <!-- Datatable -->
    <link href="../vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
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
            <a href="../index.php" class="brand-logo">
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
                                <h6 class="m-1 mr-4">Welcome, <?=$_SESSION["username"]?> </h6>
                                <p style="font-size: 34px;" class="mt-2"> | </p>
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="fas fa-user ml-2"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="logout.php" class="dropdown-item">
                                        <i class="fas fa-power-off"></i>
                                        <span class="ml-2">Logout</span>
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
                    <li>
                        <a href="#"><i class="fas fa-file-export"></i><span class="nav-text">Export Data</span></a>
                    </li>
                    <li>
                        <a href="./index.php" class="nav-text"><i class="fas fa-user"></i><span class="nav-text">Admin</span></a>
                    </li>
                </ul>
            </div>
    

        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Edit data</h4>
                        <h3><a href="./index.php">&times;</a></h3>
                    </div>
                    <div class="card-body text-dark">
                        <div class="basic-form">
                            <form action="" method="post">

                                <?php
                                    while($row = mysqli_fetch_assoc($result)) {
                                ?>

                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label>Place name</label>
                                        <input type="text" name="nama_tempat" class="form-control" placeholder="..." autocomplete="off" value="<?= $row["nama_tempat"]?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label>Device Location Name</label>
                                        <input type="text" name="alamat" class="form-control" placeholder="..." autocomplete="off" value="<?= $row["alamat"]?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Device Location Latitude</label>
                                        <input type="text" name="device_lat" class="form-control" placeholder="..." autocomplete="off" value="<?= $row["device_lat"]?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Device Location Longitude</label>
                                        <input type="text" name="device_long" class="form-control" placeholder="..." autocomplete="off" value="<?= $row["device_long"]?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label>TS Channel ID</label>
                                        <input type="text" name="tschannelid" class="form-control" placeholder="..." autocomplete="off" value="<?= $row["tschannelid"]?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>IQA Score Field Number</label>
                                        <input type="text" name="iqas" class="form-control" placeholder="..." autocomplete="off" value="<?= $row["iqas"]?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>SnR Filed Number</label>
                                        <input type="text" name="snrs" class="form-control" placeholder="..." autocomplete="off" value="<?= $row["snrs"]?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Signal Strength Field Number</label>
                                        <input type="text" name="sss" class="form-control" placeholder="..." autocomplete="off" value="<?= $row["sss"]?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-7">
                                        <label>Digital TV Transmitter Location Name</label>
                                        <input type="text" name="alamat_transmitter" class="form-control" placeholder="..." autocomplete="off" value="<?= $row["alamat_transmitter"]?>">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label>Digital TV Transmitter Location Latitude</label>
                                        <input type="text" name="dtvt_lat" class="form-control" placeholder="..." autocomplete="off" value="<?= $row["dtvt_lat"]?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Digital TV Transmitter Location Longitude</label>
                                        <input type="text" name="dtvt_long" class="form-control" placeholder="..." autocomplete="off" value="<?= $row["dtvt_long"]?>">
                                    </div>
                                </div>
                                <button type="submit" name="ubah" class="btn btn-primary">Edit</button>

                                <?php
                                    }
                                ?>

                            </form>
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
                <p>Copyright ?? 2022</p>
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
    <script src="../vendor/global/global.min.js"></script>
    <script src="../js/quixnav-init.js"></script>
    <script src="../js/custom.min.js"></script>

    <!-- Datatable -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../js/plugins-init/datatables.init.js"></script>


</body>

</html>