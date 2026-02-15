<?php
include 'includes/config.php';

echo "<h2>Database Connection Test</h2>";

// Test connection
if ($connection) {
    echo "<p style='color: green;'>✅ Database connection successful!</p>";
} else {
    echo "<p style='color: red;'>❌ Database connection failed: " . mysqli_connect_error() . "</p>";
    exit;
}

// Check if 'ebayan' table exists
$tables = mysqli_query($connection, "SHOW TABLES FROM hackathon");
echo "<h3>Tables in 'hackathon' database:</h3>";
echo "<ul>";
while ($row = mysqli_fetch_row($tables)) {
    echo "<li>" . $row[0] . "</li>";
}
echo "</ul>";

// Show ebayan table structure
echo "<h3>ebayan table structure:</h3>";
$result = mysqli_query($connection, "DESCRIBE ebayan");
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row['Field'] . "</td>";
    echo "<td>" . $row['Type'] . "</td>";
    echo "<td>" . $row['Null'] . "</td>";
    echo "<td>" . $row['Key'] . "</td>";
    echo "<td>" . $row['Default'] . "</td>";
    echo "</tr>";
}
echo "</table>";

// Count users
$count_result = mysqli_query($connection, "SELECT COUNT(*) as total FROM ebayan");
$count_row = mysqli_fetch_assoc($count_result);
echo "<h3>Total users registered: " . $count_row['total'] . "</h3>";

// Show all users
echo "<h3>Registered Users:</h3>";
$users_result = mysqli_query($connection, "SELECT id, first_name, last_name, email, created_at FROM ebayan ORDER BY created_at DESC");
if (mysqli_num_rows($users_result) > 0) {
    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Date</th></tr>";
    while ($user = mysqli_fetch_assoc($users_result)) {
        echo "<tr>";
        echo "<td>" . $user['id'] . "</td>";
        echo "<td>" . $user['first_name'] . " " . $user['last_name'] . "</td>";
        echo "<td>" . $user['email'] . "</td>";
        echo "<td>" . $user['created_at'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No users found</p>";
}

// Show talent applications
echo "<h3>Talent Applications:</h3>";
$talent_result = mysqli_query($connection, "SELECT id, first_name, last_name, age, gender, island, region, city, barangay, skill, experience, daily_rate, contact_number, status, created_at FROM talent_applications ORDER BY created_at DESC");
if (mysqli_num_rows($talent_result) > 0) {
    echo "<table border='1' cellpadding='10' style='width: 100%; overflow: auto;'>";
    echo "<tr>
            <th>ID</th>
            <th>Name</th>
            <th>Age</th>
            <th>Gender</th>
            <th>Island</th>
            <th>Region</th>
            <th>City</th>
            <th>Barangay</th>
            <th>Skill</th>
            <th>Experience</th>
            <th>Daily Rate (₱)</th>
            <th>Contact</th>
            <th>Status</th>
            <th>Date</th>
          </tr>";
    while ($talent = mysqli_fetch_assoc($talent_result)) {
        echo "<tr>";
        echo "<td>" . $talent['id'] . "</td>";
        echo "<td>" . $talent['first_name'] . " " . $talent['last_name'] . "</td>";
        echo "<td>" . $talent['age'] . "</td>";
        echo "<td>" . $talent['gender'] . "</td>";
        echo "<td>" . $talent['island'] . "</td>";
        echo "<td>" . $talent['region'] . "</td>";
        echo "<td>" . $talent['city'] . "</td>";
        echo "<td>" . $talent['barangay'] . "</td>";
        echo "<td>" . $talent['skill'] . "</td>";
        echo "<td>" . $talent['experience'] . " years</td>";
        echo "<td>" . ($talent['daily_rate'] ? '₱' . number_format($talent['daily_rate'], 2) : 'Not set') . "</td>";
        echo "<td>" . $talent['contact_number'] . "</td>";
        echo "<td><strong>" . ucfirst($talent['status']) . "</strong></td>";
        echo "<td>" . $talent['created_at'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>No talent applications found</p>";
}

// Show talent_applications table structure for debugging
echo "<h3>talent_applications table structure:</h3>";
$describe = mysqli_query($connection, "DESCRIBE talent_applications");
if ($describe) {
    echo "<table border='1' cellpadding='6' style='margin-top:0.5rem;'>";
    echo "<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default</th></tr>";
    while ($col = mysqli_fetch_assoc($describe)) {
        echo "<tr>";
        echo "<td>" . $col['Field'] . "</td>";
        echo "<td>" . $col['Type'] . "</td>";
        echo "<td>" . $col['Null'] . "</td>";
        echo "<td>" . $col['Key'] . "</td>";
        echo "<td>" . $col['Default'] . "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "<p>Cannot describe talent_applications: " . mysqli_error($connection) . "</p>";
}

// Show last 50 lines of log file if exists
$logFile = __DIR__ . '/logs/talent_apply.log';
echo "<h3>talent_apply.log (last entries)</h3>";
if (file_exists($logFile)) {
    $lines = explode("\n", trim(file_get_contents($logFile)));
    $last = array_slice($lines, -50);
    echo "<pre style='background:#f8f9fa;padding:0.75rem;border-radius:6px;'>" . htmlspecialchars(implode("\n", $last)) . "</pre>";
} else {
    echo "<p>No log file found at logs/talent_apply.log</p>";
}

mysqli_close($connection);
?>
