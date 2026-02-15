<?php
// Include database connection
include 'includes/config.php';

// Get selected values from form
$selectedIsland = isset($_POST['island']) ? $_POST['island'] : '';
$selectedRegion = isset($_POST['region']) ? $_POST['region'] : '';
$selectedCity = isset($_POST['city']) ? $_POST['city'] : '';
$selectedBarangay = isset($_POST['barangay']) ? $_POST['barangay'] : '';

// Handle form submission - collect errors for display
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_application'])) {
    // Validate all fields are filled
    if (empty($_POST['last_name'])) $errors[] = 'Last Name is required';
    if (empty($_POST['first_name'])) $errors[] = 'First Name is required';
    if (empty($_POST['age'])) $errors[] = 'Age is required';
    if (empty($_POST['gender'])) $errors[] = 'Gender is required';
    if (empty($_POST['island'])) $errors[] = 'Island is required';
    if (empty($_POST['region'])) $errors[] = 'Region is required';
    if (empty($_POST['city'])) $errors[] = 'City is required';
    if (empty($_POST['barangay'])) $errors[] = 'Barangay is required';
    if (empty($_POST['skill'])) $errors[] = 'Skill/Trade is required';
    if (empty($_POST['experience'])) $errors[] = 'Years of Experience is required';
    if (empty($_POST['contact'])) $errors[] = 'Contact Number is required';
    
    if (empty($errors)) {
        // Form is valid, save to database
        $first_name = $_POST['first_name'];
        $middle_name = $_POST['middle_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $island = $_POST['island'];
        $region = $_POST['region'];
        $city = $_POST['city'];
        $barangay = $_POST['barangay'];
        $street = $_POST['street'];
        $skill = $_POST['skill'];
        $experience = $_POST['experience'];
        $rate = isset($_POST['rate']) ? $_POST['rate'] : null;
        $description = isset($_POST['description']) ? $_POST['description'] : '';
        $contact = $_POST['contact'];
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        
        // Get user_id if logged in
        $user_id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : null;
        
        // Insert into database
        $sql = "INSERT INTO talent_applications 
                (user_id, first_name, middle_name, last_name, age, gender, island, region, city, barangay, street, skill, experience, daily_rate, description, contact_number, email, status) 
                VALUES 
                (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($connection, $sql);
        
        if ($stmt) {
            $status = 'pending';
            mysqli_stmt_bind_param(
                $stmt,
                "isssisssssssidssss",
                $user_id, 
                $first_name, 
                $middle_name, 
                $last_name, 
                $age, 
                $gender, 
                $island, 
                $region, 
                $city, 
                $barangay, 
                $street, 
                $skill, 
                $experience, 
                $rate, 
                $description, 
                $contact, 
                $email, 
                $status
            );
            
            if (mysqli_stmt_execute($stmt)) {
                // Redirect with success message
                header("Location: ?page=apply-talent&success=1");
                exit();
            } else {
                $errors[] = "Database error: " . mysqli_error($connection);
            }
            mysqli_stmt_close($stmt);
        } else {
            $errors[] = "Error preparing database statement: " . mysqli_error($connection);
        }
    }
}

// Simple location data - no filtering by island
$allIslands = ['Luzon', 'Visayas', 'Mindanao'];

$allRegions = [
    'NCR', 'CAR', 'Region I', 'Region II', 'Region III', 'Region IV-A', 'Region IV-B', 'Region V',
    'Region VI', 'Region VII', 'Region VIII', 'Region IX', 'Region X', 'Region XI', 'Region XII', 'Region XIII', 'BARMM'
];

// Sample cities (you can add more)
$allCities = [
    'Manila', 'Quezon City', 'Cebu City', 'Davao City', 'Makati', 'Pasig', 'Cagayan de Oro',
    'Mandaue City', 'Lapu-Lapu City', 'Talisay City', 'Zamboanga City', 'Iloilo City', 'Bacolod City'
];

// Sample barangays for common cities
$barangaysByCity = [
    'Cebu City' => ['Apas', 'Banilad', 'Basak San Nicolas', 'Busay', 'Guadalupe', 'Kamputhaw', 'Kasambagan', 'Lahug', 'Mabolo', 'Pardo', 'Talamban', 'Tisa', 'Zapatera'],
    'Mandaue City' => ['Alang-alang', 'Bakilid', 'Banilad', 'Basak', 'Cabancalan', 'Canduman', 'Centro', 'Guizo', 'Jagobiao', 'Labogon', 'Opao', 'Subangdaku', 'Tabok', 'Tipolo'],
    'Lapu-Lapu City' => ['Agus', 'Bankal', 'Basak', 'Looc', 'Maribago', 'Pajo', 'Poblacion', 'Pusok'],
];

// Get barangays for selected city
$barangays = [];
if ($selectedCity && isset($barangaysByCity[$selectedCity])) {
    $barangays = $barangaysByCity[$selectedCity];
}
?>

<div class="container" style="padding: 2rem 1rem; max-width: 800px; margin: 0 auto;">
    <!-- Header -->
    <div class="page-header" style="text-align: center; margin-bottom: 2rem;">
        <h1 style="color: #0A3A6E; font-size: 2.5rem; margin-bottom: 0.5rem;">
            💼 Apply as a Talent
        </h1>
        <p style="color: #5A6C7D; font-size: 1rem;">
            Join our platform and connect with residents looking for skilled workers
        </p>
    </div>

    <?php if (isset($_GET['success'])): ?>
    <!-- Success Message -->
    <div style="background: #D4EDDA; border: 2px solid #28A745; color: #155724; padding: 1.5rem; border-radius: 12px; margin-bottom: 2rem; text-align: center;">
        <div style="font-size: 3rem; margin-bottom: 0.5rem;">✅</div>
        <h3 style="margin-bottom: 0.5rem;">Application Submitted Successfully!</h3>
        <p style="margin: 0;">We will review your application and contact you soon.</p>
        <a href="?page=hire-talent" style="display: inline-block; margin-top: 1rem; padding: 0.75rem 1.5rem; background: #28A745; color: white; border-radius: 8px; text-decoration: none; font-weight: 600;">
            View Talent Listings
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

    <!-- Application Form -->
    <form method="POST" style="background: white; padding: 2.5rem; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.1);">
        
        <!-- Personal Information Section -->
        <h3 style="color: #0A3A6E; font-size: 1.5rem; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 3px solid #E1E8ED;">
            📋 Personal Information
        </h3>

        <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; margin-bottom: 2rem;">
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

            <!-- Age and Gender Row -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <!-- Age -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Age <span style="color: #C8102E;">*</span>
                    </label>
                    <input type="number" name="age" min="18" max="65" value="<?= isset($_POST['age']) ? htmlspecialchars($_POST['age']) : '' ?>" required
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
                </div>

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
            </div>
        </div>

        <!-- Address Section -->
        <h3 style="color: #0A3A6E; font-size: 1.5rem; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 3px solid #E1E8ED;">
            📍 Address
        </h3>

        <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; margin-bottom: 2rem;">
            <!-- Island Group -->
            <div>
                <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                    Island Group <span style="color: #C8102E;">*</span>
                </label>
                <select name="island" required onchange="this.form.submit()"
                    style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem; background: white;">
                    <option value="">Select Island Group</option>
                    <option value="Luzon" <?= $selectedIsland === 'Luzon' ? 'selected' : '' ?>>Luzon</option>
                    <option value="Visayas" <?= $selectedIsland === 'Visayas' ? 'selected' : '' ?>>Visayas</option>
                    <option value="Mindanao" <?= $selectedIsland === 'Mindanao' ? 'selected' : '' ?>>Mindanao</option>
                </select>
            </div>

            <!-- Region -->
            <div>
                <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                    Region <span style="color: #C8102E;">*</span>
                </label>
                <select name="region" required onchange="this.form.submit()"
                    style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem; background: white;">
                    <option value="">Select Region</option>
                    <?php foreach ($allRegions as $region): ?>
                        <option value="<?= $region ?>" <?= $selectedRegion === $region ? 'selected' : '' ?>><?= $region ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- City -->
            <div>
                <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                    City <span style="color: #C8102E;">*</span>
                </label>
                <select name="city" required onchange="this.form.submit()"
                    style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem; background: white;">
                    <option value="">Select City</option>
                    <?php foreach ($allCities as $city): ?>
                        <option value="<?= $city ?>" <?= $selectedCity === $city ? 'selected' : '' ?>><?= $city ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Barangay -->
            <div>
                <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                    Barangay <span style="color: #C8102E;">*</span>
                </label>
                <select name="barangay" required <?= empty($barangays) ? 'disabled' : '' ?>
                    style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem; background: white;">
                    <option value="">Select Barangay</option>
                    <?php foreach ($barangays as $barangay): ?>
                        <option value="<?= $barangay ?>" <?= $selectedBarangay === $barangay ? 'selected' : '' ?>><?= $barangay ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <!-- Street -->
            <div>
                <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                    Street
                </label>
                <input type="text" name="street" value="<?= isset($_POST['street']) ? htmlspecialchars($_POST['street']) : '' ?>"
                    style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
            </div>
        </div>

        <!-- Professional Information Section -->
        <h3 style="color: #0A3A6E; font-size: 1.5rem; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 3px solid #E1E8ED;">
            🔧 Professional Information
        </h3>

        <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; margin-bottom: 2rem;">
            <!-- Skill/Trade -->
            <div>
                <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                    Skill / Trade <span style="color: #C8102E;">*</span>
                </label>
                <select name="skill" required
                    style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem; background: white;">
                    <option value="">Select Your Skill</option>
                    <option value="Mason">Mason</option>
                    <option value="Plumber">Plumber</option>
                    <option value="Electrician">Electrician</option>
                    <option value="Carpenter">Carpenter</option>
                    <option value="Painter">Painter</option>
                    <option value="Welder">Welder</option>
                    <option value="Tile Setter">Tile Setter</option>
                    <option value="Roofer">Roofer</option>
                    <option value="Landscaper">Landscaper</option>
                    <option value="HVAC Technician">HVAC Technician</option>
                    <option value="Glass & Aluminum">Glass & Aluminum Installer</option>
                    <option value="General Helper">General Helper</option>
                </select>
            </div>

            <!-- Years of Experience and Rate Row -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                <!-- Years of Experience -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Years of Experience <span style="color: #C8102E;">*</span>
                    </label>
                    <input type="number" name="experience" min="0" max="50" value="<?= isset($_POST['experience']) ? htmlspecialchars($_POST['experience']) : '' ?>" required
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
                </div>

                <!-- Daily Rate -->
                <div>
                    <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                        Daily Rate (₱)
                    </label>
                    <input type="number" name="rate" min="0" step="50" value="<?= isset($_POST['rate']) ? htmlspecialchars($_POST['rate']) : '' ?>" placeholder="e.g. 500"
                        style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
                </div>
            </div>

            <!-- Description -->
            <div>
                <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                    Description of Services
                </label>
                <textarea name="description" rows="4" placeholder="Describe your skills, services, and experience..."
                    style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem; resize: vertical;"><?= isset($_POST['description']) ? htmlspecialchars($_POST['description']) : '' ?></textarea>
            </div>
        </div>

        <!-- Contact Information Section -->
        <h3 style="color: #0A3A6E; font-size: 1.5rem; margin-bottom: 1.5rem; padding-bottom: 0.75rem; border-bottom: 3px solid #E1E8ED;">
            📞 Contact Information
        </h3>

        <div style="display: grid; grid-template-columns: 1fr; gap: 1.5rem; margin-bottom: 2rem;">
            <!-- Contact Number -->
            <div>
                <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                    Contact Number <span style="color: #C8102E;">*</span>
                </label>
                <input type="tel" name="contact" value="<?= isset($_POST['contact']) ? htmlspecialchars($_POST['contact']) : '' ?>" required
                    placeholder="+63 912 345 6789" pattern="[+0-9\s]+"
                    style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
            </div>

            <!-- Email -->
            <div>
                <label style="display: block; color: #1A2332; font-weight: 600; margin-bottom: 0.5rem;">
                    Email Address (Optional)
                </label>
                <input type="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>"
                    placeholder="your.email@example.com"
                    style="width: 100%; padding: 0.875rem; border: 2px solid #E1E8ED; border-radius: 8px; font-size: 1rem;">
            </div>
        </div>

        <!-- Submit Button -->
        <div style="text-align: center; padding-top: 1rem;">
            <button type="submit" name="submit_application" 
                style="padding: 1rem 3rem; background: linear-gradient(135deg, #0A3A6E 0%, #1B5A8E 100%); color: white; border: none; border-radius: 8px; font-size: 1.1rem; font-weight: 700; cursor: pointer; transition: all 0.3s; box-shadow: 0 4px 12px rgba(10, 58, 110, 0.3);">
                Submit Application
            </button>
        </div>
    </form>

    <!-- Info Note -->
    <div style="margin-top: 2rem; padding: 1.5rem; background: #F0F7FF; border-left: 4px solid #0A3A6E; border-radius: 8px;">
        <h4 style="color: #0A3A6E; margin-bottom: 0.5rem;">ℹ️ Application Process</h4>
        <ul style="color: #5A6C7D; margin: 0; padding-left: 1.5rem; line-height: 1.8;">
            <li>Your application will be reviewed by the barangay office</li>
            <li>We will verify your credentials and experience</li>
            <li>Approved applicants will be listed in the Hire a Talent directory</li>
            <li>You will be contacted within 3-5 business days</li>
        </ul>
    </div>
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
    div[style*="grid-template-columns: 1fr 1fr"] {
        grid-template-columns: 1fr !important;
    }
}
</style>
