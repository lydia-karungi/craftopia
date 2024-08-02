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
    <header>
        <?php include 'header.php'; ?>
    </header>

    <!--Banner image-->
    <main>
        <div class="banner">
            <img src="product_images/banner2.jpg" alt="banner">
            <div class="cta">
                <h1>Hi, we're Busy Bee</h1>
                <p>We're a modern floral brand that connects people to farm-fresh flowers and the partners who grow
                    them. We put the Bouq in Bouquet.</p>
                <p>P.S. - We are very happy to have you here, cheers!!!</p>
            </div>
        </div>

    <!--What are customers saying-->
    <div class="section-header1">
        <h1>Our mission & Goal</h1>
    </div>

    <div class="content-container">
        <div class="content-card">
            <h4>Mission</h4>
            <p> "We believe kindness is always in season. We believe the simple gesture of gifting flowers can
                transform your day, rekindle an old connection, or spark a new one. That's why we're on a mission to
                transform the floral industry - delivering longer-lasting, responsible sourced flowers with less waste
                and more smiles." </p>
        </div>
        <div class="content-card">
            <h4>Goal</h4>
            <p> "To create an engaging and user-friendly website that showcases our wide range of floral products and
                services, attracts new customers, and provides a seamless shopping experience for our existing
                customers. The website should reflect our brand's personality, highlight our unique selling points, and
                ultimately drive sales by encouraging visitors to make purchases online or visit our physical store."
            </p>
        </div>
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