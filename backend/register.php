<?php
    include "../includes/config.php";

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
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users 
                    (first_name, middle_name, last_name, birthday, gender, contact, email, house_num, street, barangay, city, password) 
                    VALUES 
                    ('$first_name', '$middle_name', '$last_name', '$birthday', '$gender', '$contact', '$email', '$house_num', '$street', '$barangay', '$city', '$hashed_password')";

            if (mysqli_query($connection, $sql)) {
                header("Location: ../index.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($connection);
            }
        }
    }
?>