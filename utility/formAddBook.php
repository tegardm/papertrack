<?php
$iduser = $_SESSION['id'];
?>

<div class="container mt-5">
    <h2 class="mb-4">Tambah Buku PDF</h2>
    
    <form action="utility/functions/add_book_process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="upload">
        <input type="hidden" name="uploader" value="<?= $iduser?>">    
        <div class="form-group">
            <label for="judul">Judul Buku / Makalah / Jurnal :</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <br>
        <div class="form-group">
            <label for="penulis">Penulis :</label>
            <input type="text" class="form-control" id="penulis" name="penulis" required>
        </div>
        <br>
        <div class="form-group">
            <label for="pdf">Pilih File PDF :</label>
            <input type="file" class="form-control-file" id="pdf" name="book" accept=".pdf" required>
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Tambah Buku</button>
        </div>
    </form>
</div>
