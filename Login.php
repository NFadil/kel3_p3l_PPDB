<!DOCTYPE html>
<html>
<head>
	<title>Slide Navbar</title>
    <link rel="stylesheet" type="text/css" href="asset/style.css">
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
<?php
        session_start();
        include "Koneksi.php";
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
        $user = $_POST['username'];
        $pass = $_POST['password'];

        $sql = mysqli_query($conn,"select * from login where username='$user' and password='$pass'");
        
        $cek = mysqli_num_rows($sql);

        // cek apakah username dan password ditemukan pada database
        if($cek > 0){
            // buat session login dan username
            $_SESSION['username'] = $user;
            // alihkan ke halaman dashboard admin
            header('location:index.php');

        }
    }
?>
	<div class="main">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form method = "POST">
					<label for="chk" aria-hidden="true">Sign up</label>
					<input type="text" name="txt" placeholder="User name" required="">
					<input type="email" name="email" placeholder="Email" required="">
					<input type="password" name="pswd" placeholder="Password" required="">
					<button>Sign up</button>
				</form>
			</div>

			<div class="login">
				<form  method="POST">
					<label for="chk" aria-hidden="true">Login</label>
					<input type="text" name="username" placeholder="Username" required="">
					<input type="password" name="password" placeholder="Password" required="">
					<button>Login</button>
				</form>
			</div>
	</div>
</body>
</html>