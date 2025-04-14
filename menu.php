<?php
$servername = "mysql_db";
$username = "root";
$password = "rootpassword";
$conn = new PDO("mysql:host=$servername;dbname=restaurant", $username, $password);

$stmt = $conn->query("SELECT * FROM `menukaart`");
if (isset($_GET['zoek'])) {
    $stmt = $conn->query('SELECT * FROM `menukaart` WHERE titel LIKE "%' . $_GET['zoek'] . '%"');
} else {
$stmt = $conn->query('SELECT * FROM `menukaart`');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styling/styling.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Itim&display=swap" rel="stylesheet">
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
    <form>
        <input type="text" name="zoek" placeholder="Zoek">
        <input type="submit" value="Zoeken">
    </form>
</header>

<div class="menup">
    <div class="menu">
        MENUKAART
    </div>
</div>

<div class="sushi-parent">
    <div class="sushi2">
        <p>Sushi</p>
    </div>
</div>


<div class="line-parent">
    <div class="line"></div>
</div>


<div class="page">
    <div class="container">

        <div class="column">
            <?php
            while ($row = $stmt->fetch()) {
                echo "<div class='item'>";
                echo "<div class='title'>$row[titel]</div>";
                echo "<div class='description'>$row[omschrijving]</div>";
                echo "</div>";
            }
            ?>

        </div>



    </div>
</div>

<div class="line-parent">
    <div class="line"></div>
</div>


<footer>

    <div class="footer-parent">
        <div class="footer">
            <div class="openingstijden">
                <div class="opening">Openingstijden</div>
                <div class="dagen">Maandag 15-21</div>
                <div class="dagen">Dinsdag 15-21</div>
                <div class="dagen">Woensdag 15-20</div>
                <div class="dagen">Donderdag 15-21</div>
                <div class="dagen">Vrijdag 15-21</div>
                <div class="dagen">Zaterdag 13-21</div>
                <div class="dagen">Zondag 13-21</div>
            </div>

            <div class="menu-bekijken-parent">
                <div class="bekijk-menu">Bekijk Menukaart
                    <div class="image-download">
                        <img src="images/download.png" alt="Download menu">
                    </div>
                </div>
            </div>

            <div class="contact">
                <div class="bekijk-menu-footer">Contact</div>
                <div class="contact-info">
                    <p>Telefoon: 0617841254</p>
                    <p>Email: 1214525@student.nl</p>
                    <p>Adres: Heyendaalseweg 98, Nijmegen</p>
                </div>
            </div>

            <div class="social">
                <div class="social-icons">
                    <a href="#">Facebook</a>
                    <a href="#">TikTok</a>
                    <a href="#">Instagram</a>
                </div>
            </div>
        </div>
    </div>
</footer>


</body>

</html>