<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>About - Simple Website</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700&family=Raleway:wght@300;400;600&display=swap">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            min-height: 100vh;
            flex-direction: column;
            background: linear-gradient(120deg, #ffefba, #ffffff);
            animation: gradientShift 10s ease infinite;
        }

        header {
            background-color: #3498db;
            width: 200px;
            height: 100vh;
            position: fixed;
            animation: slideInLeft 0.5s ease-in-out;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        .navbar {
            list-style-type: none;
            margin: 0;
            padding: 0;
            padding-top: 20px;
        }

        .navbar li {
            margin: 20px 0;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 18px;
            display: block;
            padding: 12px 25px;
            border-radius: 8px;
            transition: background-color 0.3s, color 0.3s, transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .navbar a:hover {
            background-color: #2980b9;
            color: #ffffff;
            transform: translateX(10px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
        }

        main {
            margin-left: 200px;
            padding: 20px;
            flex-grow: 1;
            animation: slideInRight 0.5s ease-in-out;
            position: relative;
            z-index: 0;
        }

        #about {
            letter-spacing: 1px;
            animation: fadeInDown 1s ease-in-out;
        }

        #about h1 {
            text-align: center;
            font-size: 48px;
            margin-top: 100px;
            font-family: 'Raleway', sans-serif;
            font-weight: 700;
            animation: fadeInDown 1s ease-in-out;
            color: #333;
            text-shadow: 3px 3px 4px rgba(0, 0, 0, 0.2);
        }

        #about p {
            text-align: center;
            font-size: 24px;
            margin-bottom: 40px;
            color: #666;
            font-family: 'Raleway', sans-serif;
            font-weight: 300;
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2);
        }

        #about h2 {
            font-size: 28px;
            color: #3498db;
            margin-top: 30px;
            font-family: 'Raleway', sans-serif;
            font-weight: 600;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
        }

        #about ul {
            list-style-type: square;
            margin: 0 auto;
            padding: 0;
            width: fit-content;
        }

        #about li {
            font-size: 18px;
            margin: 10px 0;
        }

        @keyframes gradientShift {
            0% {
                background: linear-gradient(120deg, #ffefba, #ffffff);
            }

            50% {
                background: linear-gradient(120deg, #ffefba, #3498db);
            }

            100% {
                background: linear-gradient(120deg, #ffefba, #ffffff);
            }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
            }

            to {
                transform: translateX(0);
            }
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul class="navbar">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="contact.php">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <section id="about">
            <h1>About Us</h1>
            <p>Welcome to the Faculty-Student Certificate Collection website! Our platform is designed to streamline the
                process of managing and collecting certificates for students and faculty members alike.</p>

            <h2>Our Mission</h2>
            <p>Our mission is to simplify the certificate collection process, making it more efficient and accessible
                for everyone involved. We aim to provide a secure and user-friendly platform that meets the needs of both students and faculty.</p>

            <h2>Features</h2>
            <ul>
                <li>Secure access for both students and faculty.</li>
                <li>Easy upload and management of certificates.</li>
                <li>Streamlined communication between faculty and students.</li>
                <li>Organized certificate storage and retrieval.</li>
            </ul>

            <h2>Benefits</h2>
            <p>Our website offers numerous benefits:</p>
            <ul>
                <li>For students: Quick and easy access to all your certificates in one place.</li>
                <li>For faculty: Efficient management of student certificates, saving time and effort.</li>
                <li>Enhanced organization and record-keeping for both students and faculty.</li>
            </ul>
        </section>
    </main>
</body>

</html>