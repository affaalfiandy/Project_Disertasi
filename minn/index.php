<?php
session_start();
if (!isset($_SESSION["login"])){
  header("location: ./login.php");
  exit;
}

include_once "../dtbase.php";

$sql = "SELECT * FROM dataum";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Halaman Admin</title>

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
                                <h6 class="m-1 mr-4">Selamat datang, <?=$_SESSION["username"]?> </h6>
                                <p style="font-size: 34px;" class="mt-2"> | </p>
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account ml-2"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="./logout.php" class="dropdown-item">
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
                        <a href="../index.php" class="nav-text"><i class="fas fa-globe"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="" ><i class="icon icon-single-04"></i> Admin</a>
                    </li>
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
        <div class="content-body">
            <div class="container-fluid">

                        
                
                <!-- row -->


                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Tabel Data</h4>
                                <a href="tambah.php"><button class="btn btn-large btn-info"><h5 class="text-dark m-1">Tambah Data</h5></button></a>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    

                                    
                                    <table id="example" class="display" style="min-width: 845px">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>Lokasi</th>
                                                <th>Action</th>
                                                <th>SnR Score</th>
                                                <th>Signal Strength</th>
                                                <th>IQA Score</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                                while($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                            <tr class="text-dark">
                                                <td style="min-width: 80px;"><?= $row['nama_tempat']?></td>
                                                <td><?= $row['alamat']?></td>
                                                <td style="min-width: 100px;">
                                                    <a href="./ubah.php?id=<?= $row['id']?>" style="color: blue;">Ubah</a> | 
                                                    <a href="./hapus.php?id=<?= $row['id']?>" style="color: blue;">Hapus</a>
                                                </td>
                                                <td><?= $row['snrs']?></td>
                                                <td><?= $row['sss']?></td>
                                                <td><?= $row['iqas']?></td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                    
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
    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../js/quixnav-init.js"></script>
    <script src="../js/custom.min.js"></script>

    <!-- Datatable -->
    <script src="../vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../js/plugins-init/datatables.init.js"></script>


</body>

</html>