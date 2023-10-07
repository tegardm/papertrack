<?php
require 'functions.php';
if (isset($_POST['upload'])) {
    if (editBook() > 0) {
        echo "<script>
            alert('Update Buku Berhasil');
            document.location.href = '../../list_buku.php';
            </script>";
    } else {
        echo "<script>
            alert('Update Buku Gagal');
            document.location.href = '../../list_buku.php';
            </script>";
    }
}
?>