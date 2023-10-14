<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="card">
                    <div class="card-header">
                        Reset PaperTrack
                    </div>
                    
                    <div class="card-body">
                    
                        <form action="reset_process.php" method="POST">
                            <input type="hidden" name="submit">
                            <div class="mb-3">
                                <label for="username" class="form-label">Token Verifikasi</label>
                                <input placeholder="Masukan Username" pattern="^[a-zA-Z0-9]{9,15}$" required 
                                title="Username harus terdiri dari huruf dan angka, dan panjangnya antara 9 hingga 15 karakter" 
                                type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Password Baru</label>
                                <input placeholder="Masukan Username" pattern="^[a-zA-Z0-9]{9,15}$" required 
                                title="Username harus terdiri dari huruf dan angka, dan panjangnya antara 9 hingga 15 karakter" 
                                type="text" class="form-control" id="username" name="username">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Konfirmasi Password Baru</label>
                                <input type="password"  placeholder="Masukan Password" pattern="^[a-zA-Z0-9]{9,15}$" required 
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
</body>
</html>