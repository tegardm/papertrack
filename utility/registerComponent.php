<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
            <h3> Silahkan Register Dan Masukan Informasi Yang Sesuai</h3>
            <br>
                <div class="card">
                    <div class="card-header">
                        Register Akun
                    </div>
                    
                    <div class="card-body">
                    
                        <form action="utility/functions/register_process.php" method="POST">
                            <input type="hidden" name="submit">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" pattern="^[a-zA-Z0-9]{9,15}$" required 
                                title="Username harus terdiri dari huruf dan angka, dan panjangnya antara 9 hingga 15 karakter"
                                class="form-control" id="username" name="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" 
                                pattern="^[a-zA-Z0-9]{9,15}$" required 
                                title="Password harus terdiri dari huruf dan angka, dan panjangnya antara 9 hingga 15 karakter"
                                 class="form-control" id="password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="repassword" class="form-label">Konfirmasi Password</label>
                                <input type="password"
                                pattern="^[a-zA-Z0-9]{9,15}$" required 
                                title="Password harus terdiri dari huruf dan angka, dan panjangnya antara 9 hingga 15 karakter"
                                class="form-control" id="repassword" name="repassword" required>
                            </div>
                            <div class="mb-3">
                                <label for="hint" class="form-label">Masukan Buah Favorit Anda</label>
                                <input type="text" pattern="^[a-zA-Z]+$" required 
                                title="Hint hanya boleh berisi huruf" class="form-control" 
                                id="hint" name="hint" required>
                            </div>
                          
                            <button type="submit" name="submit" class="btn btn-primary">Register</button>
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