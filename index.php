<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Simple Website</title>
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
      text-align: center;
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

    #home h1 {
      text-align: center;
      font-size: 48px;
      margin-top: 100px;
      font-family: 'Raleway', sans-serif;
      font-weight: 700;
      animation: fadeInDown 1s ease-in-out;
      color: #333;
      text-shadow: 3px 3px 4px rgba(0, 0, 0, 0.2);
    }

    #home p {
      text-align: center;
      font-size: 24px;
      margin-bottom: 40px;
      animation: fadeInDown 1s ease-in-out 0.5s;
      color: #666;
      font-family: 'Raleway', sans-serif;
      font-weight: 300;
      text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2);
    }

    .srbt1,
    .srbt2,
    .srbt3 {
      font-size: 20px;
      padding: 12px 25px;
      border: none;
      margin: 10px;
      transition: background-color 0.3s, transform 0.3s, box-shadow 0.3s;
      cursor: pointer;
      border-radius: 30px;
      animation: bounce 2s infinite;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      background-color: #3498db;
      color: white;
      font-weight: bold;
      text-transform: uppercase;
      font-family: 'Roboto', sans-serif;
    }

    .srbt1:hover,
    .srbt2:hover,
    .srbt3:hover {
      background-color: #2980b9;
      transform: scale(1.1) rotate(3deg);
      box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }

    footer {
      background-color: #3498db;
      color: white;
      text-align: center;
      padding: 10px 0;
      position: fixed;
      width: calc(100% - 200px);
      bottom: 0;
      left: 200px;
      animation: slideInUp 0.5s ease-in-out;
      box-shadow: -2px -2px 5px rgba(0, 0, 0, 0.1);
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

    @keyframes fadeIn {
      from {
        opacity: 0;
      }

      to {
        opacity: 1;
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

    @keyframes slideInUp {
      from {
        transform: translateY(100%);
      }

      to {
        transform: translateY(0);
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

    @keyframes bounce {

      0%,
      20%,
      50%,
      80%,
      100% {
        transform: translateY(0);
      }

      40% {
        transform: translateY(-15px);
      }

      60% {
        transform: translateY(-10px);
      }
    }

    .bubble {
      width: 200px;
      height: 200px;
      position: absolute;
      top: 20%;
      left: 50%;
      background: rgba(52, 152, 219, 0.2);
      border-radius: 50%;
      animation: float 6s ease-in-out infinite;
      z-index: -1;
    }

    .bubble2 {
      width: 150px;
      height: 150px;
      position: absolute;
      top: 60%;
      left: 20%;
      background: rgba(52, 152, 219, 0.2);
      border-radius: 50%;
      animation: float 8s ease-in-out infinite;
      z-index: -1;
    }

    @keyframes float {
      0% {
        transform: translateY(0);
      }

      50% {
        transform: translateY(-20px);
      }

      100% {
        transform: translateY(0);
      }
    }

    .certificate {
      position: absolute;
      width: 100px;
      height: 80px;
      background: #fff;
      border: 2px solid #3498db;
      border-radius: 10px;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
      animation: flyIn 5s ease-in-out infinite;
      transform-origin: center;
      z-index: -1;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 16px;
      color: #3498db;
      font-family: 'Courier New', Courier, monospace;
      text-align: center;
      background: linear-gradient(135deg, #ffffff, #e0f7fa);
    }

    .certificate:nth-child(2) {
      left: 10%;
      top: 30%;
      animation-delay: 1s;
    }

    .certificate:nth-child(3) {
      left: 70%;
      top: 50%;
      animation-delay: 2s;
    }

    .certificate:nth-child(4) {
      left: 30%;
      top: 70%;
      animation-delay: 3s;
    }

    @keyframes flyIn {
      0% {
        transform: translateY(60vh) rotate(-15deg);
        opacity: 0;
      }

      50% {
        opacity: 1;
      }

      100% {
        transform: translateY(0) rotate(0deg);
        opacity: 0;
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
    <section id="home">
      <h1>Faculty Student Development Program</h1>
      <p>Centralized Certificate Collection</p>
    </section>
    <center>
      <a href="login.php"><button type="submit" class="srbt1">User</button></a>
      <a href="admin_login.php"><button type="submit" class="srbt2">Admin Login</button></a>
      <a href="register.php"><button type="submit" class="srbt3">Register</button></a>
    </center>
    <div class="bubble"></div>
    <div class="bubble2"></div>
    <div class="certificate">Certificate</div>
    <div class="certificate">Certificate</div>
    <div class="certificate">Certificate</div>
    <div class="certificate">Certificate</div>
  </main>
  <footer>
    <?php include 'footer.php'; ?>
  </footer>
</body>

</html>