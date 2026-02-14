<?php
header("Content-type: text/css; charset: UTF-8");
?>

:root {
    --primary: #0A3A6E;
    --primary-light: #1E5A9E;
    --secondary: #C8102E;
    --accent: #FDB913;
    --bg-light: #F8FAFB;
    --text-dark: #1A2332;
    --text-gray: #5A6C7D;
    --white: #FFFFFF;
    --shadow: rgba(10, 58, 110, 0.1);
    --shadow-lg: rgba(10, 58, 110, 0.2);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Work Sans', sans-serif;
    color: var(--text-dark);
    background: var(--bg-light);
    overflow-x: hidden;
    animation: fadeIn 0.6s ease-out;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Modal Styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
    align-items: center;
    justify-content: center;
}

.modal-content {
    background-color: var(--white);
    margin: auto;
    padding: 0;
    border-radius: 16px;
    width: 90%;
    max-width: 500px;
    box-shadow: 0 20px 60px var(--shadow-lg);
    animation: slideDown 0.3s ease-out;
}

@keyframes slideDown {
    from { opacity: 0; transform: translateY(-50px); }
    to { opacity: 1; transform: translateY(0); }
}

.close {
    color: var(--text-gray);
    float: right;
    font-size: 28px;
    font-weight: bold;
    padding: 1rem;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: var(--text-dark);
}

/* Login Page Styles */
.login-container {
    min-height: 100vh;
    display: flex;
    background: url('/ebayan-v2/pictures/background_login.png') center/cover no-repeat fixed;
    background-size: cover;
    position: relative;
    overflow: hidden;
}

.login-container::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 80%;
    height: 150%;
    background: radial-gradient(circle, rgba(253, 185, 19, 0.1) 0%, transparent 70%);
    animation: pulse 15s ease-in-out infinite;
}

@keyframes pulse {
    0%, 100% { transform: scale(1); opacity: 0.3; }
    50% { transform: scale(1.1); opacity: 0.5; }
}

.login-left {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: center;
    padding: 4rem;
    position: relative;
    z-index: 1;
}

.login-logo {
    display: flex;
    align-items: center;
    gap: 1rem;
    margin-bottom: 3rem;
    animation: slideInLeft 0.8s ease-out;
}

@keyframes slideInLeft {
    from { opacity: 0; transform: translateX(-30px); }
    to { opacity: 1; transform: translateX(0); }
}

.seal {
    width: 60px;
    height: 60px;
    background: var(--accent);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    color: var(--primary);
    box-shadow: 0 4px 12px rgba(253, 185, 19, 0.4);
}

.login-logo h1 {
    font-family: 'Libre Baskerville', serif;
    color: var(--white);
    font-size: 1.5rem;
    letter-spacing: -0.5px;
}

.login-welcome {
    font-family: Arial;
    color: var(--white);
    animation: slideInLeft 0.8s ease-out 0.2s both;
}

.login-welcome h2 {
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.login-welcome p {
    font-size: 1.125rem;
    opacity: 0.9;
    max-width: 500px;
}

.login-right {
    flex: 1;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 2rem;
    position: relative;
    z-index: 1;
    overflow-y: auto;
    max-height: 100vh;
}

.login-box {
    background: var(--white);
    padding: 3rem;
    border-radius: 16px;
    box-shadow: 0 20px 60px var(--shadow-lg);
    width: 100%;
    max-width: 500px;
    animation: slideInRight 0.8s ease-out 0.3s both;
    margin: 2rem 0;
}

@keyframes slideInRight {
    from { opacity: 0; transform: translateX(30px); }
    to { opacity: 1; transform: translateX(0); }
}

.login-box h3 {
    font-size: 1.75rem;
    margin-bottom: 0.5rem;
    color: var(--text-dark);
}

.login-box p {
    color: var(--text-gray);
    margin-bottom: 2rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.form-group label {
    display: block;
    margin-bottom: 0.5rem;
    font-weight: 500;
    color: var(--text-dark);
}

.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 0.875rem 1rem;
    border: 2px solid #E1E8ED;
    border-radius: 8px;
    font-size: 1rem;
    transition: all 0.3s ease;
    font-family: 'Work Sans', sans-serif;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    outline: none;
    border-color: var(--primary);
    box-shadow: 0 0 0 4px rgba(10, 58, 110, 0.1);
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1rem;
}

.form-row-3 {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    gap: 1rem;
}

.btn {
    width: 100%;
    padding: 1rem;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: 'Work Sans', sans-serif;
    text-decoration: none;
    display: inline-block;
    text-align: center;
}

.btn-primary {
    background: var(--primary);
    color: var(--white);
}

.btn-primary:hover {
    background: var(--primary-light);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px var(--shadow);
}

.btn-google {
    background: var(--white);
    color: var(--text-dark);
    border: 2px solid #E1E8ED;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    margin-bottom: 1.5rem;
    text-decoration: none;
}

.btn-google:hover {
    border-color: var(--primary);
    background: var(--bg-light);
}

.divider {
    text-align: center;
    margin: 1.5rem 0;
    position: relative;
    color: var(--text-gray);
}

.divider::before,
.divider::after {
    content: '';
    position: absolute;
    top: 50%;
    width: 45%;
    height: 1px;
    background: #E1E8ED;
}

.divider::before { left: 0; }
.divider::after { right: 0; }

.signup-link {
    text-align: center;
    margin-top: 1.5rem;
    color: var(--text-gray);
}

.signup-link a {
    color: var(--primary);
    text-decoration: none;
    font-weight: 600;
}

.signup-link a:hover {
    text-decoration: underline;
}

/* Navigation Bar */
.navbar {
    background: var(--white);
    box-shadow: 0 2px 12px var(--shadow);
    position: sticky;
    top: 0;
    z-index: 100;
}

.nav-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem;
    display: flex;
    justify-content: space-between;
    align-items: center;
    height: 80px;
}

.nav-brand {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.nav-brand .seal {
    width: 45px;
    height: 45px;
    font-size: 0.875rem;
}

.nav-brand h2 {
    font-family: 'Libre Baskerville', serif;
    color: var(--primary);
    font-size: 1.25rem;
}

.nav-menu {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

.nav-item {
    position: relative;
}

.nav-link {
    padding: 0.75rem 1.25rem;
    color: var(--text-dark);
    text-decoration: none;
    font-weight: 500;
    border-radius: 8px;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
}

.nav-link:hover {
    background: var(--bg-light);
    color: var(--primary);
}

.nav-link.active {
    background: var(--primary);
    color: var(--white);
}

.dropdown-menu {
    position: absolute;
    top: 100%;
    left: 0;
    background: var(--white);
    box-shadow: 0 8px 24px var(--shadow);
    border-radius: 8px;
    min-width: 200px;
    margin-top: 0.5rem;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
}

.nav-item:hover .dropdown-menu {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-item {
    padding: 0.875rem 1.25rem;
    color: var(--text-dark);
    text-decoration: none;
    display: block;
    transition: all 0.3s ease;
}

.dropdown-item:hover {
    background: var(--bg-light);
    color: var(--primary);
}

/* Nested Dropdown Styles */
.dropdown-nested {
    position: relative;
    cursor: pointer;
}

.dropdown-nested > span {
    display: flex;
    justify-content: space-between;
    align-items: center;
    width: 100%;
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
    z-index: 1000;
}

.dropdown-nested:hover > .dropdown-submenu {
    opacity: 1;
    visibility: visible;
    transform: translateX(0);
}

.nav-area .dropdown-menu {
    min-width: 220px;
}

.nav-user {
    display: flex;
    align-items: center;
    gap: 1rem;
    position: relative;
}

.user-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-weight: 600;
    cursor: pointer;
    position: relative;
}

.user-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    background: var(--white);
    box-shadow: 0 8px 24px var(--shadow);
    border-radius: 8px;
    min-width: 220px;
    margin-top: 0.5rem;
    opacity: 0;
    visibility: hidden;
    transform: translateY(-10px);
    transition: all 0.3s ease;
}

.user-avatar:hover .user-dropdown,
.user-dropdown:hover {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.user-dropdown-item {
    padding: 0.875rem 1.25rem;
    color: var(--text-dark);
    text-decoration: none;
    display: flex;
    align-items: center;
    gap: 0.75rem;
    transition: all 0.3s ease;
    border-bottom: 1px solid #E1E8ED;
}

.user-dropdown-item:last-child {
    border-bottom: none;
}

.user-dropdown-item:hover {
    background: var(--bg-light);
    color: var(--primary);
}

.user-dropdown-item.logout {
    color: var(--secondary);
}

.btn-logout {
    padding: 0.625rem 1.25rem;
    background: var(--secondary);
    color: var(--white);
    border: none;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
}

.btn-logout:hover {
    background: #A00D24;
    transform: translateY(-2px);
}

.btn-back {
    background: var(--accent);
    color: var(--primary);
}

.btn-back:hover {
    background: #E5A610;
}

/* Verification Badge */
.verified-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: #28A745;
    color: white;
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 600;
}

.not-verified-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    background: #FDB913;
    color: var(--primary);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-size: 0.875rem;
    font-weight: 600;
}

/* Breadcrumb */
.breadcrumb {
    max-width: 1400px;
    margin: 0 auto;
    padding: 1.5rem 2rem;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--text-gray);
}

.breadcrumb a {
    color: var(--primary);
    text-decoration: none;
    transition: color 0.3s ease;
}

.breadcrumb a:hover {
    text-decoration: underline;
}

/* Main Content */
.main-content {
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 2rem 4rem;
}

/* Hero Section */
.hero {
    background: linear-gradient(135deg, rgba(10, 58, 110, 0.95), rgba(30, 90, 158, 0.9)),
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 600"><rect fill="%230A3A6E" width="1200" height="600"/><path fill="%231E5A9E" opacity="0.3" d="M0,300 Q300,200 600,300 T1200,300 L1200,600 L0,600 Z"/></svg>');
    background-size: cover;
    background-position: center;
    border-radius: 16px;
    padding: 4rem 3rem;
    margin-bottom: 3rem;
    color: var(--white);
    box-shadow: 0 12px 40px var(--shadow);
}

.hero-content h1 {
    font-family: 'Libre Baskerville', serif;
    font-size: 3.5rem;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.hero-content p {
    font-size: 1.25rem;
    opacity: 0.95;
    max-width: 700px;
    line-height: 1.6;
}

/* Content Grid */
.content-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.card {
    background: var(--white);
    padding: 2rem;
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow);
    transition: all 0.3s ease;
}

.card:hover {
    transform: translateY(-4px);
    box-shadow: 0 12px 30px var(--shadow);
}

.card-icon {
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 1.5rem;
    margin-bottom: 1.5rem;
}

.card h3 {
    font-size: 1.5rem;
    margin-bottom: 0.75rem;
    color: var(--text-dark);
}

.card p {
    color: var(--text-gray);
    line-height: 1.6;
}

/* City Image */
.city-image {
    width: 100%;
    height: 500px;
    background: linear-gradient(135deg, rgba(10, 58, 110, 0.3), rgba(30, 90, 158, 0.3)),
                url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 500"><rect fill="%23E1E8ED" width="1200" height="500"/><rect fill="%230A3A6E" opacity="0.1" x="100" y="150" width="120" height="350"/><rect fill="%230A3A6E" opacity="0.15" x="250" y="100" width="150" height="400"/><rect fill="%230A3A6E" opacity="0.12" x="430" y="180" width="100" height="320"/><rect fill="%230A3A6E" opacity="0.18" x="560" y="80" width="180" height="420"/><rect fill="%230A3A6E" opacity="0.1" x="770" y="200" width="130" height="300"/><rect fill="%230A3A6E" opacity="0.14" x="930" y="120" width="160" height="380"/><circle fill="%23FDB913" opacity="0.4" cx="100" cy="100" r="80"/></svg>');
    background-size: cover;
    background-position: center;
    border-radius: 16px;
    margin-bottom: 3rem;
    box-shadow: 0 8px 24px var(--shadow);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--primary);
    font-size: 2rem;
    font-weight: 700;
    text-shadow: 2px 2px 8px rgba(255,255,255,0.5);
}

/* Section */
.section {
    margin-bottom: 3rem;
}

.section-title {
    font-family: "Arial";
    font-weight: bold;
    font-size: 2.5rem;
    color: var(--text-dark);
    margin-bottom: 1.5rem;
}

.section-content {
    background: var(--white);
    padding: 2.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow);
    line-height: 1.8;
    color: var(--text-gray);
}

/* Profile Card */
.profile-card {
    background: var(--white);
    padding: 2.5rem;
    border-radius: 12px;
    box-shadow: 0 4px 12px var(--shadow);
    margin-bottom: 2rem;
}

.profile-header {
    display: flex;
    align-items: center;
    gap: 2rem;
    margin-bottom: 2rem;
    padding-bottom: 2rem;
    border-bottom: 2px solid #E1E8ED;
}

.profile-avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--white);
    font-size: 2.5rem;
    font-weight: 700;
}

.profile-info h2 {
    color: var(--text-dark);
    margin-bottom: 0.5rem;
}

.profile-info p {
    color: var(--text-gray);
    margin-bottom: 0.5rem;
}

/* FAQ Accordion */
.faq-item {
    background: var(--white);
    padding: 1.5rem;
    border-radius: 12px;
    margin-bottom: 1rem;
    box-shadow: 0 4px 12px var(--shadow);
    cursor: pointer;
    transition: all 0.3s ease;
}

.faq-item:hover {
    box-shadow: 0 8px 20px var(--shadow);
}

.faq-question {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-weight: 600;
    color: var(--text-dark);
    font-size: 1.125rem;
}

.faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease;
    color: var(--text-gray);
    padding-top: 0;
}

.faq-item.active .faq-answer {
    max-height: 500px;
    padding-top: 1rem;
}

.faq-icon {
    font-size: 1.5rem;
    color: var(--primary);
    transition: transform 0.3s ease;
}

.faq-item.active .faq-icon {
    transform: rotate(45deg);
}

/* Admin Subscription Card */
.subscription-card {
    background: linear-gradient(135deg, var(--primary), var(--primary-light));
    padding: 3rem;
    border-radius: 16px;
    color: var(--white);
    box-shadow: 0 12px 40px var(--shadow);
    margin-bottom: 3rem;
}

.subscription-card h2 {
    font-family: 'Libre Baskerville', serif;
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.subscription-card .perks {
    list-style: none;
    margin: 2rem 0;
}

.subscription-card .perks li {
    padding: 0.75rem 0;
    padding-left: 2rem;
    position: relative;
}

.subscription-card .perks li::before {
    content: '✓';
    position: absolute;
    left: 0;
    color: var(--accent);
    font-weight: bold;
    font-size: 1.25rem;
}

/* File Upload */
.file-upload {
    border: 2px dashed #E1E8ED;
    border-radius: 8px;
    padding: 2rem;
    text-align: center;
    transition: all 0.3s ease;
    cursor: pointer;
}

.file-upload:hover {
    border-color: var(--primary);
    background: var(--bg-light);
}

.file-upload input[type="file"] {
    display: none;
}

/* Alert Messages */
.alert {
    padding: 1rem 1.5rem;
    border-radius: 8px;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 1rem;
}

.alert-success {
    background: #D4EDDA;
    color: #155724;
    border: 1px solid #C3E6CB;
}

.alert-warning {
    background: #FFF3CD;
    color: #856404;
    border: 1px solid #FFEAA7;
}

.alert-info {
    background: #D1ECF1;
    color: #0C5460;
    border: 1px solid #BEE5EB;
}

/* Footer */
.footer {
    background: var(--primary);
    color: var(--white);
    padding: 3rem 2rem;
    margin-top: 4rem;
}

.footer-content {
    max-width: 1400px;
    margin: 0 auto;
    text-align: center;
}

.footer-content p {
    opacity: 0.9;
    margin-bottom: 0.5rem;
}

/* Officials Page Specific Styles */
.officials-header {
    background: var(--bg-light);
    padding: 2rem;
    border-radius: 12px;
    margin-bottom: 2rem;
}

.officials-header h4 {
    color: var(--primary);
    margin-bottom: 1rem;
    font-size: 1.25rem;
}

.officials-header p {
    font-size: 1.125rem;
    font-weight: 600;
    color: var(--text-dark);
}

.officials-header p.description {
    color: var(--text-gray);
    margin-top: 0.5rem;
    font-weight: 400;
}

/* Responsive */
@media (max-width: 968px) {
    .login-container {
        flex-direction: column;
    }

    .login-left, .login-right {
        flex: none;
        width: 100%;
    }

    .login-left {
        padding: 2rem;
    }

    .nav-menu {
        flex-wrap: wrap;
    }

    .hero-content h1 {
        font-size: 2.5rem;
    }

    .form-row,
    .form-row-3 {
        grid-template-columns: 1fr;
    }
}

@media (max-width: 768px) {
    .profile-header {
        flex-direction: column;
        text-align: center;
    }
}

    .logo-image {
        width: 500px;
        height: 500px;
        object-fit: contain;
    }
    .gov-image {
        width: 100px;
        height: 100px;
        object-fit: contain;
        margin-top: 2rem;
    }