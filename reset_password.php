<?php
require 'utility/functions/functions.php';
session_start();
if (isset($_SESSION['username'])) {
    header('Location:home.php');
    exit();
}



if (isset($_POST['verif'])) {
    $data = readData("SELECT * FROM user");
    $pass = strtolower($_POST['password']);
    $repass = strtolower($_POST['repassword']);
    $hash_password = password_hash($pass, PASSWORD_DEFAULT);
    
      if ($pass != $repass) {
        echo "<script>
        alert('Password Anda Tidak Sama !');
        document.location.href = 'lupa_password.php';
        </script>";
        
    }

    foreach ($data as $user) {
        if ($user['token'] == $_POST['token']) {
            $usertoken = $_POST['token'];
            $syntax = "UPDATE user SET password = '$hash_password' 
            WHERE token = $usertoken";
            if (mysqli_query($db,$syntax)) {
                echo "<script>
                alert('Password Anda Berhasil Di Rubah');
                document.location.href = 'index.php';
                </script>";
            }
            
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<?php $titleHead = "Reset Page";
include_once "utility/header.php"?>
<br><br>
<body class="container">
        <form action="" method="POST">
                            <input type="hidden" name="verif">
                            <div class="mb-3">
                                <label for="token" class="form-label">Token Verifikasi</label>
                                <input placeholder="Masukan Token (Check Pesan di Email Anda)"  required  
                                type="number" class="form-control" id="token" name="token">
                            </div>
                               <div class="mb-3">
                                <label for="password" class="form-label">Password Baru</label>
                                <input title="Password harus terdiri dari huruf dan angka, dan panjangnya antara 9 hingga 15 karakter" type="password"  pattern="^[a-zA-Z0-9]{9,15}$" placeholder="Masukan Password Baru" class="form-control" id="password" name="password" required>
                            </div> 
                          <div class="mb-3">
                                <label for="repassword" class="form-label">Konfirmasi Password Baru</label>
                                <input title="Password harus terdiri dari huruf dan angka, dan panjangnya antara 9 hingga 15 karakter"  pattern="^[a-zA-Z0-9]{9,15}$" type="password" placeholder="Masukan Password Baru Kembali" class="form-control" id="repassword" name="repassword" required>
                            </div>
        <button type="submit">Verifikasi</button>
        </form>
 
    
</body>

<?php include_once "utility/footer.php"?>

</html>