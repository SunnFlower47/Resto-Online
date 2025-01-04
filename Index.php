<?php
require 'conection.php';
require 'val.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Bite</title>
    <link rel="stylesheet" href="assets/css/style.css" />
    <!-- Font Awesome Icons -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
    />
    <style>
        /* Styling tambahan untuk sidebar dan input search */
        .sidebar {
            position: fixed;
            right: -300px;
            top: 0;
            width: 300px;
            height: 100%;
            background: #fff;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
            transition: right 0.3s ease;
            z-index: 1000;
        }

        .sidebar.open {
            right: 0;
        }

        .search--box {
            display: flex;
            align-items: center;
            background-color: #f4f4f4;
            border-radius: 8px;
            padding: 5px 10px;
        }

        .search--box input {
            border: none;
            outline: none;
            background: transparent;
            padding: 5px;
            font-size: 16px;
            width: 100%;
        }

        .logo {
            font-size: 24px;
            margin-right: 10px;
            font-weight: bold;
        }

        .logo span {
            color: #f00;
        }

        .logout {
            background-color: #f00;
            color: #fff;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }

        /* Modal CSS */
        .checkout-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            display: none; /* Sembunyikan modal secara default */
            z-index: 1000;
        }

        .checkout-modal-content {
            background: white;
            padding: 20px;
            width: 400px;
            margin: 50px auto;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .checkout-modal-content .close-btn {
            font-size: 30px;
            color: #f00;
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        .checkout-modal h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            font-size: 14px;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 8px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #f00;
            color: white;
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #c00;
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="header">
        <nav class="header--menu">
            <div class="logo">Quick<span>Bite</span></div>
        </nav>
        <nav class="header--menu">
            <div class="search--box">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" id="searchInput" placeholder="Search for food..." />
            </div>
            <div class="auth">
                <a class="logout" href="logout.php" class="login-btn">Logout</a>
            </div>
            <div class="menu--icons">
                <i class="fa-solid fa-bowl-food"></i>
                <div class="cart-icon">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <span>0</span>
                </div>
            </div>
            <div class="burger--icons">
                <i class="fa-solid fa-bars" id="toggle-sidebar"></i>
            </div>
        </nav>
    </header>

    <!-- Cover Section -->
    <section class="cover">
    <div class="cover--overlay">
        <br>
        <br>
        <br>
        <br>
        <br>
        <h1>Quick Bite</h1>
        <span class="slogan">Where Taste Takes the Fast Lane</span><br>
        <br>
        <br>
        <br>
        <br>
        <br>
    </div>
</section>

    <!-- Main Content -->
    <main>
        <!-- Food Menu Section -->
        <h2 class="section-heading">Food Menu</h2>
        <div class="menu--list">
            <div class="menu--item">
                <img src="assets/image/food.jpg" alt="" />
                <h5>Salad</h5>
            </div>
            <div class="menu--item">
                <img src="assets/image/food2.jpg" alt="" />
                <h5>Burger</h5>
            </div>
            <div class="menu--item">
                <img src="assets/image/food3.png" alt="" />
                <h5>Milkshake</h5>
            </div>
            <div class="menu--item">
                <img src="assets/image/foodd4.jpg" alt="" />
                <h5>French Fries</h5>
            </div>
            <div class="menu--item">
                <img src="assets/image/pizaa.jpg" alt="" />
                <h5>Fizza</h5>
            </div>
            <div class="menu--item">
                <img src="assets/image/food8.jpg" alt="" />
                <h5>Minuman</h5>
            </div>
            <div class="menu--item">
                <img src="assets/image/ayam.jpg" alt="" />
                <h5>Fried Chiken</h5>
            </div>
            <div class="menu--item">
                <img src="assets/image/nasgor.jpg" alt="" />
                <h5>Nasi Goreng</h5>
            </div>
            <div class="menu--item">
                <img src="assets/image/Cofee.jpg" alt="" />
                <h5>Coffe</h5>
            </div>
            <div class="menu--item">
                <img src="assets/image/aqua.jpeg" alt="" />
                <h5>Mineral Water</h5>
            </div>
            <div class="menu--item">
                <img src="assets/image/rvv.jpg" alt="" />
                <h5>Redvelvet</h5>
            </div>
            <div class="menu--item">
                <img src="assets/image/food5.jpg" alt="" />
                <h5>Hot Dog</h5>
            </div>
        </div>

        <!-- Menu Items Section -->
        <h2 class="section-heading">Menu Items</h2>
        <div class="card--list">
            <!-- Example Card -->
            <div class="card">
                <img src="assets/image/food.jpg" alt="img" />
                <h4 class="card--title">Salad</h4>
                <div class="card--price">
                    <div class="price">Rp.30.000</div>
                    <i class="fa-solid fa-plus add-to-cart"></i>
                </div>
            </div>
            <div class="card">
                <img src="assets/image/food2.jpg" alt="" />
                <h4 class="card--title">Burger</h4>
                <div class="card--price">
                    <div class="price">Rp.30.000</div>
                    <i class="fa-solid fa-plus add-to-cart"></i>
                </div>
            </div>
            <div class="card">
                <img src="assets/image/food3.png" alt="" />
                <h4 class="card--title">Milkshake</h4>
                <div class="card--price">
                    <div class="price">Rp.15.000</div>
                    <i class="fa-solid fa-plus add-to-cart"></i>
                </div>
            </div>
            <div class="card">
                <img src="assets/image/foodd4.jpg" alt="" />
                <h4 class="card--title">French Fries</h4>
                <div class="card--price">
                    <div class="price">Rp.20.000</div>
                    <i class="fa-solid fa-plus add-to-cart"></i>
                </div>
            </div>
            <div class="card">
                <img src="assets/image/pizaa.jpg" alt="img" />
                <h4 class="card--title">pizza</h4>
                <div class="card--price">
                    <div class="price">Rp.50.000</div>
                    <i class="fa-solid fa-plus add-to-cart"></i>
                </div>
            </div>
            <div class="card">
                <img src="assets/image/food8.jpg" alt="img" />
                <h4 class="card--title">Minuman</h4>
                <div class="card--price">
                    <div class="price">Rp.10.000</div>
                    <i class="fa-solid fa-plus add-to-cart"></i>
                </div>
            </div>
            <div class="card">
                <img src="assets/image/ayam.jpg" alt="img" />
                <h4 class="card--title">Fried Chiken</h4>
                <div class="card--price">
                    <div class="price">Rp.35.000</div>
                    <i class="fa-solid fa-plus add-to-cart"></i>
                </div>
            </div>
            <div class="card">
                <img src="assets/image/nasgor.jpg" alt="img" />
                <h4 class="card--title">Nasi Goreng</h4>
                <div class="card--price">
                    <div class="price">Rp.20.000</div>
                    <i class="fa-solid fa-plus add-to-cart"></i>
                </div>
            </div>
            <div class="card">
                <img src="assets/image/cofee.jpg" alt="img" />
                <h4 class="card--title">Cofee</h4>
                <div class="card--price">
                    <div class="price">Rp.25.000</div>
                    <i class="fa-solid fa-plus add-to-cart"></i>
                </div>
            </div>
            <div class="card">
                <img src="assets/image/aqua.jpeg" alt="img" />
                <h4 class="card--title">Mineral</h4>
                <div class="card--price">
                    <div class="price">Rp.10.000</div>
                    <i class="fa-solid fa-plus add-to-cart"></i>
                </div>
            </div>
            <div class="card">
                <img src="assets/image/rvv.jpg" alt="img" />
                <h4 class="card--title">Redvelvet</h4>
                <div class="card--price">
                    <div class="price">Rp.25.000</div>
                    <i class="fa-solid fa-plus add-to-cart"></i>
                </div>
            </div>
            <div class="card">
                <img src="assets/image/food5.jpg" alt="img" />
                <h4 class="card--title">Hot Dog</h4>
                <div class="card--price">
                    <div class="price">Rp.30.000</div>
                    <i class="fa-solid fa-plus add-to-cart"></i>
                </div>
            </div>
        </div>
    </main>

    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-close" id="close-sidebar">
            <i class="fa-solid fa-close"></i>
        </div>
        <div class="cart-menu">
            <h3>My Cart</h3>
            <div class="cart-items">Cart is empty</div>
        </div>

        <div class="sidebar--footer">
            <div class="total--amount">
                <h5>Total</h5>
                <div class="cart-total">Rp.00.000</div>
            </div>
            <button class="checkout-btn">Checkout</button>
        </div>
    </div>

    <div id="checkoutFormModal" class="checkout-modal">
    <div class="checkout-modal-content">
        <span class="close-btn" id="closeModal">&times;</span>
        <h2>Informasi Pemesanan</h2>

        <!-- Form Pembayaran dan Alamat -->
        <div class="checkout-container">
            <form method="POST" action="checkout.php" class="checkout-form">
                <div class="form-element">
                    <label for="full-name">Nama Lengkap</label>
                    <input type="text" name="full-name" id="full-name" required>
                </div>
                <div class="form-element">
                    <label for="user-email">Email Address</label>
                    <input type="email" name="user-email" id="user-email" value="<?php echo $_SESSION['user_email']; ?>" required>
                </div>
                <div class="form-element">
                    <label for="delivery-address">Alamat pengiriman</label>
                    <textarea name="delivery-address" id="delivery-address" required></textarea>
                </div>
                <div class="form-element">
                    <label for="phone-number">Nomor telpon</label>
                    <input type="number" name="phone-number" id="phone-number" required>
                </div>
                <div class="form-element">
                    <label for="payment-method">Payment Method</label>
                    <select name="payment-method" id="payment-method" required>
                        <option value="Qris">Qris</option>
                        <option value="DANA">DANA</option>
                        <option value="bank-transfer">Bank Transfer</option>
                    </select>
                </div>
                <button type="submit" name="submit-checkout">Submit Checkout</button>
            </form>
        </div>
    </div>
</div>

    <footer class="custom-footer py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; RA.QuickBite 2024 STT WASTUKANCANA 2024</div>
        </div>
    </div>
</footer>

    <!-- Scripts -->
    <script src="assets/js/main.js"></script>

    <script>
        // Ambil elemen modal dan tombol
        var checkoutModal = document.getElementById('checkoutFormModal');
        var checkoutBtn = document.querySelector('.checkout-btn');
        var closeModalBtn = document.getElementById('closeModal');

        // Ketika tombol Checkout diklik, tampilkan modal
        checkoutBtn.addEventListener('click', function() {
            checkoutModal.style.display = 'block';
        });

        // Ketika tombol Close (X) diklik, sembunyikan modal
        closeModalBtn.addEventListener('click', function() {
            checkoutModal.style.display = 'none';
        });

        // Jika area di luar modal diklik, sembunyikan modal
        window.onclick = function(event) {
            if (event.target == checkoutModal) {
                checkoutModal.style.display = 'none';
            }
        };
    </script>
    
</body>
</html>
