<?php
$servername = "mysql_db";
$username = "root";
$password = "rootpassword";
$conn = new PDO("mysql:host=$servername;dbname=restaurant", $username, $password);

if (isset($_POST['opslaan'])) {
    $sql = "UPDATE menukaart SET titel = :titel, omschrijving = :omschrijving, prijs = :prijs WHERE id = :ID;";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(":ID", $_GET['id']);
    $stmt->bindParam(":titel", $_POST['titel']);
    $stmt->bindParam(":prijs", $_POST['prijs']);
    $stmt->bindParam(":omschrijving", $_POST['omschrijving']);
    $stmt->execute();
    header("Location: admin.php");
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




<?php
$sql = "SELECT * FROM menukaart WHERE ID = :ID";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":ID", $_GET['id']);
$stmt->execute();
$menukaart = $stmt->fetch();
?>
<form method="post">
    <input type="text" name="titel" placeholder="Titel" value="<?php echo $menukaart['titel']; ?>"><br>
    <input type="text" name="omschrijving" placeholder="Omschrijving" value="<?php echo $menukaart['omschrijving']; ?>"><br>
    <input type="text" name="prijs" placeholder="Prijs" value="<?php echo $menukaart['prijs']; ?>"><br>
    <input type="submit" name="opslaan" value="Opslaan">
</form>


</body>
</html>