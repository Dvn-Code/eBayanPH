<?php
require_once __DIR__ . '/../includes/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($_POST['submit_clearance'])) {
    header('Location: ../index.php?page=barangay-clearance');
    exit();
}

$required = ['last_name','first_name','birth_date','birth_place','civil_status','address','contact','purpose','valid_id','id_number','age','gender','nationality'];
$errors = [];
foreach ($required as $r) {
    if (empty($_POST[$r])) $errors[] = $r . ' is required';
}

if (!empty($errors)) {
    // store errors in session and redirect back
    if (session_status() === PHP_SESSION_NONE) session_start();
    $_SESSION['clearance_errors'] = $errors;
    header('Location: ../index.php?page=barangay-clearance');
    exit();
}

// Store application in session (or in DB if configured)
if (session_status() === PHP_SESSION_NONE) session_start();
$_SESSION['clearance_application'] = [
    'reference_number' => 'BC-' . date('Ymd') . '-' . rand(1000, 9999),
    'last_name' => $_POST['last_name'],
    'first_name' => $_POST['first_name'],
    'middle_name' => $_POST['middle_name'] ?? null,
    'suffix' => $_POST['suffix'] ?? null,
    'birth_date' => $_POST['birth_date'],
    'birth_place' => $_POST['birth_place'],
    'age' => $_POST['age'],
    'gender' => $_POST['gender'],
    'civil_status' => $_POST['civil_status'],
    'nationality' => $_POST['nationality'],
    'address' => $_POST['address'],
    'contact' => $_POST['contact'],
    'email' => $_POST['email'] ?? null,
    'purpose' => $_POST['purpose'],
    'valid_id' => $_POST['valid_id'],
    'id_number' => $_POST['id_number'],
    'submitted_at' => date('Y-m-d H:i:s'),
    'status' => 'Pending'
];

header('Location: ../index.php?page=barangay-clearance&success=1');
exit();
?>