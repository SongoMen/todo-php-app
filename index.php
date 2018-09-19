<?php 
   include("php files/config.php");
   session_start(); 
   $error ="";

    if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
        
        $query = "SELECT * FROM users WHERE username = '$username' and password = '$password'";
        $result = mysqli_query($conn, $query);

        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $active = $row['active'];
        
        $count = mysqli_num_rows($result);

        if($count == 1){
            $_SESSION['login_user'] = $username;
            header("location: ../php files/dashboard.php");
        }
        else {
            $error = "Your Login Name or Password is invalid";
         }
    }

    /*if(isset($_POST['submit'])){
        $username=$_POST['username'];
        $password=$_POST['password'];
            $sql = "INSERT INTO users (username, password)
        VALUES ('$username', '$password')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    mysqli_close($conn);
    }*/
?>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Page</title>
    <base href="/">
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
    </form>
    <?php echo $error?>
</div>
<script src="js files/scripts.js"></script>
</body>


</html>