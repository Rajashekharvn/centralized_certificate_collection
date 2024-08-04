<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Contact Us - Simple Website</title>
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
    }

    section {
      margin: 50px 0;
    }

    #contact {
      letter-spacing: 1px;
      animation: fadeInDown 1s ease-in-out;
    }

    #contact h1 {
      text-align: center;
      font-size: 48px;
      font-family: 'Raleway', sans-serif;
      font-weight: 700;
      color: #333;
      text-shadow: 3px 3px 4px rgba(0, 0, 0, 0.2);
    }

    #contact p {
      text-align: center;
      font-size: 24px;
      color: #666;
      font-family: 'Raleway', sans-serif;
      font-weight: 300;
      text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.2);
    }

    #contact h2 {
      font-size: 28px;
      color: #3498db;
      font-family: 'Raleway', sans-serif;
      font-weight: 600;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.2);
    }

    #contact ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
    }

    #contact li {
      font-size: 18px;
      margin: 10px 0;
    }

    #contact form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      max-width: 600px;
      margin: 0 auto;
    }

    #contact label {
      font-size: 18px;
      color: #333;
    }

    #contact input[type="text"],
    #contact input[type="email"],
    #contact textarea {
      font-family: 'Roboto', sans-serif;
      font-size: 16px;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      width: 100%;
      box-sizing: border-box;
    }

    #contact button {
      font-size: 18px;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      background-color: #3498db;
      color: white;
      cursor: pointer;
      transition: background-color 0.3s, box-shadow 0.3s;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    #contact button:hover {
      background-color: #2980b9;
      box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
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
    <section id="contact">
      <h1 class="navv">Contact Us</h1>
      <p>
        We're here to help! If you have any questions, concerns, or feedback,
        please reach out to us using the information below.
      </p>

      <h2>Contact Information</h2>
      <ul>
        <li>
          <p>
            Email:
            <a href="mailto:support@certificatecollection.com">support@certificatecollection.com</a>
          </p>
        </li>
        <li>
          <p>Phone: +1 (123) 456-7890</p>
        </li>
        <li>
          <p>Office Hours: Monday to Friday, 9 AM - 5 PM</p>
        </li>
        <li>
          <p>
            Address: 123 Certificate Lane, EduCity, Knowledge State, 45678
          </p>
        </li>
      </ul>

      <h2>Send Us a Message</h2>
      <form action="submit_form.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required />

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required />

        <label for="subject">Subject:</label>
        <input type="text" id="subject" name="subject" required />

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="4" required></textarea>

        <button type="submit">Send Message</button>
      </form>

      <p>We aim to respond to all inquiries within 24 hours.</p>
    </section>
  </main>
</body>

</html>