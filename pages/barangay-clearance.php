<?php
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_clearance'])) {
    // Validate all fields are filled
    $errors = [];
    
    if (empty($_POST['last_name'])) $errors[] = 'Last Name is required';
    if (empty($_POST['first_name'])) $errors[] = 'First Name is required';
    if (empty($_POST['birth_date'])) $errors[] = 'Date of Birth is required';
    if (empty($_POST['birth_place'])) $errors[] = 'Place of Birth is required';
    if (empty($_POST['civil_status'])) $errors[] = 'Civil Status is required';
    if (empty($_POST['address'])) $errors[] = 'Complete Address is required';
    if (empty($_POST['contact'])) $errors[] = 'Contact Number is required';
    if (empty($_POST['purpose'])) $errors[] = 'Purpose is required';
    if (empty($_POST['valid_id'])) $errors[] = 'Valid ID Type is required';
    if (empty($_POST['id_number'])) $errors[] = 'ID Number is required';
    
    if (empty($errors)) {
        // Store application (in production, save to database)
        $_SESSION['clearance_application'] = [
            'reference_number' => 'BC-' . date('Ymd') . '-' . rand(1000, 9999),
            'last_name' => $_POST['last_name'],
            'first_name' => $_POST['first_name'],
            'middle_name' => $_POST['middle_name'],
            'suffix' => $_POST['suffix'],
            'birth_date' => $_POST['birth_date'],
            'birth_place' => $_POST['birth_place'],
            'age' => $_POST['age'],
            'gender' => $_POST['gender'],
            'civil_status' => $_POST['civil_status'],
            'nationality' => $_POST['nationality'],
            'address' => $_POST['address'],
            'contact' => $_POST['contact'],
            'email' => $_POST['email'],
            'purpose' => $_POST['purpose'],
            'valid_id' => $_POST['valid_id'],
            'id_number' => $_POST['id_number'],
            'submitted_at' => date('Y-m-d H:i:s'),
            'status' => 'Pending'
        ];
        
        // Redirect with success message
        header('Location: index.php?page=barangay-clearance&success=1');
        exit();
    }
}

// Get reference number if exists
$referenceNumber = isset($_SESSION['clearance_application']['reference_number']) ? $_SESSION['clearance_application']['reference_number'] : '';
?>

<div class="container" style="padding: 2rem 1rem; max-width: 900px; margin: 0 auto;">
    <!-- Breadcrumb -->
    <div class="breadcrumb" style="margin-bottom: 2rem; color: #5A6C7D; font-size: 0.9rem;">
        <a href="?page=home" style="color: #0A3A6E; text-decoration: none;">Home</a>
        <span style="margin: 0 0.5rem;">›</span>
        <a href="?page=pardo" style="color: #0A3A6E; text-decoration: none;">Barangay Pardo</a>
        <span style="margin: 0 0.5rem;">›</span>
        <span>Barangay Clearance</span>
    </div>

    <!-- Header -->
    <div class="page-header" style="text-align: center; margin-bottom: 2rem; background: linear-gradient(135deg, #0A3A6E 0%, #1B5A8E 100%); color: white; padding: 3rem 2rem; border-radius: 16px; box-shadow: 0 4px 12px rgba(10, 58, 110, 0.2);">
        <div style="font-size: 4rem; margin-bottom: 1rem;">📋</div>
        <h1 style="font-size: 2.5rem; margin-bottom: 0.5rem;">Barangay Clearance Application</h1>
        <p style="font-size: 1.1rem; opacity: 0.95;">Online Certificate Request - Barangay Pardo</p>
    </div>

    <?php if (isset($_GET['success'])): ?>
    <!-- Success Message -->
    <div style="background: #D4EDDA; border: 2px solid #28A745; color: #155724; padding: 2rem; border-radius: 12px; margin-bottom: 2rem; text-align: center;">
        <div style="font-size: 3.5rem; margin-bottom: 1rem;">✅</div>
        <h3 style="margin-bottom: 1rem; color: #155724;">Application Submitted Successfully!</h3>
        <div style="background: white; padding: 1rem; border-radius: 8px; margin: 1rem 0; display: inline-block;">
            <p style="margin: 0; color: #5A6C7D; font-size: 0.9rem;">Your Reference Number:</p>
            <p style="margin: 0.5rem 0 0 0; color: #0A3A6E; font-size: 1.5rem; font-weight: 700; letter-spacing: 2px;"><?= $referenceNumber ?></p>
        </div>
        <p style="margin: 1rem 0; color: #155724;">Please save this reference number for tracking your application.</p>
        <div style="margin-top: 1.5rem;">
            <p style="margin-bottom: 0.5rem; font-weight: 600;">Next Steps:</p>
            <ul style="text-align: left; display: inline-block; margin: 0;">
                <li>Processing time: 3-5 business days</li>
                <li>You will receive an SMS notification when ready</li>
                <li>Bring valid ID and this reference number for claiming</li>
                <li>Clearance fee: ₱50.00 (payable upon claiming)</li>
            </ul>
        </div>
        <a href="?page=pardo" style="display: inline-block; margin-top: 1.5rem; padding: 0.875rem 2rem; background: #28A745; color: white; border-radius: 8px; text-decoration: none; font-weight: 600;">
            Back to Barangay Home
        </a>
    </div>
    <?php endif; ?>

    <?php if (!empty($errors)): ?>
    <!-- Error Messages -->
    <div style="background: #F8D7DA; border: 2px solid #C8102E; color: #721C24; padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem;">
        <h4 style="margin-bottom: 0.5rem;">⚠️ Please fix the following errors:</h4>
        <ul style="margin: 0; padding-left: 1.5rem;">
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
    <?php endif; ?>

    <?php if (!isset($_GET['success'])): ?>
    <!-- Info Box -->
    <div style="background: #E3F2FD; border-left: 4px solid #0A3A6E; padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem;">
        <h4 style="color: #0A3A6E; margin-bottom: 0.75rem;">📌 Important Information</h4>
        <ul style="color: #5A6C7D; margin: 0; padding-left: 1.5rem; line-height: 1.8;">
            <li>Fill out all required fields marked with <span style="color: #C8102E;">*</span></li>
            <li>Ensure all information is accurate and complete</li>
            <li>Processing fee: ₱50.00 (payable upon claiming)</li>
            <li>Valid for 6 months from date of issue</li>
            <li>Bring valid ID when claiming your clearance</li>
        </ul>
    </div>

    <!-- Application Form -->
    <form method="POST" action="" style="background: white; padding: 2.5rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        
        <!-- Personal Information Section -->
        <h3 style="color: #0A3A6E; font-size: 1.5rem; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 3px solid #E1E8ED;">
            👤 Personal Information
        </h3>

        <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; margin-bottom: 2rem;">
            <!-- Name Fields -->
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr 100px; gap: 1rem;">
                <!-- Last Name -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Last Name <span style="color: #C8102E;">*</span>
                    </label>
                    <input type="text" name="last_name" value="<?= isset($_POST['last_name']) ? htmlspecialchars($_POST['last_name']) : '' ?>" required
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
                </div>

                <!-- First Name -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        First Name <span style="color: #C8102E;">*</span>
                    </label>
                    <input type="text" name="first_name" value="<?= isset($_POST['first_name']) ? htmlspecialchars($_POST['first_name']) : '' ?>" required
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
                </div>

                <!-- Middle Name -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Middle Name
                    </label>
                    <input type="text" name="middle_name" value="<?= isset($_POST['middle_name']) ? htmlspecialchars($_POST['middle_name']) : '' ?>"
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
                </div>

                <!-- Suffix -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Suffix
                    </label>
                    <input type="text" name="suffix" value="<?= isset($_POST['suffix']) ? htmlspecialchars($_POST['suffix']) : '' ?>" placeholder="Jr/Sr/III"
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
                </div>
            </div>

            <!-- Birth Information Row -->
            <div style="display: grid; grid-template-columns: 1fr 2fr 100px; gap: 1rem;">
                <!-- Date of Birth -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Date of Birth <span style="color: #C8102E;">*</span>
                    </label>
                    <input type="date" name="birth_date" value="<?= isset($_POST['birth_date']) ? htmlspecialchars($_POST['birth_date']) : '' ?>" required
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
                </div>

                <!-- Place of Birth -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Place of Birth <span style="color: #C8102E;">*</span>
                    </label>
                    <input type="text" name="birth_place" value="<?= isset($_POST['birth_place']) ? htmlspecialchars($_POST['birth_place']) : '' ?>" required
                        placeholder="City/Municipality, Province"
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
                </div>

                <!-- Age -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Age <span style="color: #C8102E;">*</span>
                    </label>
                    <input type="number" name="age" min="18" max="100" value="<?= isset($_POST['age']) ? htmlspecialchars($_POST['age']) : '' ?>" required
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
                </div>
            </div>

            <!-- Gender, Civil Status, Nationality Row -->
            <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 1rem;">
                <!-- Gender -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Gender <span style="color: #C8102E;">*</span>
                    </label>
                    <select name="gender" required
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem; background: white;">
                        <option value="">Select Gender</option>
                        <option value="Male" <?= (isset($_POST['gender']) && $_POST['gender'] === 'Male') ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= (isset($_POST['gender']) && $_POST['gender'] === 'Female') ? 'selected' : '' ?>>Female</option>
                    </select>
                </div>

                <!-- Civil Status -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Civil Status <span style="color: #C8102E;">*</span>
                    </label>
                    <select name="civil_status" required
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem; background: white;">
                        <option value="">Select Status</option>
                        <option value="Single" <?= (isset($_POST['civil_status']) && $_POST['civil_status'] === 'Single') ? 'selected' : '' ?>>Single</option>
                        <option value="Married" <?= (isset($_POST['civil_status']) && $_POST['civil_status'] === 'Married') ? 'selected' : '' ?>>Married</option>
                        <option value="Widowed" <?= (isset($_POST['civil_status']) && $_POST['civil_status'] === 'Widowed') ? 'selected' : '' ?>>Widowed</option>
                        <option value="Separated" <?= (isset($_POST['civil_status']) && $_POST['civil_status'] === 'Separated') ? 'selected' : '' ?>>Separated</option>
                    </select>
                </div>

                <!-- Nationality -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Nationality <span style="color: #C8102E;">*</span>
                    </label>
                    <input type="text" name="nationality" value="<?= isset($_POST['nationality']) ? htmlspecialchars($_POST['nationality']) : 'Filipino' ?>" required
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
                </div>
            </div>
        </div>

        <!-- Address & Contact Section -->
        <h3 style="color: #0A3A6E; font-size: 1.5rem; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 3px solid #E1E8ED;">
            📍 Address & Contact Information
        </h3>

        <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; margin-bottom: 2rem;">
            <!-- Complete Address -->
            <div>
                <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                    Complete Address <span style="color: #C8102E;">*</span>
                </label>
                <textarea name="address" rows="2" required placeholder="House No., Street, Barangay Pardo, Cebu City"
                    style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem; resize: vertical;"><?= isset($_POST['address']) ? htmlspecialchars($_POST['address']) : '' ?></textarea>
            </div>

            <!-- Contact and Email Row -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <!-- Contact Number -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Contact Number <span style="color: #C8102E;">*</span>
                    </label>
                    <input type="tel" name="contact" value="<?= isset($_POST['contact']) ? htmlspecialchars($_POST['contact']) : '' ?>" required
                        placeholder="+63 912 345 6789" pattern="[+0-9\s]+"
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
                </div>

                <!-- Email Address -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Email Address (Optional)
                    </label>
                    <input type="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"
                        placeholder="your.email@example.com"
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
                </div>
            </div>
        </div>

        <!-- Purpose & Valid ID Section -->
        <h3 style="color: #0A3A6E; font-size: 1.5rem; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 3px solid #E1E8ED;">
            📝 Purpose & Identification
        </h3>

        <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; margin-bottom: 2rem;">
            <!-- Purpose -->
            <div>
                <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                    Purpose <span style="color: #C8102E;">*</span>
                </label>
                <select name="purpose" required
                    style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem; background: white;">
                    <option value="">Select Purpose</option>
                    <option value="Employment" <?= (isset($_POST['purpose']) && $_POST['purpose'] === 'Employment') ? 'selected' : '' ?>>Employment</option>
                    <option value="Local Employment" <?= (isset($_POST['purpose']) && $_POST['purpose'] === 'Local Employment') ? 'selected' : '' ?>>Local Employment</option>
                    <option value="Overseas Employment" <?= (isset($_POST['purpose']) && $_POST['purpose'] === 'Overseas Employment') ? 'selected' : '' ?>>Overseas Employment</option>
                    <option value="Business Permit" <?= (isset($_POST['purpose']) && $_POST['purpose'] === 'Business Permit') ? 'selected' : '' ?>>Business Permit</option>
                    <option value="Bank Requirement" <?= (isset($_POST['purpose']) && $_POST['purpose'] === 'Bank Requirement') ? 'selected' : '' ?>>Bank Requirement</option>
                    <option value="Loan Application" <?= (isset($_POST['purpose']) && $_POST['purpose'] === 'Loan Application') ? 'selected' : '' ?>>Loan Application</option>
                    <option value="School Requirement" <?= (isset($_POST['purpose']) && $_POST['purpose'] === 'School Requirement') ? 'selected' : '' ?>>School Requirement</option>
                    <option value="Police Clearance" <?= (isset($_POST['purpose']) && $_POST['purpose'] === 'Police Clearance') ? 'selected' : '' ?>>Police Clearance</option>
                    <option value="Court Requirement" <?= (isset($_POST['purpose']) && $_POST['purpose'] === 'Court Requirement') ? 'selected' : '' ?>>Court Requirement</option>
                    <option value="Travel" <?= (isset($_POST['purpose']) && $_POST['purpose'] === 'Travel') ? 'selected' : '' ?>>Travel</option>
                    <option value="Others" <?= (isset($_POST['purpose']) && $_POST['purpose'] === 'Others') ? 'selected' : '' ?>>Others</option>
                </select>
            </div>

            <!-- Valid ID Row -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <!-- Valid ID Type -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Valid ID Type <span style="color: #C8102E;">*</span>
                    </label>
                    <select name="valid_id" required
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem; background: white;">
                        <option value="">Select ID Type</option>
                        <option value="National ID">National ID (PhilSys)</option>
                        <option value="Driver's License">Driver's License</option>
                        <option value="Passport">Passport</option>
                        <option value="SSS ID">SSS ID</option>
                        <option value="GSIS ID">GSIS ID</option>
                        <option value="PhilHealth ID">PhilHealth ID</option>
                        <option value="Postal ID">Postal ID</option>
                        <option value="Voter's ID">Voter's ID</option>
                        <option value="PRC ID">PRC ID</option>
                        <option value="Senior Citizen ID">Senior Citizen ID</option>
                        <option value="PWD ID">PWD ID</option>
                    </select>
                </div>

                <!-- ID Number -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        ID Number <span style="color: #C8102E;">*</span>
                    </label>
                    <input type="text" name="id_number" value="<?= isset($_POST['id_number']) ? htmlspecialchars($_POST['id_number']) : '' ?>" required
                        placeholder="Enter your ID number"
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
                </div>
            </div>
        </div>

        <!-- Terms and Conditions -->
        <div style="background: #F8FAFB; padding: 1.5rem; border-radius: 8px; margin-bottom: 2rem;">
            <label style="display: flex; align-items: start; cursor: pointer;">
                <input type="checkbox" required style="margin-top: 0.25rem; margin-right: 0.75rem; width: 18px; height: 18px;">
                <span style="color: #5A6C7D; font-size: 0.95rem; line-height: 1.6;">
                    I hereby certify that the information provided above is true and correct to the best of my knowledge. I understand that any false statement may result in the denial of my application and possible legal action.
                </span>
            </label>
        </div>

        <!-- Submit Button -->
        <div style="text-align: center; padding-top: 1rem;">
            <button type="submit" name="submit_clearance" 
                style="padding: 1rem 3rem; background: linear-gradient(135deg, #0A3A6E 0%, #1B5A8E 100%); color: white; border: none; border-radius: 8px; font-size: 1.1rem; font-weight: 700; cursor: pointer; transition: all 0.3s; box-shadow: 0 4px 12px rgba(10, 58, 110, 0.3);">
                Submit Application
            </button>
        </div>
    </form>
    <?php endif; ?>

    <!-- Processing Info -->
    <?php if (!isset($_GET['success'])): ?>
    <div style="margin-top: 2rem; padding: 1.5rem; background: #FFF9E6; border-left: 4px solid #FDB913; border-radius: 8px;">
        <h4 style="color: #1A2332; margin-bottom: 0.75rem;">⏱️ Processing Information</h4>
        <ul style="color: #5A6C7D; margin: 0; padding-left: 1.5rem; line-height: 1.8;">
            <li><strong>Processing Time:</strong> 3-5 business days</li>
            <li><strong>Claiming:</strong> Barangay Hall, Monday to Friday, 8:00 AM - 5:00 PM</li>
            <li><strong>Requirements:</strong> Valid ID and Reference Number</li>
            <li><strong>Fee:</strong> ₱50.00 (payable upon claiming)</li>
            <li><strong>Validity:</strong> 6 months from date of issue</li>
            <li><strong>Inquiries:</strong> Call (032) 123-4567 or email pardo@cebucity.gov.ph</li>
        </ul>
    </div>
    <?php endif; ?>
</div>

<style>
input:focus, select:focus, textarea:focus {
    outline: none;
    border-color: #0A3A6E;
}

button[type="submit"]:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 16px rgba(10, 58, 110, 0.4);
}

@media (max-width: 768px) {
    div[style*="grid-template-columns: 1fr 1fr 1fr 100px"],
    div[style*="grid-template-columns: 1fr 2fr 100px"],
    div[style*="grid-template-columns: 1fr 1fr 1fr"],
    div[style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
    }
}
</style>
