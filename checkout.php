<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Checkout</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .checkout-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .checkout-container h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .checkout-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .checkout-container input[type="text"],
        .checkout-container input[type="number"],
        .checkout-container input[type="email"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .checkout-container button {
            width: 100%;
            padding: 10px;
            background-color: #bf2e1a;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
        }

        .checkout-container button:hover {
            background-color: #b95950;
        }

        .checkout-summary {
            margin-bottom: 20px;
            text-align: right;
        }

        .checkout-summary p {
            margin: 5px 0;
            font-size: 1.2rem;
        }

        .message-box {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background-color: white;
            color: green;
            padding: 10px 20px;
            border-radius: 10px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.2);
            display: none;
        }
    </style>
</head>
<body>
    <header>
        <?php include 'header.php'; ?>
    </header>
    <main>
        <div class="checkout-container">
            <h1>Checkout</h1>
            <div class="checkout-summary">
                <p id="total-items">Total items: 0</p>
                <p id="total-price">Total price: $0.00</p>
            </div>
            <form id="checkoutForm">
                <label for="name">Name on Card</label>
                <input type="text" id="name" name="name" required>

                <label for="cardNumber">Card Number</label>
                <input type="text" id="cardNumber" name="cardNumber" required>

                <label for="expiryDate">Expiry Date (MM/YY)</label>
                <input type="text" id="expiryDate" name="expiryDate" required>

                <label for="cvv">CVV</label>
                <input type="number" id="cvv" name="cvv" required>

                <button type="submit">Submit Payment</button>
            </form>
        </div>
        <div class="message-box" id="message-box">Payment successful! Redirecting to home page...</div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const totalItemsElement = document.getElementById('total-items');
            const totalPriceElement = document.getElementById('total-price');
            const messageBox = document.getElementById('message-box');
            const checkoutForm = document.getElementById('checkoutForm');

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let totalItems = 0;
            let totalPrice = 0;

            cart.forEach(item => {
                totalItems += item.quantity;
                totalPrice += item.price * item.quantity;
            });

            totalItemsElement.textContent = `Total items: ${totalItems}`;
            totalPriceElement.textContent = `Total price: $${totalPrice.toFixed(2)}`;

            checkoutForm.addEventListener('submit', function(event) {
                event.preventDefault();
                // Display the success message and redirect to home page
                messageBox.style.display = 'block';
                setTimeout(() => {
                    window.location.href = 'index.php';
                }, 2000);
            });
        });
    </script>
</body>
</html>
