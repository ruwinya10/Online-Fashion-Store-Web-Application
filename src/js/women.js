document.addEventListener('DOMContentLoaded', () => {
    const cartButtons = document.querySelectorAll('.cart-btn');

    cartButtons.forEach(button => {
        button.addEventListener('click', () => {
            const productID = button.getAttribute('data-id');
            const size = document.querySelector(`.size[data-id='${productID}']`).value;
            const quantity = document.querySelector(`.quantity[data-id='${productID}']`).value;

            if (size === '' || quantity < 1) {
                alert('Please select a valid size and quantity.');
                return;
            }

            const productData = {
                productID: productID,
                size: size,
                quantity: quantity
            };

            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(productData)
            })
            .then(response => response.text())
            .then(data => {
                ; // Display success or error message
            })
            .catch(error => console.error('Error:', error));
        });
    });
})