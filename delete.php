<?php
$servername = "mysql_db";
$username = "root";
$password = "rootpassword";
$conn = new PDO("mysql:host=$servername;dbname=restaurant", $username, $password);




if (isset($_POST['verwijder'])) {
    $sql = "DELETE FROM menukaart WHERE id = :ID;";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":ID", $_GET['id']);
    $stmt->execute();
    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling/styling.css">
    <title>Document</title>
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



    <?php
    $sql = "SELECT * FROM menukaart WHERE ID = :ID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":ID", $_GET['id']);
    $stmt->execute();
    $menukaart = $stmt->fetch();
    ?>

<form method="post">
    <div class="button"><?php echo $menukaart['titel']; ?></div>
    <input type="submit" name="verwijder" value="verwijder">
</form>


</body>
</html>