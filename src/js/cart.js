document.addEventListener('DOMContentLoaded', () => {
    // Function to calculate the subtotal
    function calculateSubtotal() {
        let subtotal = 0;
        document.querySelectorAll('#cart-table tbody tr').forEach(row => {
            const totalPrice = parseFloat(row.querySelector('.total-price').textContent.replace('$', ''));
            subtotal += totalPrice;
        });
        document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
    }

    // Handle save button click
    document.querySelectorAll('.save-btn').forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('tr');
            const cartID = row.getAttribute('data-id');
            const newSize = row.querySelector('.edit-size').value;
            const newQuantity = row.querySelector('.edit-quantity').value;

            fetch('update_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ cartID, size: newSize, quantity: newQuantity })
            })
            .then(response => response.text())
            .then(data => {
                if (data === "success") {
                    const price = parseFloat(row.querySelector('td:nth-child(3)').textContent.replace('$', ''));
                    const newTotal = (price * newQuantity).toFixed(2);
                    row.querySelector('.total-price').textContent = `$${newTotal}`;
                    calculateSubtotal();
                    alert('Cart updated successfully');
                } else {
                    alert('Error updating cart');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while updating the cart');
            });
        });
    });

    // Handle remove button click
    document.querySelectorAll('.remove-btn').forEach(button => {
        button.addEventListener('click', function () {
            const row = this.closest('tr');
            const cartID = row.getAttribute('data-id');

            fetch(`remove_from_cart.php?id=${cartID}`, {
                method: 'GET'
            })
            .then(response => response.text())
            .then(data => {
                if (data.trim() === "Product removed from cart") {
                    row.remove();
                    calculateSubtotal();
                    alert('Product removed from cart');
                } else {
                    alert('Error removing product from cart');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred while removing the product');
            });
        });
    });

    // Initial subtotal calculation on page load
    calculateSubtotal();

    // Handle checkout button click
    const checkoutButton = document.getElementById('checkout');
    checkoutButton.addEventListener('click', () => {
        window.location.href = 'summary.html'; // Redirect to checkout page
    });
});
