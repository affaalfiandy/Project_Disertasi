<?php
session_start();

include_once "../dtbase.php";

if (isset($_SESSION["login"])){
  header("location:./index.php");
  exit;
}

if (isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM `minnum` WHERE username = '$username'");

    if(mysqli_num_rows($result) === 1 ){
        $row = mysqli_fetch_assoc($result);

        if(password_verify($password, $row["password"])){
        $_SESSION["login"] = true;
        $_SESSION["username"] = $username;
        header("location:./index.php");
        exit;

        }else{
            echo "<script>alert('Wrong username or password');</script>";
            $error = true;
        }
            
    }else{
        $error = true;
    }
       
}

?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Login Admin</title>
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
                                    <h4 class="text-center mb-4">Login</h4>
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>don't have an account? <a class="text-primary" href="./regist.php">Sign up here</a></p>
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