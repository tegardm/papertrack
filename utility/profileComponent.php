<?php

$id = $_SESSION['id'];
$username = $_SESSION['username'];

$data = readData("SELECT * FROM user WHERE iduser = '$id'");
$data = $data[0];
?>
<div class="home-container container my-3 px-5 d-flex justify-content-center align-items-center flex-column flex-sm-row">
<img width="400" height="400" src="./img/book.png" alt="">
                        <form style="width:75vw" action="utility/functions/update_pass_process.php" method="POST">
                        <br><br>
                        <h3>Rubah Password Profile Anda...</h3>    
                            <input type="hidden" name="submit">
                            <input type="hidden" name="id" value="<?=$id?>">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password Lama</label>
                                <input type="password" 
                                title="Password harus terdiri dari huruf dan angka, dan panjangnya antara 9 hingga 15 karakter"  pattern="^[a-zA-Z0-9]{9,15}$" 
                                 class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="newpassword" class="form-label">Password Baru</label>
                                <input title="Password harus terdiri dari huruf dan angka, dan panjangnya antara 9 hingga 15 karakter"  pattern="^[a-zA-Z0-9]{9,15}$" 
                                 type="password"  class="form-control" id="newpassword" name="newpassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="renewpassword" class="form-label">Konfirmasi Password Baru</label>
                                <input title="Password harus terdiri dari huruf dan angka, 
                                dan panjangnya antara 9 hingga 15 karakter"  pattern="^[a-zA-Z0-9]{9,15}$" type="password"  class="form-control" id="renewpassword" name="renewpassword" required>
                            </div>
                          
                            <button type="submit" class="btn btn-primary">Rubah Password</button>
                            
                        </form>
</div>