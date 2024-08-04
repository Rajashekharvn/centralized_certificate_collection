<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link rel="stylesheet" href="./CSS/register.css">
</head>

<body>
    <div class="floating-box"></div>
    <div class="floating-box"></div>
    <div class="floating-box"></div>

    <form action="register.php" method="post" enctype="multipart/form-data">
        <h2>Register</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="user_type">User Type:</label>
        <select id="user_type" name="user_type" required>
            <option value="Student">Student</option>
            <option value="Faculty">Faculty</option>
        </select>
        <input type="submit" value="Register">
    </form>
</body>

</html>

<?php
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $user_type = $_POST['user_type'];

    // Prepare the SQL statement
    $sql = "INSERT INTO users (username, password, user_type) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared correctly
    if ($stmt === false) {
        echo "<div class='error'>Error preparing statement: " . $conn->error . "</div>";
    } else {
        // Bind parameters
        $stmt->bind_param("sss", $username, $password, $user_type);

        // Execute the statement and check for errors
        if ($stmt->execute()) {
            header("Location: index.php");
        } else {
            echo "<div class='error'>Error executing statement: " . $stmt->error . "</div>";
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
}
?>