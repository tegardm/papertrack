<div class="container mt-4">
                <div class="row justify-content-center">
                <div class="col-md-6">
                <h3>Selamat Datang Di PaperTrack Silahkan Login</h3>
                
                    <span class="font-sm opacity-75">  
                        PaperTrack merupakan website manajemen buku PDF yang dapat anda gunakan untuk menyimpan
                        buku buku PDF kalian di database lokal, menggunakan Native PHP dan Boostrap serta
                        sedikit native javascript
                    </span>
                <br><br>
                <div class="card">
                    <div class="card-header">
                        Login PaperTrack
                    </div>
                    
                    <div class="card-body">
                    
                        <form action="utility/functions/login_process.php" method="POST">
                            <input type="hidden" name="submit">
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input pattern="^[a-zA-Z0-9]{9,15}$" required 
                                title="Username harus terdiri dari huruf dan angka, dan panjangnya antara 9 hingga 15 karakter" 
                                type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" pattern="^[a-zA-Z0-9]{9,15}$" required 
                                title="Password harus terdiri dari huruf dan angka, dan panjangnya antara 9 hingga 15 karakter"
                                 class="form-control" id="password" name="password" required>
                            </div>
                            <p style="font-size:15px;  color :gray;" class="fw-light"><a href="lupa_password.php">Lupa Password ?</a></p>  
                          
                            <button type="submit" class="btn btn-primary">Login</button>
                            <button  class="btn btn-success">
                                <a style="text-decoration:none;" 
                                class="text-white underline-none" href="register.php">Register</a>
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>