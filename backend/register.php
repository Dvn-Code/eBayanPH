<?php
    include __DIR__ . '/../includes/config.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $first_name       = $_POST['first_name'];
        $middle_name      = $_POST['middle_name'];
        $last_name        = $_POST['last_name'];
        $birthday         = $_POST['birthday'];
        $gender           = $_POST['gender'];
        $contact          = $_POST['contact'];
        $email            = $_POST['email'];
        $house_num        = $_POST['house_num'];
        $street           = $_POST['street'];
        $barangay         = $_POST['barangay'];
        $city             = $_POST['city'];
        $password         = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];

        if (empty($first_name) || empty($last_name) || empty($birthday) || empty($gender) ||
            empty($contact) || empty($email) || empty($house_num) || empty($street) ||
            empty($barangay) || empty($city) || empty($password) || empty($confirm_password)) {

            echo "Please fill in all required fields.";
        } elseif ($password !== $confirm_password) {
            echo "Passwords do not match.";
        } else {
            // ensure session available for error messages
            if (session_status() === PHP_SESSION_NONE) session_start();

            // Check if email already exists to avoid duplicate-entry error
            $checkSql = "SELECT id FROM ebayan WHERE email = ? LIMIT 1";
            $checkStmt = mysqli_prepare($connection, $checkSql);
            if ($checkStmt) {
                mysqli_stmt_bind_param($checkStmt, "s", $email);
                mysqli_stmt_execute($checkStmt);
                mysqli_stmt_store_result($checkStmt);
                if (mysqli_stmt_num_rows($checkStmt) > 0) {
                    // Email already registered
                    $_SESSION['signup_error'] = 'Email is already registered. Please use another email or login.';
                    mysqli_stmt_close($checkStmt);
                    header("Location: ../index.php?page=signup");
                    exit();
                }
                mysqli_stmt_close($checkStmt);
            }
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO ebayan 
                    (first_name, middle_name, last_name, dob, gender, contact_num, email, house_num, street, barangay, city, password) 
                    VALUES 
                    (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = mysqli_prepare($connection, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssssssss", $first_name, $middle_name, $last_name, $birthday, $gender, $contact, $email, $house_num, $street, $barangay, $city, $hashed_password);

            try {
                $ok = mysqli_stmt_execute($stmt);
            } catch (mysqli_sql_exception $ex) {
                // handle unexpected DB errors gracefully
                error_log('Register error: ' . $ex->getMessage());
                $_SESSION['signup_error'] = 'Registration failed due to a server error. Please try again later.';
                mysqli_stmt_close($stmt);
                header("Location: ../index.php?page=signup");
                exit();
            }

            if ($ok) {
                // Get the user ID
                $user_id = mysqli_insert_id($connection);
                
                // Start session and log the user in
                if (session_status() === PHP_SESSION_NONE) {
                    session_start();
                }
                
                $_SESSION['user'] = [
                    'id' => $user_id,
                    'email' => $email,
                    'first_name' => $first_name,
                    'middle_name' => $middle_name,
                    'last_name' => $last_name,
                    'birthday' => $birthday,
                    'gender' => $gender,
                    'contact' => $contact,
                    'house_num' => $house_num,
                    'street' => $street,
                    'barangay' => $barangay,
                    'city' => $city,
                    'is_verified' => false,
                    'is_admin' => false
                ];
                
                header("Location: ../index.php?page=home&show_verify=1");
                exit();
            } else {
                // insertion failed for non-exception reason
                $err = mysqli_error($connection);
                error_log('Register failed: ' . $err);
                echo "Error: " . htmlspecialchars($err);
            }
            mysqli_stmt_close($stmt);
        }
    }
?>