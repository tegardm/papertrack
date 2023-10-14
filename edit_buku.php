<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    header('Location:home.php');
    exit();
}
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // Selanjutnya, Anda dapat menggunakan $id sesuai dengan kebutuhan aplikasi Anda.
}


?>
<!DOCTYPE html>
<html lang="en">
<?php $titleHead = "Edit Buku Page";
 include_once 'utility/header.php'?>
<body>
<?php include "utility/navbar.php" ?>
<?php include_once "utility/formEditBook.php"?>   

</body>
<?php include_once "utility/footer.php"?>   
</html>