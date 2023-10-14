<?php


require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
$db = mysqli_connect("localhost","root","","papertrack");


// Fungsi Read Data
function readData($syntax) {
    global $db;

    $result = mysqli_query($db, $syntax);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}
// Fungsi Update Password
function updatePass() {
    global $db;
    $id = $_POST['id'];
    $oldPass = $_POST['password'];
    $newPass = $_POST['newpassword'];
    $renewPass = $_POST['renewpassword'];

    $data = readData("SELECT * FROM user WHERE iduser = $id");
    $data = $data[0];
    $database_pass = $data['password'];
    if (password_verify($oldPass, $database_pass) && $newPass == $renewPass) {
        $newPass = password_hash($newPass,PASSWORD_DEFAULT);
        $syntax = "UPDATE user SET password = '$newPass' WHERE iduser = $id";
        mysqli_query($db,$syntax);
    } else {
        return false;     
    }
    return mysqli_affected_rows($db);

}
// Fungsi Registrasi User
function insertRegis ($data) {
    global $db;
    
    $username = strtolower($data['username']);
    $password = strtolower($data['password']) ;
    $repassword = $data['repassword'];
    $email = strtolower( $data['email']);
    $hint = strtolower($data['hint']);

    $users = readData("SELECT * FROM user");
    foreach($users as $user) {
        if ($user['username'] == $username || $user['email'] == $email) {
            echo "<script>
            alert('Registrasi Anda Gagal, Username / Email Tersebut Sudah Digunakan');
            document.location.href = '../../register.php';
            </script>";
        return false;
        }
    }
    

    if ($password != $repassword) {
        echo "<script>
            alert('Registrasi Anda Gagal, Password Tidak Sama !');
            document.location.href = '../../register.php';
            </script>";
        return false;
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $syntax = "INSERT INTO user (username,password,email,hint) VALUES
        ('$username','$hashed_password','$email','$hint');";

        mysqli_query($db,$syntax);

        return mysqli_affected_rows($db);
    }
}


// Fungsi Login
function login($data) {
    session_start();
    $users = readData("SELECT * FROM user");
    $username =$data['username'];
    $password = $data['password'];
    $success = false;
  
    foreach($users as $user) {
       
        if (password_verify($password, $user['password']) 
            && $username == $user['username']) {
            $success = true;
            $cookieName = "username";
            $cookieValue = $username;
            $time = time() + 3600;
            setcookie($cookieName,$cookieValue, $time, "/");
            $_SESSION['username'] = $username;
            $_SESSION['id'] = $user['iduser'];

        }
       
    }

    if ($success) {
        echo "<script>
        alert('Login Anda Berhasil !');
        document.location.href = '../../home.php';
        </script>";
        return true;
    } else {
        echo "<script>
        alert('Login Anda Gagal Password atau Username Salah !');
        document.location.href = '../../index.php';
        </script>";
        return false;
        
    }
}

// Fungsi Logout
function logout() {
    $_SESSION = array();
    session_destroy();

 }

// Fungsi Edit Buku
 function editBook () {
    global $db;
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $old_file_name = $_POST['nama_file'];
    $id = $_POST['id'];
    $file_name = uploadFileBook();
    $timestamp = time(); // Contoh timestamp saat ini
    $date = date('Y-m-d H:i', $timestamp);
    $times = explode(" ",$date);
    $tanggal = $times[0];
    $waktu = $times[1];

    if ($file_name) {
        $file = "../../books/$old_file_name";
        var_dump($file);
        if (unlink($file)) {
            echo "Hapus Buku File Berhasil";
        }
       
        $syntax = "UPDATE books SET judul = '$judul',penulis = '$penulis', 
        nama_file = '$file_name', date = '$tanggal', time = '$waktu' WHERE idbook = '$id'";
 
    } else {
        $syntax = "UPDATE books SET judul = '$judul',penulis = '$penulis',
         date = '$tanggal', time = '$waktu'
         WHERE idbook = '$id'";
    }
    
    

    mysqli_query($db, $syntax);

    return mysqli_affected_rows($db);
 }

// Fungsi Hapus Buku
 function deleteBook($syntax) {
    global $db;
    mysqli_query($db,$syntax);
    $file_name = $_GET['name'];
    $file = "../../books/$file_name";
    if(file_exists($file)) {
        unlink($file);
    }
    return mysqli_affected_rows($db);

    
 }
// Fungsi Simpan File Buku
 function uploadFileBook () {
    $nama = $_FILES['book']['name'];
    $ukuran = $_FILES['book']['size'];
    $error = $_FILES['book']['error'];
    $tmpFile = $_FILES['book']['tmp_name'];



    $ekstensiFile = 'pdf';
    $uploadedEkstensi = explode('.',$nama);
    $uploadedEkstensi = strtolower(end($uploadedEkstensi));
    if ($uploadedEkstensi != $ekstensiFile) {
        echo '
        <script>
            File Yang Di Upload Bukan PDF.
        </script>
        ';
        return false;
    }

    if ($ukuran > 50000000) {
        echo '
        <script>
            File Yang Di Upload Lebih Dari 50 MB.
        </script>
        ';
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $uploadedEkstensi;
   

    move_uploaded_file($tmpFile, '../../books/'.$namaFileBaru);

    return $namaFileBaru;
 }

// Fungsi Simpan Data Buku
 function uploadBook () {
    global $db;
    $uploaderId = $_POST['uploader'];
    $judulBuku = $_POST['judul'];
    $penulisBuku = $_POST['penulis'];
    $namaFile = uploadFileBook();
    $timestamp = time(); // Contoh timestamp saat ini
    $date = date('Y-m-d H:i', $timestamp);
    $times = explode(" ",$date);
    $tanggal = $times[0];
    $waktu = $times[1];
    $syntax = "INSERT INTO books (judul,penulis,nama_file,uploader_id,date,time) 
    VALUES ('$judulBuku','$penulisBuku','$namaFile','$uploaderId','$tanggal','$waktu');";

    mysqli_query($db,$syntax);

    return mysqli_affected_rows($db);
 }

//  Fungsi Lupa Password
 function verificationPassword($data) {
    
    $hint = strtolower($data['hint']);
    $email = strtolower($data['email']);
   
    $username = strtolower($data['username']);
    $token = '';
    for ($i = 0; $i < 4; $i++) {
    $randomDigit = mt_rand(0, 9); // Angka acak antara 0 dan 9
    $token .= $randomDigit;
}   


    $users = readData("SELECT * FROM user WHERE hint = '$hint' 
    AND email = '$email' AND username = '$username'");
   
    $users ? $user = $users[0] : '';

  

    if(isset($user)) {
        $data = readData("SELECT * FROM user");

        foreach ($data as $person) {
            if ($user['username'] == $person['username']
                && $user['hint'] == $person['hint']
                && $user['email'] == $person['email'] ) {
                    try {
                        $mail = new PHPMailer(true);
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'dedeyusufmuslim@gmail.com';                     //SMTP username
                        $mail->Password   = 'zcgo amvp hxvc aklv';                               //SMTP password
                        $mail->SMTPSecure = 'ssl';            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
                 
                
                        //Recipients
                        $mail->setFrom($email, $username);
                        $mail->addAddress('dedeyusufmuslim@gmail.com');               //Name is optional
                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'Verifikasi Password Untuk PaperTrack';
                        $mail->Body    = "Berikut Merupakan Kode Token Verifikasi Password Anda : $token";
                        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
                    
                        $mail->send();
                        // echo 'Message has been sent';
                        $username = $user['username'];
                        $hint = $user['hint'];
                        $email = $user['email'];
                      
                        global $db; 
                        $syntax = "UPDATE user SET token = '$token' 
                        WHERE username = '$username' AND hint = '$hint' AND email = '$email'";
                        mysqli_query($db,$syntax);
                        return mysqli_affected_rows($db);
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    
                    
                }
        }

       
    } else {
        echo "<script>
        alert('Verifikasi Gagal : Data Tersebut Tersebut Tidak Ditemukan');
        document.location.href = '../../lupa_password.php';
        </script>";
        
    }
 }
?>