<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    header('Location:home.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php $titleHead = "Tambah Buku Page";
 include_once 'utility/header.php'?>
<body>
<?php include "utility/navbar.php" ?>
<?php include_once "utility/listBook.php"?>   

</body>
<?php include_once "utility/footer.php"?>   
</html>