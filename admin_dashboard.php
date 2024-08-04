<?php
require 'config.php';
session_start();

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #007bff;
            /* Blue background color */
            padding: 20px;
            margin: 0;
            overflow: auto;
            /* Enable scrolling */
            position: relative;
        }

        h1 {
            text-align: center;
            color: #fff;
        }

        .section-title {
            margin-top: 20px;
            margin-bottom: 10px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-sizing: border-box;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        input[type="text"]:focus {
            border-color: #007bff;
            box-shadow: 0 0 8px rgba(0, 123, 255, 0.4);
            outline: none;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            /* background-color: #333333; */
            color: black;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .logout-button {
            background-color: #f44336;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            display: inline-block;
            margin-bottom: 20px;
            transition: background-color 0.3s ease, transform 0.3s ease;
            font-size: 16px;
        }

        .logout-button:hover {
            background-color: #d32f2f;
            transform: scale(1.05);
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
    </style>
    <script>
        function searchUsers(inputId, tableId) {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById(inputId);
            filter = input.value.toUpperCase();
            table = document.getElementById(tableId);
            tr = table.getElementsByTagName("tr");

            for (i = 1; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[1];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>
</head>

<body>
    <div class="floating-box"></div>
    <div class="floating-box"></div>
    <div class="floating-box"></div>

    <h1>All Users and Certificates</h1>
    <a href="?logout=true" class="logout-button">Logout</a>

    <h2 class="section-title">Faculty</h2>
    <!-- Search Form for Faculty -->
    <input type="text" id="searchFaculty" onkeyup="searchUsers('searchFaculty', 'facultyTable')" placeholder="Search faculty by username">

    <table id="facultyTable" class="usersTable">
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Certificates</th>
        </tr>
        <?php
        $sql = "SELECT users.id, users.username, certificates.certificate_name, certificates.certificate_path 
                FROM users 
                LEFT JOIN certificates ON users.id = certificates.user_id 
                WHERE users.user_type = 'faculty'
                ORDER BY users.username";
        $result = $conn->query($sql);

        $current_user_id = null;
        $user_data = [];

        while ($row = $result->fetch_assoc()) {
            if ($current_user_id !== $row['id']) {
                if ($current_user_id !== null) {
                    echo "<tr><td>" . $current_user_id . "</td><td>" . htmlspecialchars($user_data['username']) . "</td><td>" . implode(", ", $user_data['certificates']) . "</td></tr>";
                }
                $current_user_id = $row['id'];
                $user_data = [
                    'username' => $row['username'],
                    'certificates' => []
                ];
            }
            if ($row['certificate_name'] && $row['certificate_path']) {
                $user_data['certificates'][] = htmlspecialchars($row['certificate_name']) . ": <a href='" . htmlspecialchars($row['certificate_path']) . "' target='_blank'>View Certificate</a>";
            }
        }
        if ($current_user_id !== null) {
            echo "<tr><td>" . $current_user_id . "</td><td>" . htmlspecialchars($user_data['username']) . "</td><td>" . implode(", ", $user_data['certificates']) . "</td></tr>";
        }
        ?>
    </table>

    <h2 class="section-title">Students</h2>
    <!-- Search Form for Students -->
    <input type="text" id="searchStudent" onkeyup="searchUsers('searchStudent', 'studentTable')" placeholder="Search students by username">

    <table id="studentTable" class="usersTable">
        <tr>
            <th>User ID</th>
            <th>Username</th>
            <th>Certificates</th>
        </tr>
        <?php
        $sql = "SELECT users.id, users.username, certificates.certificate_name, certificates.certificate_path 
                FROM users 
                LEFT JOIN certificates ON users.id = certificates.user_id 
                WHERE users.user_type = 'student'
                ORDER BY users.username";
        $result = $conn->query($sql);

        $current_user_id = null;
        $user_data = [];

        while ($row = $result->fetch_assoc()) {
            if ($current_user_id !== $row['id']) {
                if ($current_user_id !== null) {
                    echo "<tr><td>" . $current_user_id . "</td><td>" . htmlspecialchars($user_data['username']) . "</td><td>" . implode(", ", $user_data['certificates']) . "</td></tr>";
                }
                $current_user_id = $row['id'];
                $user_data = [
                    'username' => $row['username'],
                    'certificates' => []
                ];
            }
            if ($row['certificate_name'] && $row['certificate_path']) {
                $user_data['certificates'][] = htmlspecialchars($row['certificate_name']) . ": <a href='" . htmlspecialchars($row['certificate_path']) . "' target='_blank'>View Certificate</a>";
            }
        }
        if ($current_user_id !== null) {
            echo "<tr><td>" . $current_user_id . "</td><td>" . htmlspecialchars($user_data['username']) . "</td><td>" . implode(", ", $user_data['certificates']) . "</td></tr>";
        }

        $conn->close();
        ?>
    </table>
</body>

</html>