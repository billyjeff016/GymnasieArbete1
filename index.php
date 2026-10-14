<?php
require_once 'assets/validate.php';
require_once 'assets/getdata.php';
session_start();
print_r($_SESSION);
?>

<!DOCTYPE html>
<html lang="en">
    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" />
    <title>Document</title>
</head>

<body>
<nav>
    <ul>
        <li>
           <a href="index.php"><button>Home</button></a>
        </li>
        <li>
            <a href="profil.php"><button>Profil</button></a>
        </li>
        <div class="search-container">

    </li>
    <li>
        <label for="search">Search:</label>
        <input type="text" id="search" name="search">
        <a href="searchsite.php"><button class="search-button"></button></a>
    </li>
</div>
        <li>
            <a href="login.php"><button>Login</button></a>
        </li>
    </ul>
</nav>
<section class="border">
<section class="box"></section>

</section>
</body>

</html>