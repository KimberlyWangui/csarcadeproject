document.addEventListener('DOMContentLoaded', function() {
    const updateQuantity = (index, delta) => {
        const quantityInput = document.getElementById('quantity' + index);
        let currentValue = parseInt(quantityInput.value);
        if (isNaN(currentValue)) {
            currentValue = 1;
        }
        const newValue = currentValue + delta;
        if (newValue >= 1 && newValue <= 10) {
            quantityInput.value = newValue;
        }
    };

    document.querySelectorAll('.quantity-btn').forEach(button => {
        button.addEventListener('click', function() {
            const index = this.getAttribute('data-id');
            const delta = this.classList.contains('minus') ? -1 : 1;
            updateQuantity(index, delta);
        });
    });
});
