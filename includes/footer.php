<?php
// Determine footer text based on current page
$mainPages = ['home', 'announcements', 'services', 'complaints'];
$cebuPages = ['cebu-city', 'cebu-announcements', 'cebu-services', 'cebu-complaints'];
$pardoPages = ['pardo', 'pardo-announcements', 'pardo-services', 'pardo-complaints', 'pardo-officials'];

if (in_array($page, $cebuPages)) {
    $footerText = 'Cebu City Government';
} elseif (in_array($page, $pardoPages)) {
    $footerText = 'Barangay Pardo, Cebu City';
} else {
    $footerText = 'Republic of the Philippines - Government Portal';
}
?>

<footer class="footer">
    <div class="footer-content">
        <p>&copy; 2026 <?php echo $footerText; ?> - All Rights Reserved</p>
    </div>
</footer>