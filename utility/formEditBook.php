<?php
$iduser = $_SESSION['id'];

    $id = $_GET['id'] ;
    $data = readData("SELECT * FROM books WHERE idbook = '$id'");
    $data = $data[0];

?>

<div class="container mt-5">
    <h2 class="mb-4">Edit Buku PDF</h2>
    
    <form action="http://localhost/kuliah-web/pertemuan5/utility/functions/edit_book_process.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="upload">
        <input type="hidden" name="id" value="<?=$id?>">
        <input type="hidden" name="nama_file" value="<?=$data['nama_file']?>">
        <div class="form-group">
            <label for="judul">Judul Buku / Makalah / Jurnal :</label>
            <input type="text" value="<?= $data['judul']?>" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="form-group">
            <label for="penulis">Penulis:</label>
            <input type="text" value="<?= $data['penulis']?>" class="form-control" id="penulis" name="penulis" required>
        </div>
        <br>
        <a target="_blank" href="http://localhost/kuliah-web/pertemuan5/books/<?=$data['nama_file']?>">Lihat Buku</a>
        <br>
        <div class="form-group">
            <label for="pdf">Pilih File PDF :</label>
            <input type="file" class="form-control-file" id="pdf" name="book"  >
        </div>
        <br>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Ubah Buku</button>
        </div>
    </form>
</div>
