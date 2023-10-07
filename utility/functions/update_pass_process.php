<?php
require 'functions.php';

if (isset($_POST['submit'])) {
    if (updatePass() > 0) {
        echo "<script>
            alert('Update Password Berhasil');
            document.location.href = '../../home.php';
            </script>";
    } else {
        echo "<script>
            alert('Update Password Gagal');
            document.location.href = '../../profile.php';
            </script>";
    }
}