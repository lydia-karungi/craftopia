document.addEventListener('DOMContentLoaded', function() {
    // Existing code...

    const mainElement = document.querySelector('main');
    const category = mainElement.getAttribute('data-category');  // Get the preselected category from the main element

    function fetchProducts(params) {
        fetch('fetch_products.php?' + params.toString())
            .then(response => response.json())
            .then(products => {
                // Existing product fetching and display logic...

                const bestSellersContainer = document.getElementById('best-sellers');
                const shopByCategoryContainer = document.getElementById('shop-by-category');
                const productList = document.getElementById('product-list');

                // Clear current products
                if (bestSellersContainer) bestSellersContainer.innerHTML = '';
                if (shopByCategoryContainer) shopByCategoryContainer.innerHTML = '';
                if (productList) productList.innerHTML = '';

                // Limit number of products displayed
                const bestSellersToShow = products.slice(0, 4); // Show only 4 products
                const shopByCategoryToShow = products.slice(0, 4); // Show only 4 products

                function truncateDescription(description, maxLines = 2) {
                    // Remove HTML tags
                    const textOnly = description.replace(/<\/?[^>]+(>|$)/g, "");
                    // Remove "About this item" text
                    const cleanedText = textOnly.replace("About this item", "").trim();
                    const words = cleanedText.split(' ');
                    let truncated = '';
                    let lineCount = 0;
                    let lineHeight = 0;

                    for (let word of words) {
                        truncated += word + ' ';
                        lineHeight = truncated.split('\n').length;
                        if (lineHeight > lineCount) {
                            lineCount = lineHeight;
                            if (lineCount > maxLines) break;
                        }
                    }
                    return truncated.trim() + '...';
                }

                function createProductCard(product) {
                    const truncatedDescription = truncateDescription(product.description);
                    return `
                        <div class="content-card">
                            <img src="${product.image}" alt="${product.name}" class="redirect-image" data-id="${product.id}">
                            <div class="card-info">
                                <h4>${product.name}</h4>
                                <p style="text-align: left;">${truncatedDescription} <a href="product_detail.php?id=${product.id}" style="color: #bf2e1a; text-decoration: none;">for more info</a></p>
                                <p style="text-align: left; color: #bf2e1a;">$${product.price}</p>
                                <button class="add-to-cart-btn" data-product='${JSON.stringify(product)}'>Add to Cart</button>
                            </div>
                        </div>
                    `;
                }

                bestSellersToShow.forEach(product => {
                    if (bestSellersContainer) bestSellersContainer.innerHTML += createProductCard(product);
                });

                shopByCategoryToShow.forEach(product => {
                    if (shopByCategoryContainer) shopByCategoryContainer.innerHTML += createProductCard(product);
                });

                if (productList) {
                    products.forEach(product => {
                        productList.innerHTML += createProductCard(product);
                    });
                }

                // Add event listeners for dynamically added cart buttons
                document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const product = JSON.parse(this.getAttribute('data-product'));
                        addToCart(product);
                        window.location.href = 'cart.php'; // Redirect to the cart page
                    });
                });

                // Add event listeners for dynamically added redirect images
                document.querySelectorAll('.redirect-image').forEach(image => {
                    image.style.cursor = 'pointer'; // Optional: Change cursor on hover
                    image.addEventListener('click', function() {
                        const productId = this.getAttribute('data-id');
                        window.location.href = `product_detail.php?id=${productId}`;
                    });
                });
            })
            .catch(error => console.error('Error fetching products:', error));
    }

    function fetchFilteredProducts() {
        const minPrice = document.getElementById('minPrice').value;
        const maxPrice = document.getElementById('maxPrice').value;
        const category = document.getElementById('category').value;
        const availability = document.getElementById('availability').value;

        const params = new URLSearchParams();
        if (minPrice) params.append('minPrice', minPrice);
        if (maxPrice) params.append('maxPrice', maxPrice);
        if (category) params.append('category', category);
        if (availability) params.append('availability', availability);

        fetchProducts(params);
    }

    // Preselect the category in the filter form
    if (category) {
        document.getElementById('category').value = category;
    }

    // Fetch products for the preselected category on initial load
    const initialParams = new URLSearchParams();
    if (category) {
        initialParams.append('category', category);
    }
    fetchProducts(initialParams);

    // Set up filter form submission handler
    const filterForm = document.getElementById('filterForm');
    if (filterForm) {
        filterForm.addEventListener('submit', function(event) {
            event.preventDefault();  // Prevent the form from submitting the traditional way
            fetchFilteredProducts();
        });
    }

    const searchForm = document.getElementById('searchForm');
    if (searchForm) {
        searchForm.addEventListener('submit', function(event) {
            event.preventDefault();  // Prevent the form from submitting the traditional way

            const flowerName = document.getElementById('flowerName').value.trim();
            const price = document.getElementById('price').value.trim();

            if (flowerName && price) {
                // Construct the URL with search parameters
                const queryParams = `?flowerName=${encodeURIComponent(flowerName)}&price=${encodeURIComponent(price)}`;
                // Redirect to the shop page with parameters
                window.location.href = `shop.php${queryParams}`;
            } else {
                // Alert user if any field is empty
                alert('Please enter both flower name and price range.');
            }
        });
    }

    const shopBtn = document.getElementById('shopFlowers');
    if (shopBtn) {
        document.querySelectorAll('#shopFlowers').forEach(button => {
            button.addEventListener('click', function() {
                window.location.href = 'shop.php';
            });
        });
    }

    function displayMessage(msg) {
        const messageBox = document.createElement('div');
        messageBox.textContent = msg;
        messageBox.style.position = 'fixed';
        messageBox.style.bottom = '20px';
        messageBox.style.left = '50%';
        messageBox.style.transform = 'translateX(-50%)';
        messageBox.style.backgroundColor = 'white';
        messageBox.style.color = 'green';
        messageBox.style.padding = '10px 20px';
        messageBox.style.borderRadius = '10px';
        messageBox.style.boxShadow = '0 2px 6px rgba(0,0,0,0.2)';
        document.body.appendChild(messageBox);
        
        setTimeout(() => {
            messageBox.remove(); // Remove the message after displaying it for 2 seconds
        }, 2000);
    }

    // Hamburger menu functionality
    document.getElementById('hamburger').addEventListener('click', function () {
        const navBar = document.querySelector('.nav-bar ul');
        navBar.style.display = navBar.style.display === 'flex' ? 'none' : 'flex'; // Toggle display
    });

    // Cart functionality
    const cartContainer = document.getElementById('cart-container');
    const totalItems = document.getElementById('total-items');
    const totalPrice = document.getElementById('total-price');
    const checkoutBtn = document.getElementById('checkout-btn');

    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    function updateCart() {
        if (cartContainer) {
            cartContainer.innerHTML = '';
            let total = 0;

            cart.forEach(item => {
                const itemTotal = item.price * item.quantity;
                total += itemTotal;

                const cartItem = `
                    <div class="cart-item">
                        <img src="${item.image}" alt="${item.name}">
                        <div class="item-info">
                            <h4>${item.name}</h4>
                            <p>Price: $${item.price}</p>
                            <p>Quantity: 
                                <button class="decrease-quantity" data-name="${item.name}">-</button>
                                ${item.quantity}
                                <button class="increase-quantity" data-name="${item.name}">+</button>
                            </p>
                            <p>Total: $${itemTotal.toFixed(2)}</p>
                            <button class="remove-item" data-name="${item.name}">Remove</button>
                        </div>
                    </div>
                `;
                cartContainer.innerHTML += cartItem;
            });

            totalItems.textContent = `Total items: ${cart.length}`;
            totalPrice.textContent = `Total price: $${total.toFixed(2)}`;
        }
    }

    function addToCart(product) {
        const cartItem = cart.find(item => item.id === product.id);
        if (cartItem) {
            cartItem.quantity += 1;
        } else {
            cart.push({...product, quantity: 1});
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        displayMessage(`${product.name} has been added to your cart.`);
    }

    if (cartContainer) {
        cartContainer.addEventListener('click', function(event) {
            if (event.target.classList.contains('remove-item')) {
                const name = event.target.getAttribute('data-name');
                const itemIndex = cart.findIndex(item => item.name === name);
                cart.splice(itemIndex, 1);
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCart();
                displayMessage(`${name} has been removed from your cart.`);
            } else if (event.target.classList.contains('increase-quantity')) {
                const name = event.target.getAttribute('data-name');
                const item = cart.find(item => item.name === name);
                item.quantity += 1;
                localStorage.setItem('cart', JSON.stringify(cart));
                updateCart();
            } else if (event.target.classList.contains('decrease-quantity')) {
                const name = event.target.getAttribute('data-name');
                const item = cart.find(item => item.name === name);
                if (item.quantity > 1) {
                    item.quantity -= 1;
                    localStorage.setItem('cart', JSON.stringify(cart));
                    updateCart();
                }
            }
        });

        if (checkoutBtn) {
            checkoutBtn.addEventListener('click', function() {
                window.location.href = 'checkout.php'; // Redirect to the checkout page
            });
        }

        updateCart();
    }

    // Add new login functionality
    const loginForm = document.getElementById('loginForm');
    const errorMessage = document.getElementById('errorMessage');

    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission

            // Create FormData object and send it via AJAX
            const formData = new FormData(loginForm);
            fetch('login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    displayMessage('Login successful! Redirecting...');
                    setTimeout(() => {
                        window.location.href = 'index.php'; // Redirect to home page on success
                    }, 2000);
                } else {
                    errorMessage.textContent = data.message; // Display error message
                    errorMessage.style.display = 'block';
                }
            })
            .catch(error => {
                console.error('Error:', error);
                errorMessage.textContent = 'An error occurred. Please try again.';
                errorMessage.style.display = 'block';
            });
        });
    }
});
