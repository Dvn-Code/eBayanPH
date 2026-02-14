<div class="login-container">
    <div class="login-left">
        <div class="login-logo">
            <!-- <div class="seal">EB</div> --><img src="pictures/final_logo.png" alt="eBayan Logo" class="logo-image">
        </div>
        <div class="login-welcome">
            <h2>Welcome to eBayan</h2>
            <p>Access government services, announcements, and information for all citizens of the Republic of the Philippines.</p>
        </div>
        <img src="pictures/gov_logo.png" alt = "gov logo"class="gov-image">
    </div>
    <div class="login-right">
        <div class="login-box">
            <h3>Sign In</h3>
            <p>Access your eBayan account</p>
            
            <a href="?action=google-signin" class="btn btn-google">
                <svg width="20" height="20" viewBox="0 0 20 20">
                    <path fill="#4285F4" d="M19.6 10.23c0-.82-.1-1.42-.25-2.05H10v3.72h5.5c-.15.96-.74 2.31-2.04 3.22v2.45h3.16c1.89-1.73 2.98-4.3 2.98-7.34z"/>
                    <path fill="#34A853" d="M13.46 15.13c-.83.59-1.96 1-3.46 1-2.64 0-4.88-1.74-5.68-4.15H1.07v2.52C2.72 17.75 6.09 20 10 20c2.7 0 4.96-.89 6.62-2.42l-3.16-2.45z"/>
                    <path fill="#FBBC05" d="M3.99 10c0-.69.12-1.35.32-1.97V5.51H1.07A9.973 9.973 0 000 10c0 1.61.39 3.14 1.07 4.49l3.24-2.52c-.2-.62-.32-1.28-.32-1.97z"/>
                    <path fill="#EA4335" d="M10 3.88c1.88 0 3.13.81 3.85 1.48l2.84-2.76C14.96.99 12.7 0 10 0 6.09 0 2.72 2.25 1.07 5.51l3.24 2.52C5.12 5.62 7.36 3.88 10 3.88z"/>
                </svg>
                Continue with Google
            </a>
            
            <div class="divider">or</div>
            
            <?php
                include __DIR__ . '/../includes/config.php';
                
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    
                    $sql = "SELECT * FROM ebayan WHERE email = ?";
                    $stmt = mysqli_prepare($connection, $sql);
                    mysqli_stmt_bind_param($stmt, "s", $email);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    
                    if (mysqli_num_rows($result) > 0) {
                        $user = mysqli_fetch_assoc($result);
                        if (password_verify($password, $user['password'])) {
                            $_SESSION['user_id'] = $user['id'];
                            $_SESSION['email'] = $user['email'];
                            header("Location: ?page=home");
                            exit();
                        } else {
                            echo '<p style="color: red; text-align: center;">Invalid password</p>';
                        }
                    } else {
                        echo '<p style="color: red; text-align: center;">Email not found</p>';
                    }
                    mysqli_stmt_close($stmt);
                }
            ?>
            
            <form method="POST" action="">
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" required placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required placeholder="Enter your password">
                </div>
                <button type="submit" name="login" class="btn btn-primary">Sign In</button>
            </form>
            
            <div class="signup-link">
                Don't have an account? <a href="?page=signup">Sign Up</a>
            </div>
        </div>
    </div>
</div>