<!DOCTYPE html>
<html lang="en">

<head>
    <title>Craftopia</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Serif:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
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
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="contact.html">Contact Us</a></li>
                <li><a href="login.html">Login</a></li>
                <li><a href="cart.html">Cart</a></li>
            </ul>
        </div>

        <!--Navigation bar-->
        <nav class="nav-bar">
            <ul>
                <li><a href="flower_type.html">Our Shop</a>
                    <ul class="dropdown">
                        <li><a href="kitchen.html">Kitchen</a></li>
                        <li><a href="bedroom.html">Bedroom</a></li>
                        <li><a href="outdoor.html">Outdoor</a></li>
                        <li><a href="jewellery.html">Jewellery</a></li>
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
    <!--Banner image-->
    <main data-category="collections">

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
                        <h4>Collection</h4>
                        <select id="category" name="category">
                            <option value="">All</option>
                            <option value="Holiday Specials">Holiday Specials</option>
                            <option value="Winter Collection">Winter Collection<~~/option>
                            <option value="Summer Collection">Summer Collection</option>
                            <option value="Bath">Bath</option>
                            <option value="Laundry">Laundry</option>
                            <option value="Best Sellers">Best Sellers</option>
                            <option value="Customer Favorites">Customer Favorites</option>
                            <option value="Discounted Items">Discounted Items</option>
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

        <div class="section-header2">
            <h1>What are customers saying</h1>
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
                <p>“This was a Christmas gift for our daughter-in-law. She was thrilled to receive it! She enjoys wearing multiple bracelets; we look forward to seeing her mis with this one!” </p>
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
                        <p><a href="mailto:: craftopia@craftopiamail.com.au" style="text-decoration: none; color: #aaa;">email: craftopia@craftopiamail.com.au</a></p>
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