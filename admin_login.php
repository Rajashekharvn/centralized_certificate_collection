<?php
require 'config.php';

session_start();

$error_message = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the user is admin
    if ($username == 'admin' && $password == 'admin@123') { // Replace with secure credentials
        $_SESSION['admin'] = true;
        header("Location: admin_dashboard.php");
    } else {
        $error_message = "Invalid admin credentials!";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #007bff;
            /* Blue background color */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            position: relative;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .floating-box {
            position: absolute;
            width: 120px;
            height: 120px;
            background-color: rgba(255, 255, 255, 0.2);
            /* Semi-transparent white */
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
            z-index: 0;
            /* Place behind the form */
        }

        @keyframes float {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-40px);
            }

            100% {
                transform: translateY(0);
            }
        }

        .floating-box:nth-child(1) {
            top: 10%;
            left: 15%;
            animation-duration: 8s;
            animation-delay: 0s;
        }

        .floating-box:nth-child(2) {
            top: 50%;
            left: 60%;
            animation-duration: 10s;
            animation-delay: 2s;
        }

        .floating-box:nth-child(3) {
            top: 80%;
            left: 25%;
            animation-duration: 7s;
            animation-delay: 4s;
        }

        form {
            background: linear-gradient(135deg, #ffffff 0%, #f0f0f0 100%);
            /* Gradient background */
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            transform: translateY(20px);
            animation: slideIn 1s ease-out;
            z-index: 1;
            /* Ensure the form is above the floating boxes */
            width: 300px;
            /* Fixed width for the form */
            text-align: center;
            /* Center-align form content */
        }

        @keyframes slideIn {
            from {
                transform: translateY(20px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin: 10px 0 5px;
            color: #333;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 22px);
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.4);
            outline: none;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .error {
            color: red;
            font-weight: bold;
            margin-top: 20px;
            font-size: 18px;
            /* Larger font size */
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="floating-box"></div>
    <div class="floating-box"></div>
    <div class="floating-box"></div>
    <form action="admin_login.php" method="post">
        <h2>Admin Login</h2>
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <input type="submit" value="Login">
        <?php if ($error_message) : ?>
            <p class="error"><?php echo htmlspecialchars($error_message); ?></p>
        <?php endif; ?>
    </form>
</body>

</html>