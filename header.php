<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Craftopia</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">

</head>

<body>
<div class="header-container">
    <!-- Hamburger Menu Button -->
    <button class="hamburger" id="hamburger">&#9776;</button>

    <!--Main menu-->
    <div class="main-menu">
        <div class="logo">
            <a href="index.php">Craftopia</a>
        </div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About Us</a></li>
            <li><a href="contact.php">Contact Us</a></li>
            <?php if ($isLoggedIn): ?>
                <li><a href="logout.php">Logout</a></li>
            <?php else: ?>
                <li><a href="login.html">Login</a></li>
            <?php endif; ?>
            <li><a href="cart.php">Cart</a></li>
        </ul>
    </div>

    <!--Navigation bar-->
    <nav class="nav-bar">
        <ul>
            <li><a href="collections.php">Our Shop</a>
                <ul class="dropdown">
                    <li><a href="kitchen.php">Kitchen</a></li>
                    <li><a href="bedroom.php">Bedroom</a></li>
                    <li><a href="outdoor.php">Outdoor</a></li>
                    <li><a href="jewellery.php">Jewellery</a></li>
                </ul>
            </li>
            <li><a href="collections.php">Collections</a></li>
            <li><a href="gifts.php">Gifts</a>
                <ul class="dropdown">
                    <li><a href="gifts.php">Gifts for her</a></li>
                    <li><a href="gifts.php">Gifts for him</a></li>
                    <li><a href="gifts.php">Wedding Gifts</a></li>
                    <li><a href="gifts.php">Kids Gifts</a></li>
                    <li><a href="gifts.php">Animal Lover Gifts</a></li>
                </ul>
            </li>
            <li><a href="kitchen.php">Kitchen</a></li>
            <li><a href="jewellery.php">Jewellery</a>
                <ul class="dropdown">
                    <li><a href="earrings.php">Earrings</a></li>
                    <li><a href="necklaces.php">Necklaces</a></li>
                    <li><a href="ringsandpins.php">Rings and Pins</a></li>
                    <li><a href="storage.php">Jewellery Storage</a></li>
                    <li><a href="braceletsandcuffs.php">Bracelets and Cuffs</a></li>
                </ul>
            </li>
            <li><a href="outdoor.php">Outdoor</a></li>
            <li><a href="bedroom.php">Bedroom</a>
                <ul class="dropdown">
                    <li><a href="bedroom.php">Duvet Sets</a></li>
                    <li><a href="bedroom.php">Bed Throws</a></li>
                    <li><a href="bedroom.php">Pillows</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
            </body>
            </html>