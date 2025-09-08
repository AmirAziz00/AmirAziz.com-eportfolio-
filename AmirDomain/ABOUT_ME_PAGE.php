<!DOCTYPE html>
<html>
<head>
<title>About Me</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  background-color: #D4AF37;
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
}

.header-bar {
  background-color: #8e8e8e;
  color: #D4AF37;
  text-align: center;
  padding: 20px 0;
  font-family: cursive;
}

.nav-bar ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #D4AF37;
}

.nav-bar li {
  float: right;
}

.nav-bar li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  background-color: black;
}

.nav-bar li a:hover {
  background-color: cyan;
  color: black;
}

.resume-container {
  max-width: 800px;
  margin: 40px auto;
  background-color: white;
  padding: 30px;
  border-radius: 15px;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

.resume-header {
  text-align: center;
  margin-bottom: 30px;
}

.resume-header h1 {
  margin-bottom: 5px;
  font-size: 28px;
  color: #2e8b57;
}

.resume-header h3 {
  font-weight: normal;
  color: #524b4bff;
}

.resume-section {
  margin-bottom: 25px;
}

.resume-section h2 {
  font-size: 20px;
  color: #2e8b57;
  margin-bottom: 10px;
  border-bottom: 1px solid #524b4bff;
  padding-bottom: 5px;
}

.resume-section p,
.resume-section ul {
  font-size: 16px;
  line-height: 1.6;
  color: #333;
}

.resume-section ul {
  list-style-type: disc;
  padding-left: 20px;
}
</style>
</head>
<body>

<div class="header-bar">
  <h1>ABOUT ME</h1>
  <div class="nav-bar">
    <ul>
      <li><a href="MY_INTEREST_PAGE.php">MY INTEREST</a></li>
      <li><a href="MY_QUALIFICATION_PAGE.php">MY QUALIFICATION</a></li>
      <li><a href="MY_EDUCATION_PAGE.php">MY EDUCATION</a></li>
      <li><a href="MY_ACTIVITIES_PAGE.php">MY ACTIVITIES</a></li>
      <li><a href="Index.php">HOME</a></li>
    </ul>
  </div>
</div>

<div class="resume-container">
<div class="resume-header">
  <h1>Amir Aziz</h1>
  <img src="Images/icon.png" alt="Profile Icon" class="profile-icon" width="50%" height="50%">
  <h3>Web Developer & Student</h3>
</div>

  <div class="resume-section">
    <h2>Personal Information</h2>
    <p><strong>Birthdate:</strong> 17 May 2006</p>
    <p><strong>Location:</strong> Puchong, Selangor, Malaysia</p>
    <p><strong>Family:</strong> Youngest of six siblings, living with both parents</p>
    <div class="resume-section">
  <h2>Contact</h2>
  <p>
    <strong>Email:</strong>
  <a href="mailto:amir26aziz@gmail.com?subject=Hello Amir&body=I visited your website and wanted to say hi!">
      amir26aziz@gmail.com
    </a>
  </p>
  </div>

  <div class="resume-section">
    <h2>Education</h2>
    <p><strong>SK TTDI Jaya</strong> – UPSR (2018)</p>
    <p><strong>SMK USJ 13</strong> – SPM (2023)</p>
    <p><strong>Universiti Pendidikan Sultan Idris</strong> – Diploma in Computer Science (2024–Present)</p>
  </div>

  <div class="resume-section">
    <h2>Skills</h2>
    <ul>
      <li>HTML, CSS, PHP, MySQL, Python</li>
      <li>Microsoft Office Suite</li>
      <li>Teamwork & Communication</li>
      <li>Interface Design & Session Management</li>
    </ul>
  </div>

  <div class="resume-section">
    <h2>Career Goals</h2>
    <p>To become a full-stack developer who builds meaningful, user-friendly web applications. I aim to keep improving my skills and create digital experiences that reflect both technical mastery and personal identity.</p>
  </div>
</div>

</body>
</html>