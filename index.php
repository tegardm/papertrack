<?php

session_start();
if (isset($_SESSION['username'])) {
    header('Location:home.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<?php $titleHead = "Login Page";
include_once "utility/header.php"?>
<body class="container">
  
    <?php include_once "utility/loginComponent.php"?>
    
</body>
<?php include_once "utility/footer.php"?>

</html>