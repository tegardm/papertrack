<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location:index.php');
    exit();
} else {
    $username = $_SESSION['username'] ? $_SESSION['username'] : '';
}

?>

<!DOCTYPE html>
<html lang="en">
<?php 
$titleHead = "Home Page";
include "utility/header.php";
?>
<body>
<?php include "utility/navbar.php" ?>
<div class="home-container container my-3 px-5 d-flex justify-content-center align-items-center flex-column flex-sm-row">

    <div>   
    <h2>Selamat Datang <span class="text-success"><?php echo(strtoupper($username)) ?></span> Di PaperTrack</h2>
    <p>
      PaperTrack merupakan website manajemen buku PDF yang dapat anda gunakan untuk menyimpan
      buku buku PDF kalian di database lokal, menggunakan Native PHP dan Boostrap serta
      sedikit native javascript,sederhananya PaperTrack ini memungkinkan kita 
      melakukan CRUD File PDF kalian secara mudah serta di lengkapi fitur login 
      dan register, sehingga setiap akun dapat menyimpan buku nya masing - masing
    </p>
    </div>
    <img src="./img/book.png" width="400" alt="">
</div>

   
</body>
<?php include_once "utility/footer.php"?>

</html>