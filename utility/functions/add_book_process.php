<?php
require 'functions.php';

if (isset($_POST['upload'])) {
   if (uploadBook() > 0) {
   
    echo '
    <script>
        alert("Buku Berhasil Ditambahkan !");
       document.location.href = "../../list_buku.php";
    </script>
    ';
   }
}
