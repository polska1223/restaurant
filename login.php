<?php
$servername = "mysql_db";
$username = "root";
$password = "rootpassword";
$conn = new PDO("mysql:host=$servername;dbname=restaurant", $username, $password);


try {


    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

$sql = "SELECT * FROM `gebruikers` WHERE `username` = :username AND `password` = :password";
$statement = $conn->prepare($sql);
$statement->bindParam(':password', $_POST['password']);
$statement->bindParam(':username', $_POST['username']);
$statement->execute();
$gebruiker = $statement->fetch();
if ($gebruiker) {
    $_SESSION['admin'] = true;
    header("Location: admin.php");
} else {
    $incorrectlogin = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styling/styling.css">
</head>

<body>

    <header><img
            src="images/logo.png"
            alt="">
        <div class="knoppen">
            <a class="button" href="index.php">
                <div>HOME</div>
            </a>
            <a class="button" href="menu.php">
                <div>MENU</div>
            </a>
            <a class="button" href="acties.php">
                <div>ACTIES</div>
            </a>
            <a class="button" href="contact.php">
                <div>CONTACT</div>
            </a>
            <a class="button" href="login.php">
                <div>LOGIN</div>
            </a>
        </div>

        
    </header>

    <div class="sign-in1">Sign in</div>


    <div class="sign-container">
        <form  method="post" class="login">
            <label for="email">E-mail</label>
            <div class="input">
                <img class="icon" src="images/email.png" alt="Email Icon" width="20">
                <input type="text" name="username" placeholder="username" required>
            </div>

            <label for="password">Password</label>
            <div class="input">
                <img class="icon" src="images/lock.png" alt="Lock Icon" width="20">
                <input type="password" name="password" placeholder="Enter your Password" required>
            </div>

            <input name="login" type="submit" value="sign-in" class="sign-in">


        </form>
        <div class="wok-parent">
            <div class="wok-image">
                <img src="images/login-background.png" alt="Wok met groente en vuur">
            </div>
        </div>
    </div>

</body>

</html>