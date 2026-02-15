<?php
include __DIR__ . '/../includes/config.php';

if (isset($_SESSION['talent_form_data'])) {
    $_POST = $_SESSION['talent_form_data'];
    unset($_SESSION['talent_form_data']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_application'])) {
    // Get form data
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

        // log file
        $logFile = __DIR__ . '/../logs/talent_apply.log';

        if (mysqli_stmt_execute($stmt)) {
            $insertId = mysqli_insert_id($connection);
            file_put_contents($logFile, date('Y-m-d H:i:s') . " - SUCCESS insert id=" . $insertId . " user_id=" . ($user_id ?? 'NULL') . "\n", FILE_APPEND);
            // Redirect with success message
            header("Location: ../index.php?page=apply-talent&success=1");
            exit();
        } else {
            $err = mysqli_error($connection);
            file_put_contents($logFile, date('Y-m-d H:i:s') . " - ERROR executing statement: " . $err . "\n", FILE_APPEND);
            echo "Error executing statement. Logged to talent_apply.log";
        }
        mysqli_stmt_close($stmt);
    } else {
        $err = mysqli_error($connection);
        $logFile = __DIR__ . '/../logs/talent_apply.log';
        file_put_contents($logFile, date('Y-m-d H:i:s') . " - ERROR preparing statement: " . $err . "\n", FILE_APPEND);
        echo "Error preparing statement. Logged to talent_apply.log";
    }
} else {
    // If no POST data, redirect back
    header("Location: ../index.php?page=apply-talent");
    exit();
}
?>
