<?php 
 require 'functions.php';
 session_start();


 if (isset($_POST['logout'])) {
    logout();
    header('Location: ../../index.php');
    exit();
 }



