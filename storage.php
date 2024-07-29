<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Craftopia - Storage</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
</head>

<body>
    <header>
        NEW: November Special - 10% off for any web order!!
    </header>

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
    <!--Banner image-->
    <main>
        <div class="banner">
            <img src="florist_images/banner5.jpeg" alt="banner">
            <div class="cta">
                <h1>Thank You Flowers</h1><br>

                <p>Send thank you flowers to show your appreciation for a gift, kind gesture, being there, a great time,
                    a special experience, or just because.</p>
                <h2>Sign In for 10% off this March !!</h2>
            </div>
        </div>

        <div class="content-container">
            <div class="content-card">
                <img src="florist_images/card1.jpg" alt="course1">
                <div class="card-info">
                    <h4>Bottlebrushes Callistemon</h4>
                <h4>$40 - $50</h4>
                </div>
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>
            <div class="content-card">
                <img src="florist_images/card3.jpg" alt="course1">
                <div class="card-info">
                    <h4>Canberra Bells Correa</h4>
                    <h4>$20 - $40</h4>
                </div>
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>
            <div class="content-card">
                <img src="florist_images/card5.jpg" alt="course1">
                <div class="card-info">
                    <h4>Pink rock lily Dendrobium</h4>
                <h4>$80 - $100</h4>
                </div>
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>
            <div class="content-card">
                <img src="florist_images/card2.jpg" alt="course1">
                <div class="card-info">
                    <h4>Aussie Box Westringia</h4>
                    <h4>$60 - $70</h4>
                </div>
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>
        </div>

        <div class="content-container">
            <div class="content-card">
                <img src="florist_images/card1.jpg" alt="course1">
                <div class="card-info">
                    <h4>Bottlebrushes Callistemon</h4>
                    <h4>$40 - $50</h4>
                </div>
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>
            <div class="content-card">
                <img src="florist_images/card3.jpg" alt="course1">
                <div class="card-info">
                    <h4>Canberra Bells Correa</h4>
                <h4>$20 - $40</h4>
                </div>
                
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>
            <div class="content-card">
                <img src="florist_images/card5.jpg" alt="course1">
                <div class="card-info">
                    <h4>Pink rock lily Dendrobium</h4>
                    <h4>$80 - $100</h4>
                </div>
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>
            <div class="content-card">
                <img src="florist_images/card2.jpg" alt="course1">
                <div class="card-info">
                    <h4>Aussie Box Westringia</h4>
                    <h4>$60 - $70</h4>
                </div>
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>
        </div>

        <div class="content-container">
            <div class="content-card">
                <img src="florist_images/card1.jpg" alt="course1">
                <div class="card-info">
                    <h4>Bottlebrushes Callistemon</h4>
                <h4>$40 - $50</h4>
                </div>
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>
            <div class="content-card">
                <img src="florist_images/card3.jpg" alt="course1">
                <div class="card-info">
                    <h4>Canberra Bells Correa</h4>
                    <h4>$20 - $40</h4>
                </div>
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>
            <div class="content-card">
                <img src="florist_images/card5.jpg" alt="course1">
                <div class="card-info">
                    <h4>Pink rock lily Dendrobium</h4>
                    <h4>$80 - $100</h4>
                </div>
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>
            <div class="content-card">
                <img src="florist_images/card2.jpg" alt="course1">
                <div class="card-info">
                    <h4>Aussie Box Westringia</h4>
                    <h4>$60 - $70</h4>
                </div>
                <button class="add-to-cart-btn">Add to Cart</button>
            </div>
        </div>
    </main>
    <script src="js/florist.js"></script>


    <!--Footer-->
    <footer>
        <table>
            <tr>
                <td class="footer-column">
                    <h1>Important Links</h1>
                    <div class="social-media">
                        <p>Our Shop</p>
                        <p>Collections</p>
                        <p>Gifts</p>
                        <p>About Us</p>
                    </div>
                </td>
                <td class="footer-column">
                    <h1>Contact Us</h1>
                    <div class="social-media">
                        <p>Phone: 07 4779 1243</p>
                        <p>fax: 4779 1244</p>
                        <p>address: 223 queen St in Brisbane, Queensland</p>
                        <p><a href="mailto:: craftopia@craftopiamail.com.au"
                                style="text-decoration: none; color: #aaa;">email:
                                : craftopia@craftopiamail.com.au</a></p>
                    </div>
                </td>
                <td class="footer-column">
                    <h1>Trading hours</h1>
                    <div class="social-media">
                        <p>Mon – Fri : 9.00 am to 4.00 pm</p>
                        <p>Saturday – Sunday : 9.00 am to 12.00 pm</p>
                    </div>
                </td>
            </tr>
        </table>
    </footer>

    <div class="copyright-outside-footer">
        &copy; COPYRIGHT 2024,CRAFTOPIA INC
    </div>
</body>

</html>