<?php 
   include("php files/config.php");
   session_start(); 
   $error ="";

   $query1 = "if not exists (select * from sysobjects where name='cars' and xtype='U')
   CREATE table users
   (
       Id_user int NOT NULL AUTO_INCREMENT, PRIMARY KEY(id_user), 
       username varchar (50), 
       password varchar (50)
    )";

    $table = mysqli_query($conn, $query1);

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $query = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        
        $count = mysqli_num_rows($result);

        if($count == 1){
            $_SESSION['login_user'] = $username;
            header("location: ../php files/dashboard.php");
            exit();
        }
        else {
            $error = "Your Login Name or Password is invalid";
         }
    }
?>
<html>
<head>
    <base href="/">

    <title>Login Page</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css files/style.css">  
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,600,700" rel="stylesheet">
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
<div class="login-box">
    <form method="POST">
        <label id="username__label">USERNAME</label>
        <input id="username__box" type="text" autocomplete="off" name="username">
        <br/>
        <label id="password__label">PASSWORD</label>
        <input id="password__box" type="password" autocomplete="off" name="password">
        <br/>
        <input type="submit" class="button" name="submit" value="submit" />
        <footer style="top:60px; display:flex;flex-direction:column;justify-content:center;align-items:center;">
			<p style="color:#f44242; font-size:14px;"><?php echo $error?></p>
			<p style="color:#a7adb1">Doesn't have an account?<a class="footer__a" style="font-weight:700;color:#f44242; text-decoration:none;" href="php files/register.php"> Sign Up</a></p>
		</footer>
    </form>
</div>
<script src="js files/scripts.js"></script>
</body>


</html>