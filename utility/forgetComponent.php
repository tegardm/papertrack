<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <h3>Silahkan Memasukan Data Dibawah Untuk Memulihkan Password Anda..</h3>
            <br>
                <div class="card">
                    <div class="card-header">
                        Lupa Password
                    </div>
                    
                    <div class="card-body">
                    
                        <form action="utility/functions/forget_process.php" method="POST">
                            <input type="hidden" name="verif">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input title="Username harus terdiri dari huruf dan angka, dan panjangnya antara 9 hingga 15 karakter" type="text" pattern="^[a-zA-Z0-9]{9,15}$" placeholder="Masukan Username" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Anda</label>
                                <input type="email" placeholder="Masukan Email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="hint" class="form-label">Hint (Buah Favorit Anda)</label>
                                <input type="text"  title="Hint hanya boleh berisi huruf" pattern="^[a-zA-Z]+$"  placeholder="Masukan Hint" class="form-control" id="hint" name="hint" required>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <input title="Password harus terdiri dari huruf dan angka, dan panjangnya antara 9 hingga 15 karakter" type="password"  pattern="^[a-zA-Z0-9]{9,15}$" placeholder="Masukan Password Baru" class="form-control" id="password" name="password" required>
                            </div> -->
                            <!-- <div class="mb-3">
                                <label for="repassword" class="form-label">Konfirmasi Password Baru</label>
                                <input title="Password harus terdiri dari huruf dan angka, dan panjangnya antara 9 hingga 15 karakter"  pattern="^[a-zA-Z0-9]{9,15}$" type="password" placeholder="Masukan Password Baru Kembali" class="form-control" id="repassword" name="repassword" required>
                            </div> -->
                          
                            <button type="submit" class="btn btn-primary">Verifikasi</button>
                            <button  class="btn btn-success">
                                <a style="text-decoration:none;" 
                                class="text-white underline-none" href="index.php">Login</a>
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>