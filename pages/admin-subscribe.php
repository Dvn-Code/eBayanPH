<div class="breadcrumb">
    <a href="?page=home">Home</a>
    <span>›</span>
    <span>Admin Subscription</span>
</div>

<div class="main-content">
    <div class="subscription-card">
        <h2>🏛️ ADMIN Subscription</h2>
        <p style="font-size: 1.125rem; margin-bottom: 1rem;">Manage your barangay services and connect with your community through eBayan</p>
        
        <ul class="perks">
            <li>Post official announcements and updates to your barangay residents</li>
            <li>Manage barangay services and information online</li>
            <li>Receive and respond to citizen complaints and requests</li>
            <li>Update barangay official information and contact details</li>
            <li>Access analytics and reports on citizen engagement</li>
            <li>Priority technical support and assistance</li>
            <li>Customizable barangay page with your branding</li>
            <li>Document management and digital filing system</li>
        </ul>
        
        <a href="#subscribe-form" class="btn" style="background: var(--accent); color: var(--primary); width: auto; padding: 1rem 2rem; font-size: 1.125rem;">Subscribe Now</a>
    </div>

    <div class="section" id="subscribe-form">
        <h2 class="section-title">Admin Subscription Application</h2>
        <p style="color: var(--text-gray); margin-bottom: 2rem;">Fill out this form to apply for admin access. Please provide accurate information and upload required documents for verification.</p>
        
        <div class="profile-card">
            <form method="POST" action="" enctype="multipart/form-data">
                <h3 style="color: var(--primary); margin-bottom: 1.5rem;">Barangay Information</h3>
                
                <div class="form-group">
                    <label for="barangay_name">Barangay Name *</label>
                    <input type="text" id="barangay_name" name="barangay_name" required placeholder="Enter barangay name">
                </div>

                <h4 style="color: var(--primary); margin: 2rem 0 1rem 0;">Barangay Office Address</h4>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="house_num">Building/House Number *</label>
                        <input type="text" id="house_num" name="house_num" required placeholder="Building No.">
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

                <h4 style="color: var(--primary); margin: 2rem 0 1rem 0;">Contact Information</h4>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="barangay_contact">Barangay Contact Number *</label>
                        <input type="tel" id="barangay_contact" name="barangay_contact" required placeholder="0912345678 9" pattern="[0-9]{11}">
                    </div>
                    <div class="form-group">
                        <label for="barangay_email">Official Barangay Email *</label>
                        <input type="email" id="barangay_email" name="barangay_email" required placeholder="barangay@email.com">
                    </div>
                </div>

                <h4 style="color: var(--primary); margin: 2rem 0 1rem 0;">Barangay Captain Information</h4>
                
                <div class="form-group">
                    <label for="captain_name">Full Name of Barangay Captain *</label>
                    <input type="text" id="captain_name" name="captain_name" required placeholder="Enter full name">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="captain_contact">Captain Contact Number *</label>
                        <input type="tel" id="captain_contact" name="captain_contact" required placeholder="09123456789" pattern="[0-9]{11}">
                    </div>
                    <div class="form-group">
                        <label for="captain_email">Captain Email</label>
                        <input type="email" id="captain_email" name="captain_email" placeholder="captain@email.com">
                    </div>
                </div>

                <h4 style="color: var(--primary); margin: 2rem 0 1rem 0;">Additional Information</h4>
                
                <div class="form-group">
                    <label for="population">Barangay Population (Estimated)</label>
                    <input type="number" id="population" name="population" placeholder="Enter estimated population">
                </div>

                <div class="form-group">
                    <label for="description">Barangay Description</label>
                    <textarea id="description" name="description" rows="4" placeholder="Brief description of your barangay (history, landmarks, key features, etc.)"></textarea>
                </div>

                <h4 style="color: var(--primary); margin: 2rem 0 1rem 0;">Required Documents *</h4>
                <p style="color: var(--text-gray); margin-bottom: 1rem;">Please upload the following documents for verification:</p>
                
                <div class="form-group">
                    <label for="authorization_letter">Authorization Letter from Barangay Captain *</label>
                    <div class="file-upload" onclick="document.getElementById('authorization_letter').click()">
                        <input type="file" id="authorization_letter" name="authorization_letter" accept=".pdf,.jpg,.jpeg,.png" required onchange="updateFileName(this, 'auth-file-name')">
                        <div style="padding: 1rem;">
                            <span style="font-size: 2rem; color: var(--primary);">📄</span>
                            <p style="margin-top: 0.5rem; color: var(--text-dark); font-weight: 600;">Click to upload authorization letter</p>
                            <p style="margin-top: 0.25rem; color: var(--text-gray); font-size: 0.875rem;">PDF, JPG, or PNG (Max 5MB)</p>
                            <p id="auth-file-name" style="margin-top: 0.5rem; color: var(--primary); font-weight: 600;"></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="barangay_certificate">Barangay Certificate or Official Document *</label>
                    <div class="file-upload" onclick="document.getElementById('barangay_certificate').click()">
                        <input type="file" id="barangay_certificate" name="barangay_certificate" accept=".pdf,.jpg,.jpeg,.png" required onchange="updateFileName(this, 'cert-file-name')">
                        <div style="padding: 1rem;">
                            <span style="font-size: 2rem; color: var(--primary);">📜</span>
                            <p style="margin-top: 0.5rem; color: var(--text-dark); font-weight: 600;">Click to upload certificate</p>
                            <p style="margin-top: 0.25rem; color: var(--text-gray); font-size: 0.875rem;">PDF, JPG, or PNG (Max 5MB)</p>
                            <p id="cert-file-name" style="margin-top: 0.5rem; color: var(--primary); font-weight: 600;"></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="valid_id">Valid ID of Applicant *</label>
                    <div class="file-upload" onclick="document.getElementById('valid_id').click()">
                        <input type="file" id="valid_id" name="valid_id" accept=".jpg,.jpeg,.png" required onchange="updateFileName(this, 'id-file-name')">
                        <div style="padding: 1rem;">
                            <span style="font-size: 2rem; color: var(--primary);">🪪</span>
                            <p style="margin-top: 0.5rem; color: var(--text-dark); font-weight: 600;">Click to upload valid ID</p>
                            <p style="margin-top: 0.25rem; color: var(--text-gray); font-size: 0.875rem;">JPG or PNG (Max 5MB)</p>
                            <p id="id-file-name" style="margin-top: 0.5rem; color: var(--primary); font-weight: 600;"></p>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="additional_docs">Additional Supporting Documents (Optional)</label>
                    <div class="file-upload" onclick="document.getElementById('additional_docs').click()">
                        <input type="file" id="additional_docs" name="additional_docs[]" accept=".pdf,.jpg,.jpeg,.png" multiple onchange="updateMultipleFileNames(this, 'add-file-names')">
                        <div style="padding: 1rem;">
                            <span style="font-size: 2rem; color: var(--primary);">📎</span>
                            <p style="margin-top: 0.5rem; color: var(--text-dark); font-weight: 600;">Click to upload additional documents</p>
                            <p style="margin-top: 0.25rem; color: var(--text-gray); font-size: 0.875rem;">Multiple files allowed (PDF, JPG, PNG)</p>
                            <p id="add-file-names" style="margin-top: 0.5rem; color: var(--primary); font-weight: 600;"></p>
                        </div>
                    </div>
                </div>

                <div class="form-group" style="display: flex; align-items: flex-start; gap: 0.5rem; margin-top: 2rem;">
                    <input type="checkbox" id="agree_terms" name="agree_terms" required style="width: auto; margin-top: 0.25rem;">
                    <label for="agree_terms" style="margin: 0; font-weight: 400;">
                        I hereby certify that all information provided is true and correct. I understand that providing false information may result in denial of service and legal action. I agree to the <a href="?page=settings" style="color: var(--primary);">Terms and Conditions</a> for admin subscription.
                    </label>
                </div>

                <div class="alert alert-info" style="margin-top: 1.5rem;">
                    <span>ℹ️</span>
                    <div>
                        <strong>Application Review Process:</strong>
                        <p style="margin: 0.5rem 0 0 0;">Your application will be reviewed within 5-7 business days. You will receive an email notification once your application has been approved or if additional information is required.</p>
                    </div>
                </div>

                <button type="submit" name="subscribe_admin" class="btn btn-primary" style="width: auto; padding: 1rem 2rem; margin-top: 1.5rem; font-size: 1.125rem;">Submit Application</button>
            </form>
        </div>
    </div>
</div>

<script>
// Contact number validation
document.getElementById('barangay_contact').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
    if (this.value.length > 11) {
        this.value = this.value.slice(0, 11);
    }
});

document.getElementById('captain_contact').addEventListener('input', function(e) {
    this.value = this.value.replace(/[^0-9]/g, '');
    if (this.value.length > 11) {
        this.value = this.value.slice(0, 11);
    }
});

function updateFileName(input, displayId) {
    const display = document.getElementById(displayId);
    if (input.files.length > 0) {
        display.textContent = '✓ ' + input.files[0].name;
    }
}

function updateMultipleFileNames(input, displayId) {
    const display = document.getElementById(displayId);
    if (input.files.length > 0) {
        const fileNames = Array.from(input.files).map(f => f.name).join(', ');
        display.textContent = '✓ ' + input.files.length + ' file(s) selected: ' + fileNames;
    }
}

// File size validation
document.querySelectorAll('input[type="file"]').forEach(input => {
    input.addEventListener('change', function() {
        const maxSize = 5 * 1024 * 1024; // 5MB
        for (let file of this.files) {
            if (file.size > maxSize) {
                alert('File ' + file.name + ' is too large. Maximum file size is 5MB.');
                this.value = '';
                return;
            }
        }
    });
});

// Smooth scroll to form
document.querySelector('a[href="#subscribe-form"]').addEventListener('click', function(e) {
    e.preventDefault();
    document.getElementById('subscribe-form').scrollIntoView({ behavior: 'smooth' });
});
</script>