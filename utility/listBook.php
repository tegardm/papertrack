<?php 
$iduser = $_SESSION['id'];
$username = $_SESSION['username'];


$booksCount = count(readData("SELECT * FROM books WHERE uploader_id = '$iduser'"));
$bookEachPage = 2;
$pageCount = ceil($booksCount / $bookEachPage);
$activePage = isset($_GET['page']) ? $_GET['page'] : 1; 
$startData = ($bookEachPage * $activePage) - $bookEachPage;


if (isset($_POST['search'])) {
  setcookie("search",$_POST['search']);
  $keyword = $_POST['keyword'];
  $books = readData("SELECT * FROM books WHERE uploader_id = 
  '$iduser' AND (penulis LIKE '%$keyword%' OR judul LIKE '%$keyword%') 
  ");
   $size = count($books);
  $pageCount = ceil($size/$bookEachPage);


}  else {
  $books = readData("SELECT * FROM books WHERE uploader_id = 
  $iduser ");
  $size = count($books);
}



?>

    <br><br>
    <h3>Jumlah Buku Digital Anda Di PaperTrack  Adalah <span class="text-success"><?php echo strtoupper($size)?> Buku</span></h3>
    <br>
    <!-- <form style="max-width:50vw" action="list_buku.php" method="post" class="d-flex">
    <input type="hidden" name="search">
      <input autocomplete="off" 
      value="<?php isset($_POST['keyword']) ? $_POST['keyword'] : ''?>"
       placeholder="Masukan Keyword Untuk Melakukan Filter Data Pencarian.." 
      class=" form-control" type="text" name="keyword" id="">
      <input  class="mx-3 btn btn-primary" type="submit" value="Search">
    </form> -->
    <br>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
 
    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="script.js"></script>
    
    <div class="container">
    <table id="example" class="table table-striped" style="width:100%">
    <thead>
    <tr>
      <th scope="col" class="text-center align-middle">Nomer</th>
      <th scope="col" class="text-center align-middle">Judul Buku</th>
      <th scope="col" class="text-center align-middle">Penulis Buku</th>
      <th scope="col" class="text-center align-middle">Tanggal Perubahan Terakhir</th>
      <th scope="col" class="text-center align-middle">Waktu Perubahan Terakhir</th>
      <th scope="col" class="text-center align-middle">Buku Digital</th>
      <th scope="col" class="text-center align-middle">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 1; 
    foreach($books as $book) : ?>
        <tr>
        <td  class="text-center align-middle" scope="row"><?= $i ?></td>
        <td  class="text-center align-middle"><?= $book['judul']?></td>
        <td  class="text-center align-middle"><?= $book['penulis']?></td>
        <td  class="text-center align-middle"><?= $book['date']?></td>
        <td  class="text-center align-middle"><?= $book['time']?></td>
        <td  class="text-center align-middle"><a target="_blank" 
        href="books/<?= $book['nama_file']?>">Baca Disini</a></td>
      <td  class="text-center align-middle">
        <a onclick="return confirm('Yakin Mau Menghapus PDF Ini ?')" class="text-danger"
        href="utility/functions/delete_book.php?id=<?= $book['idbook']?>&name=<?=$book['nama_file']?>">Hapus</a><br>
        <a class="text-success" href="edit_buku/<?= $book['idbook']?>">Edit</a>
      </td>
    </tr>
    <?php $i++; endforeach ?>
  </tbody>
</table>
</div>

