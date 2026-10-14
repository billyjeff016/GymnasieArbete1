<?php
require_once 'assets/validate.php';
require_once 'assets/getdata.php';


session_start();
//$errors = array();
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if(login($username, $password)) {
        $userInfo = getUserInfo($username);
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $userInfo['name'];
        $_SESSION['email'] = $userInfo['email'];
        $_SESSION['password'] = $_POST['password'];
        header("Location: index.php");
        exit();
    } else {
        echo "Felaktigt användarnamn eller lösenord.";
    }
    }
    ?>
    <!DOCTYPE html>
    <html lang="sv">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <script src="script.js"></script>
    </head>
    <body>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br><br>
            <label for="password">Lösenord:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" name="submit" value="Logga in">
        </form>
        <a href="signup.php">Har du inget konto? Registrera dig här</a>
    </body>
    </html>