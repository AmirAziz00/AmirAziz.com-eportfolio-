<!DOCTYPE html>
<html>
<head>
  <title>Welcome to Amir's Domain</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #D4AF37;
      font-family: cursive;
      color: black;
    }

    .header-bar {
      background-color: #8e8e8e;
      padding: 20px 0;
      text-align: center;
    }

    .header-bar h1 {
      margin: 0;
      color: #2e8b57;
      font-size: 36px;
    }

    .nav-bar ul {
      list-style-type: none;
      margin: 0;
      padding: 0;
      background-color: #D4AF37;
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
    }

    .nav-bar li {
      margin: 0 10px;
    }

    .nav-bar li a {
      display: block;
      color: white;
      background-color: black;
      padding: 12px 18px;
      text-decoration: none;
      border-radius: 8px;
    }

    .nav-bar li a:hover {
      background-color: cyan;
      color: black;
    }

    .Icon {
      display: flex;
      justify-content: center;
      margin-top: 30px;
    }

    .profile-pic {
      width: 200px;
      height: 200px;
      border-radius: 50%;
      object-fit: cover;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }

    .welcome-box {
      text-align: center;
      margin: 40px auto;
      max-width: 700px;
      padding: 30px;
      background-color: white;
      border-radius: 15px;
      box-shadow: 0 0 10px rgba(0,0,0,0.2);
    }

    .welcome-box h2 {
      font-size: 28px;
      margin-bottom: 10px;
      color: #2e8b57;
    }

    .welcome-box p {
      font-size: 18px;
      color: #333;
      margin-bottom: 20px;
    }

    .button-grid {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 15px;
    }

    .button-grid a {
      background-color: black;
      color: white;
      padding: 12px 20px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 16px;
    }

    .button-grid a:hover {
      background-color: cyan;
      color: black;
    }
  </style>
</head>
<body>

  <div class="Icon">
    <img src="Images/icon.png" alt="Amir" class="profile-pic">
  </div>

  <div class="welcome-box">
    <h2>Welcome to My Domain!</h2>
    <p>My name is Amir Aziz, Feel free to explore my journey, skills, and passions through the sections below.</p>
    <div class="button-grid">
      <a href="ABOUT_ME_PAGE.php">About Me</a>
      <a href="MY_EDUCATION_PAGE.php">Education</a>
      <a href="MY_QUALIFICATION_PAGE.php">Qualifications</a>
      <a href="MY_ACTIVITIES_PAGE.php">Activities</a>
      <a href="MY_INTEREST_PAGE.php">Interests</a>
    </div>
  </div>

</body>
</html>