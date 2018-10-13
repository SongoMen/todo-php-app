<?php 
    include("config.php");
    session_start(); 
    $error ="";

	if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
		$query = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
		$result = mysqli_query($conn, $query);
		$count = mysqli_num_rows($result);
			if($count == "1"){
				$error="Username already exist";
			}
			else{
				$sql = "CREATE TABLE `".$username."`(Id_task INT NOT NULL AUTO_INCREMENT, PRIMARY KEY(Id_task), Task VARCHAR(255), Description VARCHAR(255), Done INT);";
                $sql .="INSERT INTO users (username, password) VALUES ('$username', '$password')";

				if (mysqli_multi_query($conn, $sql)) {
					$error= "Register successful";
				} else {
					echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				}
			}
    mysqli_close($conn);
    }
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Register Page</title>
    <link rel="stylesheet" type="text/css" href="../css files/style.css">
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
        <input type="submit" class="button" name="submit" value="Sign Up" />
		<footer style="top:60px; display:flex;flex-direction:column;justify-content:center;align-items:center;">
			<?php echo $error?>
			<p style="color:#a7adb1">Already have an account ? <a class="footer__a" style="font-weight:700;color:#f44242; text-decoration:none;" href="../index.php"> Sign In</a></p>
		</footer>
    </form>
</div>
<script src= "../js files/scripts.js"></script>
</body>


</html>