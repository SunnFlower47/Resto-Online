<?php
require 'conection.php';




if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    
    $cekdatabase = mysqli_query($con, "SELECT * FROM login WHERE email = '$email'");
    $data = mysqli_fetch_assoc($cekdatabase);

    if ($data && password_verify($password, $data['password'])) {
        
        $_SESSION['log'] = 'true';
        $_SESSION['user_email'] = $email; // Menyimpan email ke sesi
        header("location: index.php");
        exit();
    } else {
        $error = "Invalid email or password.";
        header("location: login.php?error=" . urlencode($error));
        exit(); 
    }
}

if (!isset($_SESSION['log'])) {

}else{
    header("location: index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <meta name="description" content=""/>
        <meta name="author" content=""/>
        <title>Login Quick Bite</title>
        <link href="assets/css/login.css" rel="stylesheet"/>
        <script
            src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js"
            crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="login-container">
            <div class="login-box">
                <h2>Login</h2>
                <?php if (isset($_GET['error'])): ?>
                <div class="error-message">
                    <?php echo htmlspecialchars($_GET['error']); ?>
                </div>
                <?php endif; ?><br>
                <form method="post">
                    <div class="textbox">
                        <input type="email" placeholder="Email" name="email" required="required"/>
                    </div>
                    <div class="textbox">
                        <input
                            type="password"
                            placeholder="Password"
                            name="password"
                            id="inputPassword"
                            required="required"/>
                    </div>
                    <div class="checkbox">
                        <input type="checkbox" id="rememberPassword"/>
                        <label for="rememberPassword">Remember me</label>
                    </div>
                    <div class="actions">
                        <a href="password.html" class="forgot-password">Lupa Password?</a>
                        <button type="submit" class="btn-submit" name="login">Login</button>
                    </div>
                </form>
                <div class="register">
                    <p>Tidak punya account?
                        <a href="register.php">register</a>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>