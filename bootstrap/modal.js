document.addEventListener('DOMContentLoaded', function() {
    // Dapatkan semua tombol "Buy Now"
    const buyNowButtons = document.querySelectorAll('.btn-buy-now');

    buyNowButtons.forEach(button => {
        button.addEventListener('click', function(event) {
            // Dapatkan elemen produk terkait
            const productCard = event.target.closest('.product-card');
            const productName = productCard.querySelector('h5').textContent;
            const productPrice = productCard.querySelector('.price').textContent;
            const productId = productCard.dataset.productId; // Pastikan Anda menambahkan data-product-id pada elemen produk

            // Isi data ke dalam modal
            document.getElementById('product_name').textContent = productName;
            document.getElementById('price_display').textContent = productPrice;
            document.getElementById('product_id').value = productId;
            document.getElementById('product_price').value = productPrice.replace('Rp', '').replace(/\./g, '');
        });
    });
});