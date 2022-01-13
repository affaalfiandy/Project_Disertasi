<?php
session_start();
if (!isset($_SESSION["login"])){
  header("location: ./login.php");
  exit;
}

include_once "../dtbase.php";

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $sql = "DELETE FROM `dataum` WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    
    if(mysqli_affected_rows($conn) > 0){
      echo "<script> alert('Data Berhasil Dihapus'); 
      location.href='./index.php' </script>";
      exit;
    }else{
      echo "<script> alert('Gata Gagal Dihapus'); </script>";
    }
}
?>