<div class="login-container">
    <div class="login-left">
        <div class="login-logo">
            <img src="pictures/final_logo.png" alt="eBayan Logo" class="logo-image">
        </div>
        <div class="login-welcome">
            <h2>Create Your Account</h2>
            <p>Join eBayan and access government services for all Filipino citizens.</p>
        </div>
    </div>
    <div class="login-right">
        <div class="signup-box">
            <h3>Sign Up</h3>
            <p>Create your eBayan account</p>
            
            <a href="?action=google-signin" class="btn btn-google">
                <svg width="20" height="20" viewBox="0 0 20 20">
                    <path fill="#4285F4" d="M19.6 10.23c0-.82-.1-1.42-.25-2.05H10v3.72h5.5c-.15.96-.74 2.31-2.04 3.22v2.45h3.16c1.89-1.73 2.98-4.3 2.98-7.34z"/>
                    <path fill="#34A853" d="M13.46 15.13c-.83.59-1.96 1-3.46 1-2.64 0-4.88-1.74-5.68-4.15H1.07v2.52C2.72 17.75 6.09 20 10 20c2.7 0 4.96-.89 6.62-2.42l-3.16-2.45z"/>
                    <path fill="#FBBC05" d="M3.99 10c0-.69.12-1.35.32-1.97V5.51H1.07A9.973 9.973 0 000 10c0 1.61.39 3.14 1.07 4.49l3.24-2.52c-.2-.62-.32-1.28-.32-1.97z"/>
                    <path fill="#EA4335" d="M10 3.88c1.88 0 3.13.81 3.85 1.48l2.84-2.76C14.96.99 12.7 0 10 0 6.09 0 2.72 2.25 1.07 5.51l3.24 2.52C5.12 5.62 7.36 3.88 10 3.88z"/>
                </svg>
                Sign up with Google
            </a>
            
            <div class="divider">or</div>
            
            <form method="POST" action="index.php">
                <!-- Name Fields -->
                <div class="form-row-3">
                    <div class="form-group">
                        <label for="first_name">First Name *</label>
                        <input type="text" id="first_name" name="first_name" required placeholder="First name">
                    </div>
                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" id="middle_name" name="middle_name" placeholder="Middle name">
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name *</label>
                        <input type="text" id="last_name" name="last_name" required placeholder="Last name">
                    </div>
                </div>

                <!-- Birthday and Gender -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="birthday">Birthday *</label>
                        <input type="date" id="birthday" name="birthday" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender *</label>
                        <select id="gender" name="gender" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                </div>

                <!-- Contact and Email -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="contact">Contact Number *</label>
                        <input type="tel" id="contact" name="contact" required placeholder="09xxxxxxxxx" pattern="[0-9]{11}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address *</label>
                        <input type="email" id="email" name="email" required placeholder="your@email.com">
                    </div>
                </div>

                <!-- Address -->
                <h4 style="color: var(--primary); margin: 1.5rem 0 1rem 0; font-size: 1.125rem;">Address Information</h4>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="house_num">House Number *</label>
                        <input type="text" id="house_num" name="house_num" required placeholder="House No.">
                    </div>
                    <div class="form-group">
                        <label for="street">Street *</label>
                        <input type="text" id="street" name="street" required placeholder="Street Name">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="barangay">Barangay *</label>
                        <select id="barangay" name="barangay" required>
                            <option value="">Select Barangay</option>
                            <option value="Pardo">Pardo</option>
                            <option value="Lahug">Lahug</option>
                            <option value="Tisa">Tisa</option>
                            <option value="Mabolo">Mabolo</option>
                            <option value="Guadalupe">Guadalupe</option>
                            <option value="Apas">Apas</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="city">City *</label>
                        <select id="city" name="city" required>
                            <option value="">Select City</option>
                            <option value="Cebu City">Cebu City</option>
                            <option value="Mandaue City">Mandaue City</option>
                            <option value="Lapu-Lapu City">Lapu-Lapu City</option>
                            <option value="Talisay City">Talisay City</option>
                        </select>
                    </div>
                </div>

                <!-- Password -->
                <div class="form-group">
                    <label for="password">Password *</label>
                    <input type="password" id="password" name="password" required placeholder="Create a strong password" minlength="8">
                </div>

                <div class="form-group">
                    <label for="confirm_password">Confirm Password *</label>
                    <input type="password" id="confirm_password" name="confirm_password" required placeholder="Re-enter password" minlength="8">
                </div>

                <div class="form-group" style="display: flex; align-items: center; gap: 0.5rem;">
                    <input type="checkbox" id="terms" name="terms" required style="width: auto;">
                    <label for="terms" style="margin: 0; font-weight: 400;">
                        I agree to the <a href="?page=terms" style="color: var(--primary);">Terms and Conditions</a>
                    </label>
                </div>

                <button type="submit" name="signup" class="btn btn-primary">Create Account</button>
                
                  <div class="divider">or</div>

                <a href="?action=google-signin" class="btn btn-google">
                <svg width="20" height="20" viewBox="0 0 20 20">
                    <path fill="#4285F4" d="M19.6 10.23c0-.82-.1-1.42-.25-2.05H10v3.72h5.5c-.15.96-.74 2.31-2.04 3.22v2.45h3.16c1.89-1.73 2.98-4.3 2.98-7.34z"/>
                    <path fill="#34A853" d="M13.46 15.13c-.83.59-1.96 1-3.46 1-2.64 0-4.88-1.74-5.68-4.15H1.07v2.52C2.72 17.75 6.09 20 10 20c2.7 0 4.96-.89 6.62-2.42l-3.16-2.45z"/>
                    <path fill="#FBBC05" d="M3.99 10c0-.69.12-1.35.32-1.97V5.51H1.07A9.973 9.973 0 000 10c0 1.61.39 3.14 1.07 4.49l3.24-2.52c-.2-.62-.32-1.28-.32-1.97z"/>
                    <path fill="#EA4335" d="M10 3.88c1.88 0 3.13.81 3.85 1.48l2.84-2.76C14.96.99 12.7 0 10 0 6.09 0 2.72 2.25 1.07 5.51l3.24 2.52C5.12 5.62 7.36 3.88 10 3.88z"/>
                </svg>
                Sign up with Google
            </a>
            </form>
            
            <div class="signup-link">
                Already have an account? <a href="?page=login">Sign In</a>
            </div>
        </div>
    </div>
</div>

<script>
// Password confirmation validation
document.querySelector('form').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    
    if (password !== confirmPassword) {
        e.preventDefault();
        alert('Passwords do not match!');
        return false;
    }
});

// Contact number validation
document.getElementById('contact').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
    if (this.value.length > 11) {
        this.value = this.value.slice(0, 11);
    }
});
</script>