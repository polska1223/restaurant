<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="styling/styling.css">
    <title>Document</title>
</head>
<body>
<?php
$servername = "mysql_db";
$username = "root";
$password = "rootpassword";
$connect = new PDO("mysql:host=$servername;dbname=restaurant", $username, $password);
?>


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
            <div>CONTACT</div></a>
            <a class="button" href="login.php">
            <div>LOGIN</div></a>
        </div>
</header>

<?php
if (isset($_POST['toevoegen'])){
$sql = "INSERT INTO menukaart (titel, omschrijving, prijs)
VALUES (:titel, :omschrijving, :prijs)";

$stmt = $connect->prepare($sql);
$stmt->bindParam(":titel", $_POST['titel']);
$stmt->bindParam(":omschrijving", $_POST['omschrijving']);
$stmt->bindParam(":prijs", $_POST['prijs']);
$stmt->execute();
}
?>
<div class="admin-panel">
    <form method="post">
    <div class="form-panel">
        <h1>Admin Panel</h1>
        <h3>Toevoegen</h3>
        <input type="text" placeholder="Titel" name="titel">
        <textarea placeholder="Beschrijving" name="omschrijving"></textarea>
        <input type="text" placeholder="Prijs" name="prijs">
        <input type="submit" value="toevoegen" name="toevoegen">
    </div>
    </form>

    <?php
    $stmt = $connect->query("SELECT * FROM `menukaart`");
    $stmt->execute();
    ?>




    <div class="assortiment-panel">
        <h2>Assortiment</h2>
        <?php
        while ($row = $stmt->fetch()) {
            echo "<div class='title'>$row[titel]</div>";
            echo  "<div class='product-box'>";
            echo  "<div class='product-actions'>";
            echo "<a href='delete.php?id=$row[id]'>Delete</a>";
            echo  "<a href='edit.php?id=$row[id]'>Change</a>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
</div>





</body>
</html>