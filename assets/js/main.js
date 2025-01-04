document.addEventListener('DOMContentLoaded', () => {
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    const cartItemCount = document.querySelector('.cart-icon span');
    const cartItemsList = document.querySelector('.cart-items');
    const cartTotal = document.querySelector('.cart-total');
    const sidebar = document.getElementById('sidebar');
    const burgerIcon = document.querySelector('.burger--icons i');
    const sidebarClose = document.getElementById('close-sidebar');

    let cartItems = []; 
    let totalAmount = 0;

    burgerIcon.addEventListener('click', () => {
        sidebar.classList.add('open'); 
    });

    sidebarClose.addEventListener('click', () => {
        sidebar.classList.remove('open'); 
    });
    

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

            updateCart();
        });
    });

    function updateCart() {
        cartItemsList.innerHTML = '';
        totalAmount = 0;

        cartItems.forEach((item, index) => {
            const cartItem = document.createElement('div');
            cartItem.classList.add('cart-item');
            cartItem.innerHTML = `
                <span>${item.name}</span>
                <span>Rp.${(item.price * 1000).toLocaleString('id-ID', { minimumFractionDigits: 0})}</span>
                <span>Qty: ${item.quantity}</span>
                <button class="remove-item" data-index="${index}">' X '</button>
            `;
            cartItemsList.appendChild(cartItem);

            totalAmount += item.price * item.quantity;
        });

        cartItemCount.textContent = cartItems.length;
        cartTotal.textContent = `Rp.${(totalAmount * 1000).toLocaleString('id-ID', { minimumFractionDigits: 2 })}`;

        const removeButtons = document.querySelectorAll('.remove-item');
        removeButtons.forEach(button => {
            button.addEventListener('click', (e) => {
                const index = e.target.getAttribute('data-index');
                cartItems.splice(index, 1);
                updateCart();
            });
        });
    }
    

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