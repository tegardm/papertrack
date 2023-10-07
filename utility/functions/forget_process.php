<?php
require 'functions.php';

if (isset($_POST['verif'])) {
    if (verificationPassword($_POST) > 0) {
        echo '
        <script>
            alert("Pemulihan Password Anda Berhasil");
            document.location.href = "../../index.php";
        </script>
        ';
    }
}

?>