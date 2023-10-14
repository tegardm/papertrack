<?php

require 'functions.php';

if (isset($_POST['verif'])) {
  
    if (verificationPassword($_POST) > 0) {
        echo '
        <script>
            alert("Token Anda Berhasil Terkirim");
            document.location.href = "../../reset_password.php";
        </script>
        ';
    }
}

?>