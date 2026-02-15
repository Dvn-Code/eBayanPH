<div class="breadcrumb">
    <a href="?page=home">Home</a>
    <span>›</span>
    <span>User Profile</span>
</div>

<div class="main-content">
    <?php if (isset($_GET['updated'])): ?>
        <div class="alert alert-success">
            <span>✓</span>
            <span>Profile updated successfully!</span>
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['verified'])): ?>
        <div class="alert alert-success">
            <span>✓</span>
            <span>Your account has been verified successfully!</span>
        </div>
    <?php endif; ?>

    <div class="profile-card">

        <div class="profile-header">
                    <!-- Apply as a Talent Section -->
<div class="apply-talent-section">
    <div class="apply-talent-content">
        <div class="apply-talent-icon">💼</div>
        <div class="apply-talent-text">
            <h3>Join Our Talent Platform</h3>
            <p>Share your skills and connect with residents looking for professional services.</p>
        </div>
        <a href="index.php?page=apply-talent" class="btn-apply-talent">
            Apply as a Talent
        </a>
    </div>
</div>
            <div class="profile-avatar">
                <?php echo strtoupper(substr($currentUser['first_name'], 0, 1)); ?>
            </div>
            <div class="profile-info">
                <h2><?php echo $currentUser['first_name'] . ' ' . $currentUser['middle_name'] . ' ' . $currentUser['last_name']; ?></h2>
                <p><?php echo $currentUser['email']; ?></p>
                <?php if ($currentUser['is_verified']): ?>
                    <div class="verified-badge">
                        <span>✓</span>
                        <span>Verified Account</span>
                    </div>
                <?php else: ?>
                    <div class="not-verified-badge">
                        <span>⚠</span>
                        <span>Not Verified</span>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php if (!$currentUser['is_verified']): ?>
            <div class="alert alert-warning" style="margin-bottom: 2rem;">
                <span>⚠️</span>
                <div>
                    <strong>Account Verification Required</strong>
                    <p style="margin: 0.5rem 0 0 0;">To access all features, please verify your account by confirming your email address.</p>
                    <a href="?action=verify" class="btn btn-primary" style="margin-top: 1rem; width: auto; padding: 0.75rem 1.5rem;">Verify Now</a>
                </div>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <h3 style="color: var(--primary); margin-bottom: 1.5rem;">Personal Information</h3>
            
            <!-- Name Fields -->
            <div class="form-row-3">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" name="first_name" required value="<?php echo htmlspecialchars($currentUser['first_name']); ?>">
                </div>
                <div class="form-group">
                    <label for="middle_name">Middle Name</label>
                    <input type="text" id="middle_name" name="middle_name" value="<?php echo htmlspecialchars($currentUser['middle_name']); ?>">
                </div>
                <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" name="last_name" required value="<?php echo htmlspecialchars($currentUser['last_name']); ?>">
                </div>
            </div>

            <!-- Birthday and Gender -->
            <div class="form-row">
                <div class="form-group">
                    <label for="birthday">Birthday</label>
                    <input type="date" id="birthday" name="birthday" required value="<?php echo htmlspecialchars($currentUser['birthday']); ?>">
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <select id="gender" name="gender" required>
                        <option value="Male" <?php echo $currentUser['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo $currentUser['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                        <option value="Other" <?php echo $currentUser['gender'] === 'Other' ? 'selected' : ''; ?>>Other</option>
                    </select>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="form-row">
                <div class="form-group">
                    <label for="contact">Contact Number</label>
                    <input type="tel" id="contact" name="contact" required value="<?php echo htmlspecialchars($currentUser['contact']); ?>" pattern="[0-9]{11}">
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($currentUser['email']); ?>" disabled style="background: #F8FAFB; color: #5A6C7D;">
                    <small style="color: var(--text-gray); font-size: 0.875rem;">Email cannot be changed</small>
                </div>
            </div>

            <h3 style="color: var(--primary); margin: 2rem 0 1.5rem 0;">Address Information</h3>
            
            <div class="form-row">
                <div class="form-group">
                    <label for="house_num">House Number</label>
                    <input type="text" id="house_num" name="house_num" required value="<?php echo htmlspecialchars($currentUser['house_num']); ?>">
                </div>
                <div class="form-group">
                    <label for="street">Street</label>
                    <input type="text" id="street" name="street" required value="<?php echo htmlspecialchars($currentUser['street']); ?>">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="barangay">Barangay</label>
                    <select id="barangay" name="barangay" required>
                        <option value="Pardo" <?php echo $currentUser['barangay'] === 'Pardo' ? 'selected' : ''; ?>>Pardo</option>
                        <option value="Lahug" <?php echo $currentUser['barangay'] === 'Lahug' ? 'selected' : ''; ?>>Lahug</option>
                        <option value="Tisa" <?php echo $currentUser['barangay'] === 'Tisa' ? 'selected' : ''; ?>>Tisa</option>
                        <option value="Mabolo" <?php echo $currentUser['barangay'] === 'Mabolo' ? 'selected' : ''; ?>>Mabolo</option>
                        <option value="Guadalupe" <?php echo $currentUser['barangay'] === 'Guadalupe' ? 'selected' : ''; ?>>Guadalupe</option>
                        <option value="Apas" <?php echo $currentUser['barangay'] === 'Apas' ? 'selected' : ''; ?>>Apas</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="city">City</label>
                    <select id="city" name="city" required>
                        <option value="Cebu City" <?php echo $currentUser['city'] === 'Cebu City' ? 'selected' : ''; ?>>Cebu City</option>
                        <option value="Mandaue City" <?php echo $currentUser['city'] === 'Mandaue City' ? 'selected' : ''; ?>>Mandaue City</option>
                        <option value="Lapu-Lapu City" <?php echo $currentUser['city'] === 'Lapu-Lapu City' ? 'selected' : ''; ?>>Lapu-Lapu City</option>
                        <option value="Talisay City" <?php echo $currentUser['city'] === 'Talisay City' ? 'selected' : ''; ?>>Talisay City</option>
                    </select>
                </div>
            </div>

            <button type="submit" name="update_profile" class="btn btn-primary" style="width: auto; padding: 0.875rem 2rem; margin-top: 1rem;">Save Changes</button>
        </form>
    </div>
</div>

<script>
// Contact number validation
document.getElementById('contact').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
    if (this.value.length > 11) {
        this.value = this.value.slice(0, 11);
    }
});
</script>