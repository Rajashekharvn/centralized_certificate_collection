<?php
require 'config.php';
session_start();

$user_id = $_SESSION['user_id'];

// Fetch the username from the database
$displayUsername = '';

$sql = "SELECT username FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
    $displayUsername = htmlspecialchars($row['username']);
}

$stmt->close();

// Logout functionality
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required fields are set
    if (
        isset($_POST['certificate_name']) &&
        isset($_POST['course_start_date']) &&
        isset($_POST['course_end_date']) &&
        isset($_POST['certificate_description']) &&
        isset($_FILES['certificate'])
    ) {
        $certificate_name = $_POST['certificate_name'];
        $course_start_date = $_POST['course_start_date'];
        $course_end_date = $_POST['course_end_date'];
        $certificate_description = $_POST['certificate_description'];
        $file = $_FILES['certificate'];

        if ($file['error'] !== UPLOAD_ERR_OK) {
            echo 'An error occurred while uploading the file.';
            exit;
        }

        $fileName = $file['name'];
        $filePath = $file['tmp_name'];
        $folderPath = '/Profile'; // Specify the folder path here

        // Replace 'your_private_api_key' with your actual private API key from ImageKit.io
        $privateApiKey = 'private_efxCGQMiGGtGBMe+XJseMZwB2FY=';
        $uploadEndpoint = 'https://upload.imagekit.io/api/v1/files/upload';

        $formData = [
            'file' => new CURLFile($filePath, $file['type'], $fileName),
            'fileName' => $fileName,
            'folder' => $folderPath
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $uploadEndpoint);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $formData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Basic ' . base64_encode($privateApiKey . ':')
        ]);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $responseData = json_decode($response, true);

        if ($httpCode == 200 && isset($responseData['url'])) {
            $certificateUrl = $responseData['url'];

            $sql = "INSERT INTO certificates (user_id, certificate_name, course_start_date, course_end_date, certificate_description, certificate_path) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);

            if ($stmt === false) {
                // Output the SQL error
                die("Error preparing statement: " . $conn->error);
            }

            $stmt->bind_param("ssssss", $user_id, $certificate_name, $course_start_date, $course_end_date, $certificate_description, $certificateUrl);

            if ($stmt->execute()) {
                echo "<div class='success'>Certificate uploaded successfully!</div>";
            } else {
                echo "<div class='error'>Error: " . $stmt->error . "</div>";
            }

            $stmt->close();
        } else {
            echo 'Error uploading file: ' . ($responseData['message'] ?? 'Unknown error');
        }
    } else {
        echo "<div class='error'>Required fields are missing.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&display=swap">
    <link rel="stylesheet" href="./CSS/dashboard.css">
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
            document.getElementById('course_start_date').setAttribute('max', today);
            document.getElementById('course_end_date').setAttribute('max', today);
        });
    </script>
</head>

<body>
    <div class="container">
        <h1>Dashboard</h1>
        <h2>Welcome, <?php echo $displayUsername; ?></h2>
        <form action="dashboard.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm();">
            <label for="certificate_name">Certificate Name:</label>
            <input type="text" id="certificate_name" name="certificate_name" required><br>
            <label for="course_start_date">Course Start Date:</label>
            <input type="date" id="course_start_date" name="course_start_date" required><br>
            <label for="course_end_date">Course End Date:</label>
            <input type="date" id="course_end_date" name="course_end_date" required><br>
            <label for="certificate_description">Certificate Description:</label>
            <input type="text" id="certificate_description" name="certificate_description" required><br>
            <label for="certificate">Upload Certificate:</label>
            <input type="file" id="certificate" name="certificate" required><br>
            <input type="submit" value="Upload">
        </form>

        <div class="loading-animation" id="loadingAnimation"></div>
        <script>
            const form = document.querySelector('form'); // Select the form element
            const loadingAnimation = document.getElementById('loadingAnimation');

            form.addEventListener('submit', function() {
                loadingAnimation.style.display = 'block'; // Show the loading animation
            });
        </script>

        <h2>Your Certificates:</h2>
        <?php
        // Fetch and display the certificates
        $sql = "SELECT certificate_name, certificate_path FROM certificates WHERE user_id = ?";
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            echo "<div class='certificate'>";
            echo "<p><strong>" . htmlspecialchars($row['certificate_name']) . "</strong></p>";
            echo "<p><a href='" . htmlspecialchars($row['certificate_path']) . "' target='_blank'>View Certificate</a></p>";
            echo "</div>";
        }

        $stmt->close();
        $conn->close();
        ?>

        <a href="?logout" class="logout-button">Logout</a>
    </div>

    <script>
        function validateForm() {
            const certificateName = document.getElementById('certificate_name').value;
            const courseStartDate = document.getElementById('course_start_date').value;
            const courseEndDate = document.getElementById('course_end_date').value;
            const certificateDescription = document.getElementById('certificate_description').value;
            const certificate = document.getElementById('certificate').value;

            const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format

            if (!certificateName) {
                alert('Please enter the certificate name.');
                return false;
            }
            if (!courseStartDate) {
                alert('Please enter the course start date.');
                return false;
            }
            if (!courseEndDate) {
                alert('Please enter the course end date.');
                return false;
            }
            if (new Date(courseEndDate) < new Date(courseStartDate)) {
                alert('Course end date cannot be before the start date.');
                return false;
            }
            if (courseStartDate >= today) {
                alert('Course start date must be before today\'s date.');
                return false;
            }
            if (courseEndDate >= today) {
                alert('Course end date must be before today\'s date.');
                return false;
            }
            if (!certificateDescription) {
                alert('Please enter the certificate description.');
                return false;
            }
            if (!certificate) {
                alert('Please upload the certificate.');
                return false;
            }
            return true;
        }
    </script>
</body>

</html>