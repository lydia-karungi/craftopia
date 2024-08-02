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
        <?php include 'header.php'; ?>
    </header>
    <main>
        <div class="banner">
            <img src="product_images/banner2.jpg" alt="banner">
            <div class="cta">
                <h1>Announcements</h1>
                <p>We are currently experiencing high demand for our handcrafted products. To ensure the best quality and timely delivery, please place your orders in advance.</p>
                <p>As part of our commitment to sustainability, Craftopia is now offering eco-friendly packaging options. Visit our website to learn more about our green initiatives and how you can contribute.</p>
            </div>
        </div>
        <div class="contact-cards-container">
            <div class="content-card">
                <h4>Submit a Ticket</h4>
                <p>If you have any issues or inquiries, please fill out the form below, and our team will get back to you as soon as possible.</p>
                <form id="ticketForm" method="POST" action="">
                    <input type="text" name="name" placeholder="Your Name" required>
                    <input type="email" name="email" placeholder="Your Email" required>
                    <textarea name="message" placeholder="Your Message" required></textarea>
                    <button type="submit">Submit</button>
                </form>
                <div id="successMessage" style="display: none; color: green;">Your ticket has been submitted successfully!</div>
            </div>
            <div class="content-card">
                <h4>Customer Service</h4>
                <p>If you have any issues or inquiries, please fill out the form below, and our team will get back to you as soon as possible.</p>
            </div>

            <div class="content-card">
                <h4>Contact Information</h4>
                <p>Phone: 07 4779 1243</p>
                <p>Fax: 4779 1244</p>
                <p>223 Queen St, Brisbane, Queensland</p>
                <p>Mail:<a href="mailto:craftopia@craftopiamail.com.au">craftopia@craftopiamail.com.au</a></p>
            </div>
        </div>
    </main>
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
                        <p>Fax: 4779 1244</p>
                        <p>Address: 223 Queen St in Brisbane, Queensland</p>
                        <p><a href="mailto:craftopia@craftopiamail.com.au" style="text-decoration: none; color: #aaa;">craftopia@craftopiamail.com.au</a></p>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ticketForm = document.getElementById('ticketForm');
            const successMessage = document.getElementById('successMessage');

            ticketForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission

                // Create FormData object and send it via AJAX
                const formData = new FormData(ticketForm);
                fetch('fetch_products.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(responseText => {
                    if (responseText.includes('Ticket submitted successfully!')) {
                        successMessage.style.display = 'block';
                        ticketForm.reset(); // Reset the form
                    } else {
                        alert('There was an issue submitting your ticket. Please try again.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred. Please try again.');
                });
            });
        });
    </script>
</body>
</html>
