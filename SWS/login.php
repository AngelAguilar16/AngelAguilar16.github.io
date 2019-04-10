<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>
    <link rel="icon" type="image/png" href="img/logo_coco.png">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400i" rel="stylesheet"> 
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
         include("config.php");
         session_start();
         
         if($_SERVER["REQUEST_METHOD"] == "POST") {
            // username and password sent from form 
            
            $myusername = mysqli_real_escape_string($db,$_POST['user']);
            $mypassword = mysqli_real_escape_string($db,$_POST['pass']); 
            
            $sql = "SELECT id FROM users WHERE user = '$myusername' and pass = '$mypassword'";
            $result = mysqli_query($db,$sql);
            $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
            $active = $row['id'];
            
            $count = mysqli_num_rows($result);
            
            // If result matched $myusername and $mypassword, table row must be 1 row
              
            if($count == 1) {
               $_SESSION['login_user'] = $myusername;
               
               header("location: welcome.html");
            }else {
               $error = "Your Login Name or Password is invalid";
            }
         }
    ?>
    <nav>
        <u id="menu">
            <i><a href="index.php">Inicio</a></i>
            <i><a href="weather.php">Clima</a></i>
            <i><a href="about.html">Acerca</a></i>
            <i><a href="login.php">Inicio de sesion</a></i>
        </u>
    </nav>
    <form action="" method="POST" id="loginForm">
        <input type="text" placeholder="Usuario" id="user" name="user">
        <br><br>
        <input type="password" placeholder="Contraseña" id="pass" name="pass">
        <br><br>
        <!--<div class="g-recaptcha" id="captcha" data-sitekey="6LcFdpcUAAAAAFLEZLu5RUonL7t5QJo04suN_CoY"></div>-->
        <input type="submit" id="login" value="Log In">
    </form>
    <a href="signup.html" id="signup">Sign Up</a>
    <br><br>
    <!--<button class="btnLan" id="esp" onclick="language(0)">Español</button>-->
    <!--<button class="btnLan" id="en" onclick="language(1)">Ingles</button>-->
    <br><br>
    <footer>
         <span>&copy; 2019 Coco Tech Solutions</span>
    </footer>
    <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>-->
    <script src="js/script.js"></script>
</body>
</html>