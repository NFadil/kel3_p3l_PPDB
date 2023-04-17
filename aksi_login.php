<?php
        session_start();
        include "Koneksi.php";
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $sql = mysqli_query($conn,"select * from user where username='$user' and password='$pass'");
        
        $cek = mysqli_num_rows($sql);

        // cek apakah username dan password ditemukan pada database
        if($cek > 0){
            // buat session login dan username
            $_SESSION['username'] = $user;
            // alihkan ke halaman dashboard admin
            header("location:index.php");

            
        }
    }
    ?>