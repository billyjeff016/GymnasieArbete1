<?php
require_once 'assets/connections.php';
$error=false;
session_start();
if (isset($_POST['submit'])) {
if (isset($_POST['username'])) {
        /*$username = $_POST['username'];
        $name = $_POST['name'];
        $email = $_POST['email'];*/
        $password = $_POST['password'];
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $username = trim(filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $name = trim(filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS));
        $email = trim(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL));

        if (addUser([
            'username' => $username,
            'name' => $name,
            'email' => $email,
            'password' => $passwordHash
        ])) {
        $_SESSION['username'] = $username;
        $_SESSION['name'] = $name;
        $_SESSION['email'] = $email;
        //header("Location: profil.php");
        exit();
        }
        } else {
            $error = true;
        }
    } else {
        $error = true;
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="script.js"></script>
</head>
<body>
    <?php
    if ($error) {
        echo "Något gick fel. Försök igen.";
    }
    ?>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="name">Namn:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <br><br>
        <label for="password">Lösenord:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <input type="submit" name="submit" value="Sign in">
    </form>
    <a href="login.php">Har du redan ett konto? Logga in här</a>
</body>
</html>