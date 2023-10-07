<?php
session_start();
if (isset($_SESSION['username'])) {
    header('Location:home.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<?php $titleHead = "Lupa Password Page";
 include_once 'utility/header.php'?>
<body>
<?php include_once "utility/forgetComponent.php"?>   

</body>
<?php include_once "utility/footer.php"?>   
</html>