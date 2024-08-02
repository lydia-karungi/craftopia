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
        .checkout-container input[type="email"],
        .checkout-container textarea,
        .checkout-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .checkout-container input.error,
        .checkout-container select.error,
        .checkout-container textarea.error {
            border-color: red;
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
            <form id="checkoutForm" method="POST">
                <label for="name">Name on Card</label>
                <input type="text" id="name" name="name" required>

                <label for="cardNumber">Card Number</label>
                <input type="text" id="cardNumber" name="cardNumber" maxlength="19" required>

                <label for="expiryDate">Expiry Date (MM/YY)</label>
                <input type="text" id="expiryDate" name="expiryDate" pattern="(0[1-9]|1[0-2])\/?([0-9]{2})" required>

                <label for="cvv">CVV</label>
                <input type="number" id="cvv" name="cvv" max="999" required>

                <label for="paymentMethod">Payment Method</label>
                <select id="paymentMethod" name="paymentMethod" required>
                    <option value="">Select Payment Method</option>
                    <option value="credit_card">Credit Card</option>
                    <option value="paypal">PayPal</option>
                    <option value="bank_transfer">Bank Transfer</option>
                </select>

                <label for="shippingAddress">Shipping Address</label>
                <input type="text" id="shippingAddress" name="shippingAddress" required>

                <label for="billingAddress">Billing Address</label>
                <input type="text" id="billingAddress" name="billingAddress" required>

                <label for="additionalNotes">Additional Notes</label>
                <textarea id="additionalNotes" name="additionalNotes" rows="4"></textarea>

                <input type="hidden" id="totalAmount" name="totalAmount"> <!-- Hidden input for total amount -->

                <button type="submit">Submit Payment</button>
            </form>
        </div>
        <div class="message-box" id="message-box">Payment successful! Redirecting to home page...</div>
    </main>

    <footer>
        <!-- Footer content -->
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const totalItemsElement = document.getElementById('total-items');
            const totalPriceElement = document.getElementById('total-price');
            const messageBox = document.getElementById('message-box');
            const checkoutForm = document.getElementById('checkoutForm');
            const totalAmountInput = document.getElementById('totalAmount');

            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let totalItems = 0;
            let totalPrice = 0;

            cart.forEach(item => {
                totalItems += item.quantity;
                totalPrice += item.price * item.quantity;
            });

            totalItemsElement.textContent = `Total items: ${totalItems}`;
            totalPriceElement.textContent = `Total price: $${totalPrice.toFixed(2)}`;
            totalAmountInput.value = totalPrice.toFixed(2); // Set the total amount in the hidden input

            checkoutForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission
                // Client-side validation
                let valid = true;
                const name = document.getElementById('name');
                const cardNumber = document.getElementById('cardNumber');
                const expiryDate = document.getElementById('expiryDate');
                const cvv = document.getElementById('cvv');
                const paymentMethod = document.getElementById('paymentMethod');
                const shippingAddress = document.getElementById('shippingAddress');
                const billingAddress = document.getElementById('billingAddress');

                // Clear previous error classes
                [name, cardNumber, expiryDate, cvv, paymentMethod, shippingAddress, billingAddress].forEach(input => {
                    input.classList.remove('error');
                });

                // Name validation
                if (name.value.trim() === '') {
                    name.classList.add('error');
                    valid = false;
                }

                // Card number validation (basic Luhn's algorithm check can be added)
                const cardNumberPattern = /^[0-9]{16}$/;
                if (!cardNumberPattern.test(cardNumber.value.replace(/\s+/g, ''))) {
                    cardNumber.classList.add('error');
                    valid = false;
                }

                // Expiry date validation
                const expiryDatePattern = /^(0[1-9]|1[0-2])\/?([0-9]{2})$/;
                if (!expiryDatePattern.test(expiryDate.value)) {
                    expiryDate.classList.add('error');
                    valid = false;
                }

                // CVV validation
                if (cvv.value.length !== 3) {
                    cvv.classList.add('error');
                    valid = false;
                }

                // Payment method validation
                if (paymentMethod.value === '') {
                    paymentMethod.classList.add('error');
                    valid = false;
                }

                // Shipping address validation
                if (shippingAddress.value.trim() === '') {
                    shippingAddress.classList.add('error');
                    valid = false;
                }

                // Billing address validation
                if (billingAddress.value.trim() === '') {
                    billingAddress.classList.add('error');
                    valid = false;
                }

                if (!valid) {
                    alert('Please fill in all required fields correctly.');
                } else {
                    // Submit the form via AJAX
                    const formData = new FormData(checkoutForm);
                    fetch('fetch_products.php', {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => response.text())
                    .then(responseText => {
                        if (responseText.includes('Order placed successfully!')) {
                            // Clear the cart
                            localStorage.removeItem('cart');
                            // Display success message
                            messageBox.style.display = 'block';
                            // Redirect to the index page after a short delay
                            setTimeout(() => {
                                window.location.href = 'index.php';
                            }, 2000);
                        } else {
                            alert('There was an issue placing the order. Please try again.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
                }
            });
        });
    </script>
</body>
</html>
