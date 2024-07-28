<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .cart-container {
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #ddd;
        }

        .cart-item img {
            max-width: 100px;
            height: auto;
            border-radius: 8px;
        }

        .cart-item-info {
            flex: 1;
            margin-left: 20px;
        }

        .cart-item-info h4 {
            margin: 0 0 10px;
            font-size: 1.2rem;
        }

        .cart-item-info p {
            margin: 0;
            color: #666;
        }

        .cart-item-quantity {
            display: flex;
            align-items: center;
        }

        .cart-item-quantity button {
            padding: 5px 10px;
            border: none;
            background-color: #bf2e1a;
            color: white;
            cursor: pointer;
        }

        .cart-item-quantity button:hover {
            background-color: #b95950;
        }

        .cart-item-quantity input {
            width: 50px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin: 0 5px;
        }

        .cart-item-remove {
            background-color: transparent;
            border: none;
            color: #bf2e1a;
            cursor: pointer;
        }

        .cart-item-remove:hover {
            text-decoration: underline;
        }

        .cart-summary {
            margin-top: 20px;
            text-align: right;
        }

        .cart-summary p {
            margin: 5px 0;
            font-size: 1.2rem;
        }

        .checkout-btn {
            padding: 10px 20px;
            background-color: #bf2e1a;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .checkout-btn:hover {
            background-color: #b95950;
        }

        .message-box {
            position: fixed;
            bottom: 20px;
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
        <div class="cart-container">
            <h1>Your Shopping Cart</h1>
            <div id="cart-items"></div>
            <div class="cart-summary">
                <p id="total-items">Total items: 0</p>
                <p id="total-price">Total price: $0.00</p>
                <button class="checkout-btn" id="checkout-btn">Proceed to Checkout</button>
            </div>
        </div>
        <div class="message-box" id="message-box"></div>
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
            const cartItemsContainer = document.getElementById('cart-items');
            const totalItemsElement = document.getElementById('total-items');
            const totalPriceElement = document.getElementById('total-price');
            const checkoutBtn = document.getElementById('checkout-btn');
            const messageBox = document.getElementById('message-box');

            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            function updateCartDisplay() {
                cartItemsContainer.innerHTML = '';
                let totalItems = 0;
                let totalPrice = 0;

                cart.forEach(item => {
                    const itemTotal = item.price * item.quantity;
                    totalItems += item.quantity;
                    totalPrice += itemTotal;

                    const cartItem = document.createElement('div');
                    cartItem.classList.add('cart-item');
                    cartItem.innerHTML = `
                        <img src="${item.image}" alt="${item.name}">
                        <div class="cart-item-info">
                            <h4>${item.name}</h4>
                            <p>Price: $${item.price}</p>
                            <div class="cart-item-quantity">
                                <button class="decrease-quantity" data-id="${item.id}">-</button>
                                <input type="number" value="${item.quantity}" readonly>
                                <button class="increase-quantity" data-id="${item.id}">+</button>
                            </div>
                        </div>
                        <button class="cart-item-remove" data-id="${item.id}">Remove</button>
                    `;
                    cartItemsContainer.appendChild(cartItem);
                });

                totalItemsElement.textContent = `Total items: ${totalItems}`;
                totalPriceElement.textContent = `Total price: $${totalPrice.toFixed(2)}`;
            }

            function updateCartStorage() {
                localStorage.setItem('cart', JSON.stringify(cart));
            }

            function displayMessage(message) {
                messageBox.textContent = message;
                messageBox.style.display = 'block';
                setTimeout(() => {
                    messageBox.style.display = 'none';
                }, 2000);
            }

            cartItemsContainer.addEventListener('click', function(event) {
                const target = event.target;
                const itemId = target.getAttribute('data-id');

                if (target.classList.contains('decrease-quantity')) {
                    const item = cart.find(item => item.id === parseInt(itemId));
                    if (item.quantity > 1) {
                        item.quantity -= 1;
                        updateCartStorage();
                        updateCartDisplay();
                    }
                }

                if (target.classList.contains('increase-quantity')) {
                    const item = cart.find(item => item.id === parseInt(itemId));
                    item.quantity += 1;
                    updateCartStorage();
                    updateCartDisplay();
                }

                if (target.classList.contains('cart-item-remove')) {
                    const item = cart.find(item => item.id === parseInt(itemId));
                    cart = cart.filter(item => item.id !== parseInt(itemId));
                    updateCartStorage();
                    updateCartDisplay();
                    displayMessage(`${item.name} has been removed from your cart.`);
                }
            });

            checkoutBtn.addEventListener('click', function() {
                window.location.href = 'checkout.php'; // Redirect to the checkout page
            });

            updateCartDisplay();
        });
    </script>
</body>
</html>
