<?php
session_start();

include_once "../dtbase.php";

if (isset($_POST["signup"])){
    if($_POST["password"] != $_POST["password2"]){
        echo "<script>alert('Konfirmasi password salah'); 
        location.href='./regist.php'</script>";
    }else{
        $username = strtolower(stripslashes($_POST["username"]));
        $password = $_POST["password"];

        $result = mysqli_query($conn, "SELECT username FROM `minnum` WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)){
            echo "<script>alert('Username tidak tersedia'); 
            location.href='./regist.php'</script>";

        }else{
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($conn, "INSERT INTO `minnum` VALUES('','$username','$password')");
        echo "<script>alert('Data Berhasil Ditambahkan'); 
        location.href='./login.php'</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Registrasi Admin</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Register</h4>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Konfirmasi Password</strong></label>
                                            <input type="password" name="password2" class="form-control">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="signup" class="btn btn-primary btn-block">Sign Up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Sudah punya akun? <a class="text-primary" href="./login.php">Silahkan Login</a></p>
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
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="../vendor/global/global.min.js"></script>
    <script src="../js/quixnav-init.js"></script>
    <script src="../js/custom.min.js"></script>

</body>

</html>