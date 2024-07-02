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

let selectedGamesCount = 0;

    $('.quantity-input').on('change', function () {
        const totalGames = parseInt($(this).val());
        if (totalGames > 7) {
            $('#quantity0').attr('disabled', true);
            $('#quantity1').attr('disabled', true);
        }
        if (totalGames > 10) {
            $('#quantity2').attr('disabled', true);
        }
        if (totalGames > 12) {
            $('#quantity3').attr('disabled', true);
        }
    });

    $('.add-to-cart').on('click', function () {
        selectedGamesCount += parseInt($(this).prev().find('.quantity-input').val());
        $('#selected-games-count').val(selectedGamesCount);
        if (selectedGamesCount > 7) {
            $('#quantity0').attr('disabled', true);
            $('#quantity1').attr('disabled', true);
        }
        if (selectedGamesCount > 10) {
            $('#quantity2').attr('disabled', true);
        }
        if (selectedGamesCount > 12) {
            $('#quantity3').attr('disabled', true);
        }
    });