document.getElementById('promo').addEventListener('change', function() {
    const promoPriceContainer = document.getElementById('promo-price-container');
    promoPriceContainer.classList.toggle('hidden', !this.checked);
});