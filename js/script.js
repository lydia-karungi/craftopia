document.addEventListener('DOMContentLoaded', function () {
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

                // Check if there are any products
                if (products.length === 0) {
                    const noProductsMessage = `
                        <div class="no-products-message">
                            <p>No products matching your criteria were found. Please try adjusting your filters or check back later.</p>
                        </div>
                    `;
                    if (bestSellersContainer) bestSellersContainer.innerHTML = noProductsMessage;
                    if (shopByCategoryContainer) shopByCategoryContainer.innerHTML = noProductsMessage;
                    if (productList) productList.innerHTML = noProductsMessage;
                    return;
                }

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

                // Display Best Sellers
                bestSellersToShow.forEach(product => {
                    if (bestSellersContainer) bestSellersContainer.innerHTML += createProductCard(product);
                });

                // Display Shop by Category
                if (shopByCategoryContainer) fetchCategories();

                if (productList) {
                    products.forEach(product => {
                        productList.innerHTML += createProductCard(product);
                    });
                }

                // Add event listeners for dynamically added cart buttons
                document.querySelectorAll('.add-to-cart-btn').forEach(button => {
                    button.addEventListener('click', function () {
                        const product = JSON.parse(this.getAttribute('data-product'));
                        addToCart(product);
                        window.location.href = 'cart.php'; // Redirect to the cart page
                    });
                });

                // Add event listeners for dynamically added redirect images
                document.querySelectorAll('.redirect-image').forEach(image => {
                    image.style.cursor = 'pointer'; // Optional: Change cursor on hover
                    image.addEventListener('click', function () {
                        const productId = this.getAttribute('data-id');
                        window.location.href = `product_detail.php?id=${productId}`;
                    });
                });
            })
            .catch(error => console.error('Error fetching products:', error));
    }

    function fetchCategories() {
        const categories = [
            { id: 1, name: 'Jewellery', image: 'product_images/jewellery_category.jpg', link: 'jewellery.php' },
            { id: 2, name: 'Kitchen', image: 'product_images/kitchen_category.jpg', link: 'kitchen.php' },
            { id: 3, name: 'Bedroom', image: 'product_images/bedroom_category.jpg', link: 'bedroom.php' },
            { id: 4, name: 'Outdoor', image: 'product_images/outdoor_category.jpg', link: 'outdoor.php' },
        ];

        const shopByCategoryContainer = document.getElementById('shop-by-category');
        shopByCategoryContainer.innerHTML = '';

        categories.forEach(category => {
            const categoryCard = `
                <div class="content-card">
                    <a href="${category.link}">
                        <img src="${category.image}" alt="${category.name}" class="category-image">
                        <div class="card-info">
                            <h4>${category.name}</h4>
                        </div>
                    </a>
                </div>
            `;
            shopByCategoryContainer.innerHTML += categoryCard;
        });
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
        filterForm.addEventListener('submit', function (event) {
            event.preventDefault();  // Prevent the form from submitting the traditional way
            fetchFilteredProducts();
        });
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
            cart.push({ ...product, quantity: 1 });
        }
        localStorage.setItem('cart', JSON.stringify(cart));
        displayMessage(`${product.name} has been added to your cart.`);
    }

    if (cartContainer) {
        cartContainer.addEventListener('click', function (event) {
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
            checkoutBtn.addEventListener('click', function () {
                window.location.href = 'checkout.php'; // Redirect to the checkout page
            });
        }

        updateCart();
    }

    // Fetch and display reviews
    fetch('fetch_reviews.php?fetch=reviews')
        .then(response => response.json())
        .then(reviews => {
            const carouselContainer = document.getElementById('carousel-container');
            carouselContainer.innerHTML = '';

            // Organize reviews into groups of 4
            const groups = [];
            for (let i = 0; i < reviews.length; i += 4) {
                groups.push(reviews.slice(i, i + 4));
            }

            // Display 4 reviews at a time
            groups.forEach(group => {
                const groupItem = document.createElement('div');
                groupItem.classList.add('carousel-group');
                group.forEach(review => {
                    const reviewItem = document.createElement('div');
                    reviewItem.classList.add('carousel-item');
                    reviewItem.innerHTML = `
                        <div class="content-card">
                            <h4>${review.reviewer_name}</h4>
                            <p>"${review.review_text}"</p>
                            <p>Rating: ${review.rating} / 5</p>
                        </div>
                    `;
                    groupItem.appendChild(reviewItem);
                });
                carouselContainer.appendChild(groupItem);
            });

            // Initialize the carousel
            const items = document.querySelectorAll('.carousel-group');
            let currentIndex = 0;

            function showGroup(index) {
                items.forEach((group, i) => {
                    group.style.display = i === index ? 'flex' : 'none';
                });
            }

            document.getElementById('next').addEventListener('click', () => {
                currentIndex = (currentIndex + 1) % items.length;
                showGroup(currentIndex);
            });

            document.getElementById('prev').addEventListener('click', () => {
                currentIndex = (currentIndex - 1 + items.length) % items.length;
                showGroup(currentIndex);
            });

            // Display the first group initially
            if (items.length > 0) showGroup(0);
        })
        .catch(error => console.error('Error fetching reviews:', error));

    // Review submission
    document.getElementById('reviewForm').addEventListener('submit', function (event) {
        event.preventDefault(); // Prevent the form from submitting the traditional way

        const name = document.getElementById('reviewerName').value.trim();
        const rating = document.getElementById('reviewRating').value.trim();
        const review = document.getElementById('reviewText').value.trim();

        if (name && rating && review) {
            fetch('submit_review.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ name, rating, review }),
            })
                .then(response => response.json())
                .then(data => {
                    const feedback = document.getElementById('reviewFeedback');
                    if (data.success) {
                        feedback.textContent = 'Review submitted successfully!';
                        feedback.style.color = 'green';
                        // Optionally, refresh the reviews carousel
                        fetchReviews();
                    } else {
                        feedback.textContent = 'Error submitting review. Please try again.';
                        feedback.style.color = 'red';
                    }
                    feedback.style.display = 'block';
                })
                .catch(error => console.error('Error submitting review:', error));
        } else {
            alert('Please fill in all fields.');
        }
    });

    function fetchReviews() {
        fetch('fetch_reviews.php?fetch=reviews')
            .then(response => response.json())
            .then(reviews => {
                const carouselContainer = document.getElementById('carousel-container');
                carouselContainer.innerHTML = '';

                // Organize reviews into groups of 4
                const groups = [];
                for (let i = 0; i < reviews.length; i += 4) {
                    groups.push(reviews.slice(i, i + 4));
                }

                // Display 4 reviews at a time
                groups.forEach(group => {
                    const groupItem = document.createElement('div');
                    groupItem.classList.add('carousel-group');
                    group.forEach(review => {
                        const reviewItem = document.createElement('div');
                        reviewItem.classList.add('carousel-item');
                        reviewItem.innerHTML = `
                            <div class="content-card">
                                <h4>${review.reviewer_name}</h4>
                                <p>"${review.review_text}"</p>
                                <p>Rating: ${review.rating} / 5</p>
                            </div>
                        `;
                        groupItem.appendChild(reviewItem);
                    });
                    carouselContainer.appendChild(groupItem);
                });

                // Initialize the carousel
                const items = document.querySelectorAll('.carousel-group');
                let currentIndex = 0;

                function showGroup(index) {
                    items.forEach((group, i) => {
                        group.style.display = i === index ? 'flex' : 'none';
                    });
                }

                document.getElementById('next').addEventListener('click', () => {
                    currentIndex = (currentIndex + 1) % items.length;
                    showGroup(currentIndex);
                });

                document.getElementById('prev').addEventListener('click', () => {
                    currentIndex = (currentIndex - 1 + items.length) % items.length;
                    showGroup(currentIndex);
                });

                // Display the first group initially
                if (items.length > 0) showGroup(0);
            })
            .catch(error => console.error('Error fetching reviews:', error));
    }

    // Review Carousel Functionality
    let slideIndex = 0;
    showSlides(slideIndex);

    function showSlides(index) {
        let i;
        const slides = document.getElementsByClassName("carousel-group");
        if (index >= slides.length) { slideIndex = 0; }
        if (index < 0) { slideIndex = slides.length - 1; }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        slides[slideIndex].style.display = "flex";
    }

    function moveCarousel(n) {
        showSlides(slideIndex += n);
    }

    const prevButton = document.querySelector('.carousel-control-prev');
    const nextButton = document.querySelector('.carousel-control-next');

    if (prevButton && nextButton) {
        prevButton.addEventListener('click', function () {
            moveCarousel(-1);
        });
        nextButton.addEventListener('click', function () {
            moveCarousel(1);
        });
    }

    setInterval(() => {
        moveCarousel(1);
    }, 5000); // Auto-slide every 5 seconds

    // Call the fetchCategories function to populate the section
    fetchCategories();
});
