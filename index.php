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
        NEW: November Special - 10% off for any web order!!
    </header>


    <!--Banner image-->
    <main>
        <div class="banner">
            <img src="florist_images/karim-manjra-cW3nDFVpi10-unsplash.jpg" alt="banner">
            <div class="cta">
                <h1>Find the perfect gift</h1>
                <h2>Find your favorite crafts</h2>
                <form id="searchForm">
                    <input type="text" id="flowerName" name="flowerName" placeholder="Enter crafts name" required>
                    <input type="text" id="price" name="price" placeholder="Enter price" required>
                    <button type="submit">SHOP NOW</button>
                </form>
            </div>
        </div>

        <!--Best sellers-->
        <div class="section-header1">
            <h1>Best Sellers</h1>
        </div>

        <div class="content-container" id="best-sellers">
            <!-- Products will be dynamically inserted here -->
        </div>

        <!--Shop by category-->
        <div class="section-header2">
            <h1>Shop by Category</h1>
        </div>

        <div class="content-container" id="shop-by-category">
            <!-- Products will be dynamically inserted here -->
        </div>

        <!--What are customers saying-->
        <div class="section-header2">
            <h1>What are customers saying </h1>
        </div>

        <div class="content-container">
            <div class="content-card">
                <h4>So adorable!</h4>
                <p>“This is truly such a beautiful fair trade product for quite a reasonable price. I love the way this garland looks on my mantle, hanging over my stone fireplace. I am going to buy one for the office because it brings me so much joy.” </p>
                <p>Suzette Marechal</p>
            </div>
            <div class="content-card">
                <h4>Short Wool Booties</h4>
                <p>"I live in a cold Winter State. I am a street shoe size 7.5 - 8. These are very warm, fit great and could possibly fit size 10 foot. The ankle area has not stretched out and stays snug to my ankle. These are very well made and the yarn is durable. I plan to” </p>
                <p>DW Booker</p>
            </div>
            <div class="content-card">
                <h4>Very happy with the bracelet!</h4>
                <p>“This was a Christmas gift for our daughter-in-law. She was thrilled to receive it! She enjoys wearing multiple bracelets; we look forward to seeing her mix with this one!” </p>
                <p>Sarah Snailum</p>
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
                        <p><a href="mailto:craftopia@craftopiamail.com.au"
                                style="text-decoration: none; color: #aaa;">email:
                                craftopia@craftopiamail.com.au</a></p>
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
        &copy; COPYRIGHT 2024, CRAFTOPIA INC
    </div>

</body>

</html>
