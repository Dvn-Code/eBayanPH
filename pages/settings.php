<div class="breadcrumb">
    <a href="?page=home">Home</a>
    <span>›</span>
    <span>Settings</span>
</div>

<div class="main-content">
    <?php if (isset($_GET['password_changed'])): ?>
        <div class="alert alert-success">
            <span>✓</span>
            <span>Password changed successfully!</span>
        </div>
    <?php endif; ?>

    <div class="section">
        <h2 class="section-title">Account Settings</h2>
        
        <div class="profile-card">
            <h3 style="color: var(--primary); margin-bottom: 1.5rem;">Change Password</h3>
            <p style="color: var(--text-gray); margin-bottom: 2rem;">Update your password to keep your account secure. Make sure to use a strong password with at least 8 characters.</p>
            
            <form method="POST" action="" onsubmit="return validatePassword()">
                <div class="form-group">
                    <label for="current_password">Current Password *</label>
                    <input type="password" id="current_password" name="current_password" required placeholder="Enter your current password" minlength="8">
                </div>

                <div class="form-group">
                    <label for="new_password">New Password *</label>
                    <input type="password" id="new_password" name="new_password" required placeholder="Enter your new password" minlength="8">
                    <small style="color: var(--text-gray); font-size: 0.875rem;">Must be at least 8 characters long</small>
                </div>

                <div class="form-group">
                    <label for="confirm_new_password">Confirm New Password *</label>
                    <input type="password" id="confirm_new_password" name="confirm_new_password" required placeholder="Re-enter your new password" minlength="8">
                </div>

                <button type="submit" name="change_password" class="btn btn-primary" style="width: auto; padding: 0.875rem 2rem;">Change Password</button>
            </form>
        </div>

        <div class="profile-card" style="margin-top: 2rem;">
            <h3 style="color: var(--primary); margin-bottom: 1.5rem;">Terms and Conditions</h3>
            <p style="color: var(--text-gray); margin-bottom: 1.5rem;">Review our terms and conditions for using eBayan services.</p>
            
            <div class="section-content" style="padding: 2rem; max-height: 400px; overflow-y: auto;">
                <h4 style="color: var(--primary); margin-bottom: 1rem;">1. Acceptance of Terms</h4>
                <p style="margin-bottom: 1.5rem;">By accessing and using eBayan, you accept and agree to be bound by the terms and provision of this agreement. If you do not agree to these terms, you should not use eBayan services.</p>

                <h4 style="color: var(--primary); margin-bottom: 1rem;">2. Use of Services</h4>
                <p style="margin-bottom: 1.5rem;">eBayan provides online access to government services and information. You agree to use these services only for lawful purposes and in accordance with these Terms and Conditions.</p>

                <h4 style="color: var(--primary); margin-bottom: 1rem;">3. User Account</h4>
                <p style="margin-bottom: 1.5rem;">You are responsible for maintaining the confidentiality of your account information, including your password. You agree to accept responsibility for all activities that occur under your account.</p>

                <h4 style="color: var(--primary); margin-bottom: 1rem;">4. Privacy and Data Protection</h4>
                <p style="margin-bottom: 1.5rem;">We are committed to protecting your privacy and personal information in accordance with the Data Privacy Act of 2012. Your personal data will be used solely for providing government services and will not be shared with third parties without your consent, except as required by law.</p>

                <h4 style="color: var(--primary); margin-bottom: 1rem;">5. Accuracy of Information</h4>
                <p style="margin-bottom: 1.5rem;">You agree to provide accurate, current, and complete information during registration and in all submissions. False information may result in denial of services or legal action.</p>

                <h4 style="color: var(--primary); margin-bottom: 1rem;">6. Prohibited Activities</h4>
                <p style="margin-bottom: 1.5rem;">You may not use eBayan to:</p>
                <ul style="margin-left: 2rem; margin-bottom: 1.5rem; color: var(--text-gray);">
                    <li>Violate any laws or regulations</li>
                    <li>Infringe on the rights of others</li>
                    <li>Transmit harmful or malicious code</li>
                    <li>Attempt to gain unauthorized access to the system</li>
                    <li>Submit false complaints or information</li>
                </ul>

                <h4 style="color: var(--primary); margin-bottom: 1rem;">7. Service Availability</h4>
                <p style="margin-bottom: 1.5rem;">While we strive to provide uninterrupted service, we do not guarantee that eBayan will be available at all times. We may suspend or restrict access for maintenance, updates, or emergency situations.</p>

                <h4 style="color: var(--primary); margin-bottom: 1rem;">8. Intellectual Property</h4>
                <p style="margin-bottom: 1.5rem;">All content on eBayan, including text, graphics, logos, and software, is the property of the Government of the Philippines and is protected by copyright and other intellectual property laws.</p>

                <h4 style="color: var(--primary); margin-bottom: 1rem;">9. Limitation of Liability</h4>
                <p style="margin-bottom: 1.5rem;">eBayan and the Government of the Philippines shall not be liable for any indirect, incidental, special, consequential, or punitive damages resulting from your use of or inability to use the service.</p>

                <h4 style="color: var(--primary); margin-bottom: 1rem;">10. Changes to Terms</h4>
                <p style="margin-bottom: 1.5rem;">We reserve the right to modify these terms at any time. Continued use of eBayan after changes indicates your acceptance of the new terms.</p>

                <h4 style="color: var(--primary); margin-bottom: 1rem;">11. Governing Law</h4>
                <p style="margin-bottom: 1.5rem;">These Terms and Conditions are governed by the laws of the Republic of the Philippines. Any disputes shall be resolved in the appropriate courts of the Philippines.</p>

                <h4 style="color: var(--primary); margin-bottom: 1rem;">12. Contact Information</h4>
                <p style="margin-bottom: 1.5rem;">For questions about these Terms and Conditions, please contact us at support@ebayan.gov.ph or through our complaints system.</p>

                <p style="font-weight: 600; color: var(--primary);">Last Updated: February 14, 2026</p>
            </div>
        </div>
    </div>
</div>

<script>
function validatePassword() {
    const newPassword = document.getElementById('new_password').value;
    const confirmPassword = document.getElementById('confirm_new_password').value;
    
    if (newPassword !== confirmPassword) {
        alert('New passwords do not match!');
        return false;
    }
    
    if (newPassword.length < 8) {
        alert('Password must be at least 8 characters long!');
        return false;
    }
    
    return true;
}
</script>