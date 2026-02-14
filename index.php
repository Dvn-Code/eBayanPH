<?php
include "includes/config.php";

// Check if user is logged in
$isLoggedIn = isset($_SESSION['user']);
$currentUser = $isLoggedIn ? $_SESSION['user'] : null;

// Handle logout
if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    session_destroy();
    header('Location: index.php');
    exit();
}

// Handle login
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if (!empty($email) && !empty($password)) {
        $sql = "SELECT * FROM ebayan WHERE email = ?";
        $stmt = mysqli_prepare($connection, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        
        if (mysqli_num_rows($result) > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user'] = [
                    'id' => $user['id'],
                    'email' => $user['email'],
                    'first_name' => $user['first_name'],
                    'middle_name' => $user['middle_name'],
                    'last_name' => $user['last_name'],
                    'birthday' => $user['dob'],
                    'gender' => $user['gender'],
                    'contact' => $user['contact_num'],
                    'house_num' => $user['house_num'],
                    'street' => $user['street'],
                    'barangay' => $user['barangay'],
                    'city' => $user['city'],
                    'is_verified' => $user['is_verified'] ?? false,
                    'is_admin' => $user['is_admin'] ?? false
                ];
                header('Location: index.php?page=home');
                exit();
            } else {
                $login_error = "Invalid password";
            }
        } else {
            $login_error = "Email not found";
        }
        mysqli_stmt_close($stmt);
    } else {
        $login_error = "Please enter email and password";
    }
}

// Handle signup
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    $_SESSION['user'] = [
        'email' => $_POST['email'],
        'first_name' => $_POST['first_name'],
        'middle_name' => $_POST['middle_name'],
        'last_name' => $_POST['last_name'],
        'birthday' => $_POST['birthday'],
        'gender' => $_POST['gender'],
        'contact' => $_POST['contact'],
        'house_num' => $_POST['house_num'],
        'street' => $_POST['street'],
        'barangay' => $_POST['barangay'],
        'city' => $_POST['city'],
        'is_verified' => false,
        'is_admin' => false
    ];
    include __DIR__ .'/backend/register.php';
    header('Location: index.php?page=home&show_verify=1');
    exit();
}

// Handle Google sign-in simulation
if (isset($_GET['action']) && $_GET['action'] === 'google-signin') {
    $_SESSION['user'] = [
        'email' => 'user@gmail.com',
        'first_name' => 'Google',
        'middle_name' => '',
        'last_name' => 'User',
        'birthday' => '1995-06-20',
        'gender' => 'Male',
        'contact' => '09987654321',
        'house_num' => '456',
        'street' => 'Secondary Road',
        'barangay' => 'Lahug',
        'city' => 'Cebu City',
        'is_verified' => false,
        'is_admin' => false
    ];
    header('Location: index.php?page=home&show_verify=1');
    exit();
}

// Handle profile update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_profile'])) {
    $_SESSION['user']['first_name'] = $_POST['first_name'];
    $_SESSION['user']['middle_name'] = $_POST['middle_name'];
    $_SESSION['user']['last_name'] = $_POST['last_name'];
    $_SESSION['user']['birthday'] = $_POST['birthday'];
    $_SESSION['user']['gender'] = $_POST['gender'];
    $_SESSION['user']['contact'] = $_POST['contact'];
    $_SESSION['user']['house_num'] = $_POST['house_num'];
    $_SESSION['user']['street'] = $_POST['street'];
    $_SESSION['user']['barangay'] = $_POST['barangay'];
    $_SESSION['user']['city'] = $_POST['city'];
    
    header('Location: index.php?page=profile&updated=1');
    exit();
}

// Handle verification
if (isset($_GET['action']) && $_GET['action'] === 'verify') {
    $_SESSION['user']['is_verified'] = true;
    header('Location: index.php?page=profile&verified=1');
    exit();
}

// Handle password change
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['change_password'])) {
    // In production, verify old password and update in database
    $message = "Password changed successfully!";
    header('Location: index.php?page=settings&password_changed=1');
    exit();
}

// Handle admin subscription
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['subscribe_admin'])) {
    // Store admin subscription data (in production, save to database)
    $_SESSION['admin_subscription'] = [
        'barangay_name' => $_POST['barangay_name'],
        'city' => $_POST['city'],
        'street' => $_POST['street'],
        'house_num' => $_POST['house_num'],
        'barangay' => $_POST['barangay'],
        'contact' => $_POST['barangay_contact'],
        'email' => $_POST['barangay_email'],
        'captain_name' => $_POST['captain_name'],
        'submitted_at' => date('Y-m-d H:i:s')
    ];
    header('Location: index.php?page=home&admin_request=1');
    exit();
}

// Get current page
$page = isset($_GET['page']) ? $_GET['page'] : ($isLoggedIn ? 'home' : 'login');

// Redirect to login if not logged in and trying to access protected pages
$protectedPages = ['home', 'announcements', 'services', 'complaints', 'cebu-city', 'cebu-announcements', 
                    'cebu-services', 'cebu-complaints', 'pardo', 'pardo-announcements', 'pardo-services', 
                    'pardo-complaints', 'pardo-officials', 'profile', 'settings', 'faq', 'about', 'admin-subscribe'];
if (in_array($page, $protectedPages) && !$isLoggedIn) {
    header('Location: index.php?page=login');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>eBayan - Government Portal</title>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&family=Work+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/styles.php">
</head>
<body>

<?php if ($page === 'login'): ?>
    <?php include 'pages/login.php'; ?>
<?php elseif ($page === 'signup'): ?>
    <?php include 'pages/signup.php'; ?>
<?php else: ?>
    <?php 
    // User initial for avatar
    $userInitial = strtoupper(substr($currentUser['first_name'], 0, 1));
    
    include 'includes/navbar.php';
    
    // Show verification popup if just logged in and not verified
    if (isset($_GET['show_verify']) && !$currentUser['is_verified']): ?>
        <div id="verifyPopup" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeVerifyPopup()">&times;</span>
                <div style="text-align: center; padding: 2rem;">
                    <div style="font-size: 3rem; color: #FDB913;">⚠️</div>
                    <h2 style="color: #0A3A6E; margin: 1rem 0;">Account Not Verified</h2>
                    <p style="color: #5A6C7D; margin-bottom: 2rem;">Your account is not fully verified. Please complete your profile verification to access all features.</p>
                    <div style="display: flex; gap: 1rem; justify-content: center;">
                        <a href="?page=profile" class="btn btn-primary" style="width: auto; padding: 0.875rem 2rem; margin: 0;">Go to Profile</a>
                        <button onclick="closeVerifyPopup()" class="btn" style="background: #E1E8ED; color: #1A2332; width: auto; padding: 0.875rem 2rem; margin: 0;">Later</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif;
    
    // Show admin request confirmation
    if (isset($_GET['admin_request'])): ?>
        <div id="adminRequestPopup" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeAdminPopup()">&times;</span>
                <div style="text-align: center; padding: 2rem;">
                    <div style="font-size: 3rem; color: #28A745;">✓</div>
                    <h2 style="color: #0A3A6E; margin: 1rem 0;">Subscription Request Submitted</h2>
                    <p style="color: #5A6C7D; margin-bottom: 2rem;">Your admin subscription request has been submitted successfully. We will review your application and contact you soon.</p>
                    <button onclick="closeAdminPopup()" class="btn btn-primary">OK</button>
                </div>
            </div>
        </div>
    <?php endif;
    
    switch($page) {
        case 'home':
            include 'pages/home.php';
            break;
        case 'announcements':
            include 'pages/announcements.php';
            break;
        case 'services':
            include 'pages/services.php';
            break;
        case 'complaints':
            include 'pages/complaints.php';
            break;
        case 'cebu-city':
            include 'pages/cebu-city.php';
            break;
        case 'cebu-announcements':
            include 'pages/cebu-announcements.php';
            break;
        case 'cebu-services':
            include 'pages/cebu-services.php';
            break;
        case 'cebu-complaints':
            include 'pages/cebu-complaints.php';
            break;
        case 'pardo':
            include 'pages/pardo.php';
            break;
        case 'pardo-announcements':
            include 'pages/pardo-announcements.php';
            break;
        case 'pardo-services':
            include 'pages/pardo-services.php';
            break;
        case 'pardo-complaints':
            include 'pages/pardo-complaints.php';
            break;
        case 'pardo-officials':
            include 'pages/pardo-officials.php';
            break;
        case 'profile':
            include 'pages/profile.php';
            break;
        case 'settings':
            include 'pages/settings.php';
            break;
        case 'faq':
            include 'pages/faq.php';
            break;
        case 'about':
            include 'pages/about.php';
            break;
        case 'admin-subscribe':
            include 'pages/admin-subscribe.php';
            break;
        default:
            include 'pages/home.php';
    }
    
    include 'includes/footer.php';
    ?>
<?php endif; ?>

<script>
function closeVerifyPopup() {
    document.getElementById('verifyPopup').style.display = 'none';
}

function closeAdminPopup() {
    document.getElementById('adminRequestPopup').style.display = 'none';
}

// Show popup on load
window.onload = function() {
    const verifyPopup = document.getElementById('verifyPopup');
    const adminPopup = document.getElementById('adminRequestPopup');
    if (verifyPopup) {
        verifyPopup.style.display = 'flex';
    }
    if (adminPopup) {
        adminPopup.style.display = 'flex';
    }
}

// Close popup when clicking outside
window.onclick = function(event) {
    const verifyPopup = document.getElementById('verifyPopup');
    const adminPopup = document.getElementById('adminRequestPopup');
    if (event.target == verifyPopup) {
        verifyPopup.style.display = 'none';
    }
    if (event.target == adminPopup) {
        adminPopup.style.display = 'none';
    }
}
</script>

</body>
</html>