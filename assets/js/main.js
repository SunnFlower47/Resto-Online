document.addEventListener('DOMContentLoaded', () => {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartItemCount = document.querySelector('.cart-icon span');
    const cartItemsList = document.querySelector('.cart-menu .cart-items');
    const cartTotal = document.querySelector('.cart-total');
    const sidebar = document.getElementById('sidebar');
    const burgerIcon = document.querySelector('.burger--icons i');
    const sidebarClose = document.querySelector('.sidebar-close i');

    let cartItems = []; // Array menyimpan item di keranjang
    let totalAmount = 0;

    // === Fungsi Toggle Sidebar ===
    burgerIcon.addEventListener('click', () => {
        sidebar.classList.add('open'); // Buka sidebar
    });

    sidebarClose.addEventListener('click', () => {
        sidebar.classList.remove('open'); // Tutup sidebar
    });

    // === Fungsi Tambah ke Keranjang ===
    addToCartButtons.forEach((button, index) => {
        button.addEventListener('click', () => {
            const card = button.closest('.card');
            const item = {
                name: card.querySelector('.card--title').textContent,
                price: parseFloat(
                    card.querySelector('.price').textContent.replace('Rp.', '').replace(',', '000')
                ),
                quantity: 1,
            };

            const existingItem = cartItems.find(cartItem => cartItem.name === item.name);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cartItems.push(item);
            }

            totalAmount += item.price;
            updateCartUI();
        });
    });

    // === Fungsi Update UI ===
    function updateCartUI() {
        updateCartItemCount(cartItems.length);
        updateCartItemList();
        updateCartTotal();
    }

    function updateCartItemCount(count) {
        cartItemCount.textContent = count;
    }

    function updateCartItemList() {
        cartItemsList.innerHTML = ''; // Bersihkan item lama
        cartItems.forEach((item) => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');
            cartItem.innerHTML = `
                <span>${item.name}</span>
                <span>Qty: ${item.quantity}</span>
                <span>Rp.${(item.price * item.quantity).toLocaleString()}</span>
            `;
            cartItemsList.appendChild(cartItem);
        });
    }

    function updateCartTotal() {
        // Format totalAmount menjadi Rp dengan 3 digit nol di belakang
        const formattedTotal = totalAmount.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR',
            minimumFractionDigits: 3,
            maximumFractionDigits: 3,  
        });
    
        cartTotal.textContent = formattedTotal;  
    }
    

    // Fungsi pencarian
    const searchInput = document.getElementById('searchInput');
    const menuItems = document.querySelectorAll('.card');

    searchInput.addEventListener('input', () => {
        const query = searchInput.value.toLowerCase().trim();
        menuItems.forEach((item) => {
            const title = item.querySelector('.card--title').textContent.toLowerCase();
            if (title.includes(query)) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});