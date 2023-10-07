<?php
require 'utility/functions/functions.php';

    if (!$_COOKIE['username']) {
        logout();
        echo "<script>
        alert('Sesi Sudah Berakhir Silahkan Login Ulang');
        document.location.href = 'index.php';
        </script>";
        
    }

  
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="home.php">
         PaperTrack</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="tambah_buku.php">Tambah Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="list_buku.php">List Buku</a>
        </li>
        <li class="nav-item">
          
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Lainnya
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" target="_blank" href="https://www.instagram.com/tegar_deyustian/"><i class="bi bi-instagram"></i> Instagram</a></li>
            <li><a class="dropdown-item" target="_blank" href="https://github.com/tegardm"><i class="bi bi-github"></i> Github</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#"><i class="bi bi-file-earmark-code"></i> Source Code</a></li>
          </ul>
        </li>
       
      </ul>
      <button class="btn mx-2 btn-outline-primary">
      <a class="nav-link" href="profile.php">Profile</a>
      </button>  
      <form action="utility/functions/logout_process.php" method="POST" class="d-flex" >
      
      <input type="hidden" class="mx-2" name="logout">
        <button onclick="return confirm('Yakin Ingin Logout ?')" 
        class="btn btn-outline-danger" type="submit">Logout</button>
      </form>
    </div>
  </div>
</nav>