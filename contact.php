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
        NEW: March Special - 10% off for any web order!!
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
                <li><a href="login.html">Login</a></li>
                <li><a href="cart.php">Cart</a></li>
            </ul>
        </div>

        <!--Navigation bar-->
        <nav class="nav-bar">
            <ul>
                <li><a href="flower_type.html">Our Shop</a>
                    <ul class="dropdown">
                        <li><a href="kitchen.html">Kitchen</li>
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
    <main>
        <div class="banner">
            <img src="product_images/banner2.jpg" alt="banner">
            <div class="cta">
                <h1>Announcements</h1>
                <p>In response to COVID 19, we do not have readymade flowers available for general walk-in
                    trade. Please call or use our website for make to order.</p>
                <p>Visit our help center for articles or submit a ticket.</p>
            </div>
        </div>
   
    <!--What are customers saying-->
    <div class="contact-cards-container">
        <div class="content-card">
            <h4>Submit a Ticket</h4>
            <p>If you have any issues or inquiries, please fill out the form below, and our team will get back to you as soon as possible.</p>
            <form id="ticketForm">
                <input type="text" name="name" placeholder="Your Name" required>
                <input type="email" name="email" placeholder="Your Email" required>
                <textarea name="message" placeholder="Your Message" required></textarea>
                <button type="submit">Submit</button>
            </form>
            <div id="successMessage" style="display: none; color: green;">Your ticket has been submitted successfully!</div>
        </div>
        
        <div class="content-card">
            <h4>Customer Service</h4>
            <p> Our philosophy begins and ends with a marketplace that provides the best possible customer service. By
                taking out the middleman, we have also taken out the bureaucracy. All florists in the marketplace must
                abide by the Florist's Rules of Conduct. For any questions, comments, or concerns about your order, we
                advise you to contact the local florist you have placed your order with. </p>
        </div>
        <div class="content-card">
            <h4>Contact Information </h4>
            <p>Phone: 07 4779 1243</p>
            <p>fax: 4779 1244</p>
            <p>223 Bolsover St in Cairville, Queensland</p>
            <p><a href="mailto:: busybeeflorist@busybeemail.com.au">busybeeflorist@busybeemail.com.au</a></p>
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