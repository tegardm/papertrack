<?php 
require 'functions.php';

if (isset($_POST['submit'])) {
    
    if (insertRegis($_POST) > 0) {
        echo "
        <script>
            alert(' Registrasi Akun Untuk PaperTrack Berhasil !!!');
            document.location.href = '../../index.php';
        </script>
        ";
    } else {
        die;
    }

   
};
?>