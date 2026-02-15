<?php
// Determine which navigation to show based on the current page
$mainPages = ['home', 'announcements', 'services', 'profile', 'settings', 'faq', 'about', 'admin-subscribe'];
$cebuPages = ['cebu-city', 'cebu-announcements', 'cebu-services', 'cebu-complaints'];
$pardoPages = ['pardo', 'pardo-announcements', 'pardo-services', 'pardo-complaints', 'pardo-officials', 'hire-talent', 'apply-talent', 'barangay-clearance', 'emergency-services'];


if (in_array($page, $mainPages)) {
    $navType = 'main';
} elseif (in_array($page, $cebuPages)) {
    $navType = 'cebu';
} elseif (in_array($page, $pardoPages)) {
    $navType = 'pardo';
} else {
    $navType = 'main';
}
?>

<nav class="navbar">
    <div class="nav-container">
        <div class="nav-brand">
            <div class="seal">
                <?php if ($navType === 'main'): ?>
                    <img src="/eBayanPH/pictures/final_logo.png" alt="eBayan Logo" class="nav-seal-image" width="100" height="50">
                <?php else: ?>
                    <?php echo $navType === 'cebu' ? '<img src="/eBayanPH/pictures/final_logo.png" alt="eBayan Logo" class="nav-seal-image" width="132" height="84">' : '<img src="/eBayanPH/pictures/final_logo.png" alt="eBayan Logo" class="nav-seal-image" width="132" height="84">'; ?>
                <?php endif; ?>
            </div>
            <h2><?php 
                echo $navType === 'main' ? 'eBayan' : ($navType === 'cebu' ? 'Cebu City' : 'Barangay Pardo'); 
            ?></h2>
        </div>
        
        <div class="nav-menu">
            <?php if ($navType === 'main'): ?>
                <div class="nav-item">
                    <a href="?page=home" class="nav-link <?php echo $page === 'home' ? 'active' : ''; ?>">Home</a>
                </div>
                <div class="nav-item">
                    <a href="?page=announcements" class="nav-link <?php echo $page === 'announcements' ? 'active' : ''; ?>">Announcements</a>
                </div>
                <div class="nav-item">
                    <a href="?page=services" class="nav-link <?php echo $page === 'services' ? 'active' : ''; ?>">Services</a>
                </div>
                <div class="nav-item nav-area">
                    <a class="nav-link">Area ▼</a>
                    <div class="dropdown-menu">
                        <div class="dropdown-item dropdown-nested">
                            <span>Cebu City ›</span>
                            <div class="dropdown-submenu">
                                <a href="?page=cebu-city" class="dropdown-item">Cebu City Home</a>
                                <div class="dropdown-item dropdown-nested">
                                    <span>Pardo ›</span>
                                    <div class="dropdown-submenu">
                                        <a href="?page=pardo" class="dropdown-item">Barangay Pardo</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif ($navType === 'cebu'): ?>
                <div class="nav-item">
                    <a href="?page=cebu-city" class="nav-link <?php echo $page === 'cebu-city' ? 'active' : ''; ?>">Home</a>
                </div>
                <div class="nav-item">
                    <a class="nav-link">Barangay ▼</a>
                    <div class="dropdown-menu">
                        <a href="?page=pardo" class="dropdown-item">Pardo</a>
                    </div>
                </div>
                <div class="nav-item">
                    <a href="?page=cebu-announcements" class="nav-link <?php echo $page === 'cebu-announcements' ? 'active' : ''; ?>">Announcements</a>
                </div>
                <div class="nav-item">
                    <a href="?page=cebu-services" class="nav-link <?php echo $page === 'cebu-services' ? 'active' : ''; ?>">Services</a>
                </div>
                <div class="nav-item">
                    <a href="?page=cebu-complaints" class="nav-link <?php echo $page === 'cebu-complaints' ? 'active' : ''; ?>">Complaints</a>
                </div>
            <?php else: ?>
                <div class="nav-item">
                    <a href="?page=pardo" class="nav-link <?php echo $page === 'pardo' ? 'active' : ''; ?>">Home</a>
                </div>
                <div class="nav-item">
                    <a href="?page=pardo-announcements" class="nav-link <?php echo $page === 'pardo-announcements' ? 'active' : ''; ?>">Announcements</a>
                </div>
                <div class="nav-item">
                    <a href="?page=pardo-services" class="nav-link <?php echo $page === 'pardo-services' ? 'active' : ''; ?>">Services</a>
                </div>
                <div class="nav-item">
                    <a href="?page=pardo-complaints" class="nav-link <?php echo $page === 'pardo-complaints' ? 'active' : ''; ?>">Complaints</a>
                </div>
                <div class="nav-item">
                    <a href="?page=pardo-officials" class="nav-link <?php echo $page === 'pardo-officials' ? 'active' : ''; ?>">Barangay Officials</a>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="nav-user">
            <?php if ($navType === 'cebu'): ?>
                <a href="?page=home" class="btn-logout btn-back">← Back to Main</a>
            <?php elseif ($navType === 'pardo'): ?>
                <a href="?page=cebu-city" class="btn-logout btn-back">← Back to City</a>
            <?php endif; ?>
            
            <div class="user-avatar">
                <?php echo $userInitial; ?>
                <div class="user-dropdown">
                    <a href="?page=profile" class="user-dropdown-item">
                        <span>👤</span>
                        <span>User Profile</span>
                    </a>
                    <a href="?page=faq" class="user-dropdown-item">
                        <span>❓</span>
                        <span>FAQ's</span>
                    </a>
                    <a href="?page=about" class="user-dropdown-item">
                        <span>ℹ️</span>
                        <span>About eBayan</span>
                    </a>
                    <a href="?page=settings" class="user-dropdown-item">
                        <span>⚙️</span>
                        <span>Settings</span>
                    </a>
                    <a href="?action=logout" class="user-dropdown-item logout">
                        <span>🚪</span>
                        <span>Logout</span>





                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

<style>
/* Nested dropdown styles */
.dropdown-nested {
    position: relative;
    cursor: pointer;
}

.dropdown-nested > span {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.dropdown-submenu {
    position: absolute;
    left: 100%;
    top: 0;
    background: var(--white);
    box-shadow: 0 8px 24px var(--shadow);
    border-radius: 8px;
    min-width: 200px;
    opacity: 0;
    visibility: hidden;
    transform: translateX(-10px);
    transition: all 0.3s ease;
}

.dropdown-nested:hover > .dropdown-submenu {
    opacity: 1;
    visibility: visible;
    transform: translateX(0);
}

.nav-area .dropdown-menu {
    min-width: 220px;
}

/* Navbar-specific seal overrides: remove yellow circle and enlarge logo */
.nav-brand .seal {
    background: transparent; /* remove accent/yellow */
    width: 88px; /* larger */
    height: 56px; /* wider rectangle to better show logo */
    border-radius: 8px; /* subtle rounding instead of circle */
    box-shadow: none;
    padding: 0;
    overflow: hidden;
    display: flex;
    align-items: center;
    justify-content: center;
}

.nav-brand .seal img {
    width: 100px;
    height: 100px;
    object-fit: contain; /* ensure full logo is visible */
    display: block;
    border-radius: 6px;
}
</style>