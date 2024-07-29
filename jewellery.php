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
        NEW: November Special - 10% off for any web order!!
    </header>

    <div class="header-container">
        <!-- Hamburger Menu Button -->
        <button class="hamburger" id="hamburger">&#9776;</button>

        <!--Main menu-->
        <div class="main-menu">
            <div class="logo">
                <a href="index.html">Craftopia</a>
            </div>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="cart.html">Cart</a></li>
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
                <li><a href="collections.html">Collections</a></li>
                <li><a href="gifts.html">Gifts</a>
                    <ul class="dropdown">
                        <li><a href="gifts.html">Gifts for her</a></li>
                        <li><a href="gifts.html">Gifts for him</a></li>
                        <li><a href="gifts.html">Wedding Gifts</a></li>
                        <li><a href="gifts.html">Kids Gifts</a></li>
                        <li><a href="gifts.html">Animal Lover Gifts</a></li>
                    </ul>
                </li>
                <li><a href="kitchen.html">Kitchen</a></li>
                <li><a href="jewellery.html">Jewellery</a>
                    <ul class="dropdown">
                        <li><a href="earrings.html">Earrings</a></li>
                        <li><a href="necklaces.html">Necklaces</a></li>
                        <li><a href="ringsandpins.html">Rings and Pins</a></li>
                        <li><a href="storage.html">Jewellery Storage</a></li>
                        <li><a href="braceletsandcuffs.html">Bracelets and Cuffs</a></li>
                    </ul>
                </li>
                <li><a href="outdoor.html">Outdoor</a></li>
                <li><a href="bedroom.html">Bedroom</a>
                    <ul class="dropdown">
                        <li><a href="bedroom.html">Duvet Sets</a></li>
                        <li><a href="bedroom.html">Bed Throws</a></li>
                        <li><a href="bedroom.html">Pillows</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>

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
