<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();
$isLoggedIn = isset($_SESSION['user_id']);

if (!$isLoggedIn) {
    header("Location: login.html"); // Redirect to the login page
    exit(); // Stop further execution to prevent loading the cart page content
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Craftopia - Jewellery</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,200..1000&display=swap"
        rel="stylesheet">
</head>

<body>
<header>
        <?php include 'header.php'; ?>
    </header>
 
 
    <main data-category="jewellery">
        <div class="main-content">
            <aside class="sidebar">
                <h3>Filter by</h3>
                <form id="filterForm">
                    <div class="filter-section">
                        <h4>Price</h4>
                        <input type="number" id="minPrice" name="minPrice" placeholder="Min Price">
                        <input type="number" id="maxPrice" name="maxPrice" placeholder="Max Price">
                    </div>
                    <div class="filter-section">
                        <h4>Category</h4>
                        <select id="category" name="category">
                            <option value="">All</option>
                            <option value="kitchen">Kitchen</option>
                            <option value="bedroom" selected>Bedroom</option>
                            <option value="outdoor">Outdoor</option>
                            <option value="jewellery">Jewellery</option>
                        </select>
                    </div>
                    <div class="filter-section">
                        <h4>Availability</h4>
                        <select id="availability" name="availability">
                            <option value="">All</option>
                            <option value="available">Available</option>
                            <option value="outOfStock">Out of Stock</option>
                        </select>
                    </div>
                    <button type="submit">Apply Filters</button>
                </form>
            </aside>

            <div class="content-container" id="product-list">
                <!-- Products will be dynamically inserted here -->
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