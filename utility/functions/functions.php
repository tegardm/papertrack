<?php

$db = mysqli_connect("localhost","root","","papertrack");

function readData($syntax) {
    global $db;

    $result = mysqli_query($db, $syntax);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }

    return $rows;
}

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

function insertRegis ($data) {
    global $db;
    
    $username = strtolower($data['username']);
    $password = strtolower($data['password']) ;
    $repassword = $data['repassword'];
    $email = strtolower( $data['email']);
    $hint = strtolower($data['hint']);

    

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



function login($data) {
    session_start();
    $users = readData("SELECT * FROM user");
    $username =$data['username'];
    $password = $data['password'];
    $success = false;
  
    foreach($users as $user) {
       
        if (password_verify($password, $user['password']) && $username == $user['username']) {
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


function logout() {
    $_SESSION = array();
    session_destroy();

 }


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

 function verificationPassword($data) {
    $hint = strtolower($data['hint']);
    $email = strtolower($data['email']);
    $pass = strtolower($data['password']);
    $repass = strtolower($data['repassword']);
    $username = strtolower($data['username']);

    $users = readData("SELECT * FROM user WHERE hint = '$hint' 
    AND email = '$email' AND username = '$username'");
   
    $users ? $user = $users[0] : '';

    if ($pass != $repass) {
        echo "<script>
        alert('Password Anda Tidak Sama !');
        document.location.href = '../../lupa_password.php';
        </script>";
        
    }

    if(isset($user)) {
        $data = readData("SELECT * FROM user");


        
        foreach ($data as $person) {
            if ($user['username'] == $person['username']
                && $user['hint'] == $person['hint']
                && $user['email'] == $person['email'] ) {
                    $username = $user['username'];
                    $hint = $user['hint'];
                    $email = $user['email'];
                    $hash_password = password_hash($pass, PASSWORD_DEFAULT);
                    $user['password'] = $hash_password;
                    global $db; 
                    $syntax = "UPDATE user SET password = '$hash_password' 
                    WHERE username = '$username' AND hint = '$hint' AND email = '$email'";
                    mysqli_query($db,$syntax);
                    return mysqli_affected_rows($db);
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