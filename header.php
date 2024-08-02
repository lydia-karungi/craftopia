<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* General styles for the header */
        .header-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #ffffff;
            border-bottom: 2px solid #ccc;
            z-index: 1000;
        }

        .header-container .main-menu {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .header-container .main-menu .logo a {
            font-size: 2.5em;
            font-weight: bold;
            color: #333;
            text-decoration: none;
        }

        .header-container .main-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 20px;
        }

        .header-container .main-menu ul li {
            position: relative;
        }

        .header-container .main-menu ul li a {
            text-decoration: none;
            color: #333;
            font-size: 1em;
        }

        .header-container .main-menu ul li a:hover {
            color: red;
        }

        .header-container .main-menu .hamburger {
            display: none;
        }

        .header-container .nav-bar {
            display: flex;
            justify-content: center;
            background-color: #f8f8f8;
            border-top: 1px solid #ddd; /* Added a border on top for separation */
            border-bottom: 1px solid #ddd; /* Added a border on bottom for separation */
            padding: 10px 0; /* Added padding to create space below */
        }

        .header-container .nav-bar ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 20px;
        }

        .header-container .nav-bar ul li {
            position: relative;
        }

        .header-container .nav-bar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 1em;
        }

        .header-container .nav-bar ul li a:hover {
            color: red;
        }

        .header-container .nav-bar ul .dropdown {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 4px;
            padding: 10px 0;
        }

        .header-container .nav-bar ul li:hover .dropdown {
            display: block;
        }

        .header-container .nav-bar ul .dropdown li a {
            padding: 10px 20px;
            display: block;
            color: #333;
        }

        .header-container .nav-bar ul .dropdown li a:hover {
            background-color: #f1f1f1;
        }

        /* Ensure content below the nav-bar doesn't overlap */
        .content {
            padding-top: 80px; /* Adjust the value to match the height of your header */
        }
    </style>
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
                <li><a href="cart.php">Cart</a></li>
                <?php if ($isLoggedIn): ?>
                    <li><a href="logout.php">Logout</a></li>
                <?php else: ?>
                    <li><a href="login.html">Login</a></li>
                <?php endif; ?>
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

    <div class="content">
        <!-- Your page content goes here -->
    </div>

    <script>
        document.getElementById('hamburger').addEventListener('click', function() {
            document.querySelector('.main-menu').classList.toggle('active');
        });
    </script>
</body>
</html>
