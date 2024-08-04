<?php
require 'config.php';

session_start();

$error_message = ''; // Initialize an empty error message variable

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare the SQL statement
    $sql = "SELECT id, password, user_type FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);

    // Check if the statement was prepared correctly
    if ($stmt === false) {
        $error_message = "Error preparing statement: " . $conn->error;
    } else {
        // Bind parameters
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($id, $hashed_password, $user_type);

        // Fetch the result and verify the password
        if ($stmt->fetch() && password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['user_type'] = $user_type;

            // Redirect based on user type
            if ($user_type == 'admin') {
                header("Location: admin_dashboard.php");
                exit(); // Ensure the script stops executing after redirection
            } else {
                header("Location: dashboard.php");
                exit(); // Ensure the script stops executing after redirection
            }
        } else {
            $error_message = "Invalid username or password!";
        }

        // Close the statement
        $stmt->close();
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            background: linear-gradient(135deg, #6e45e2, #88d3ce);
            /* Match gradient colors from home page */
            background-size: 200% 200%;
            animation: gradientShift 15s ease infinite;
        }

        @keyframes gradientShift {
            0% {
                background-position: 0% 0%;
            }

            50% {
                background-position: 100% 100%;
            }

            100% {
                background-position: 0% 0%;
            }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
            width: 100%;
            max-width: 400px;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 1s ease-out;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 60%);
            animation: moveBackground 15s linear infinite;
            z-index: 0;
        }

        .login-container h1 {
            text-align: center;
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
            font-weight: 700;
            position: relative;
            z-index: 1;
            animation: slideInFromTop 1s ease-out;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #6e45e2;
            /* Use the same color as the gradient */
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
            transition: all 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .login-container input[type="text"]:focus,
        .login-container input[type="password"]:focus {
            border-color: #88d3ce;
            /* Use the same color as the gradient */
            outline: none;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.3);
        }

        .login-container input[type="submit"] {
            width: 100%;
            padding: 12px;
            background-color: #6e45e2;
            /* Use the same color as the gradient */
            border: none;
            border-radius: 8px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .login-container input[type="submit"]:hover {
            background-color: #88d3ce;
            /* Use the same color as the gradient */
            transform: scale(1.05);
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 20px;
            font-size: 24px;
            /* Make the error message larger */
            font-weight: 700;
            position: relative;
            z-index: 1;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInFromTop {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes moveBackground {
            0% {
                background-position: 0% 0%;
            }

            100% {
                background-position: 100% 100%;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>
        <?php if (!empty($error_message)) {
            echo "<div class='error'>$error_message</div>";
        } ?>
    </div>
</body>

</html>