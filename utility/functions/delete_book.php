<?php
require 'functions.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $syntax = "DELETE FROM books WHERE idbook = '$id'";
    if (deleteBook($syntax) > 0) {
        echo "<script>
        alert('Hapus Buku Berhasil');
        document.location.href = '../../list_buku.php';
        </script>";
    } else {
        echo "<script>
        alert('Hapus Buku Gagal');
        document.location.href = '../../list_buku.php';
        </script>";
    }
}

?>