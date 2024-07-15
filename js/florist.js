document.addEventListener('DOMContentLoaded', function() {
    const mainElement = document.querySelector('main');
    const category = mainElement.getAttribute('data-category');  // Get the preselected category from the main element

    function fetchProducts(params) {
        fetch('fetch_products.php?' + params.toString())
            .then(response => response.json())
            .then(products => {
                const bestSellersContainer = document.getElementById('best-sellers');
                const shopByCategoryContainer = document.getElementById('shop-by-category');
                const productList = document.getElementById('product-list');

                // Clear current products
                if (bestSellersContainer) bestSellersContainer.innerHTML = '';
                if (shopByCategoryContainer) shopByCategoryContainer.innerHTML = '';
                if (productList) productList.innerHTML = '';

                products.forEach(product => {
                    const productCard = `
                        <div class="content-card">
                            <img src="${product.image}" alt="${product.name}" class="redirect-image">
                            <div class="card-info">
                                <h4>${product.name}</h4>
                                <p style="color: #bf2e1a;">${product.description}</p>
                                <h4>$${product.price}</h4>
                            </div>
                            <button class="add-to-cart-btn" data-product='${JSON.stringify(product)}'>Add to Cart</button>
                        </div>
                    `;

                    if (bestSellersContainer) bestSellersContainer.innerHTML += productCard;
                    if (shopByCategoryContainer) shopByCategoryContainer.innerHTML += productCard;
                    if (productList) productList.innerHTML += productCard;
                });

                // Add event listeners for dynamically added cart buttons
                document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                    button.addEventListener('click', function() {
                        const product = JSON.parse(this.getAttribute('data-product'));
                        addToCart(product);
                        window.location.href = 'cart.html'; // Redirect to the cart page
                    });
                });

                // Add event listeners for dynamically added redirect images
                document.querySelectorAll('.redirect-image').forEach(image => {
                    image.style.cursor = 'pointer'; // Optional: Change cursor on hover
                    image.addEventListener('click', function() {
                        // Redirect user to the login page when the image is clicked
                        window.location.href = 'login.html';
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
                window.location.href = `shop.html${queryParams}`;
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
                window.location.href = 'shop.html';
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
                alert('Proceeding to checkout...');
                // Implement the checkout functionality here
            });
        }

        updateCart();
    }
});
