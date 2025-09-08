<?php
include 'db_connection.php';
$interests = $conn->query("SELECT * FROM interests");
?>

<!DOCTYPE html>
<html>
<head>
 <title>MY INTEREST</title>
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  background-color: #D4AF37;
  font-family: cursive;
  color: black;
}

.header-bar {
  text-align: center;
  background-color: #8e8e8e;
  color: #D4AF37;
  padding: 20px 0;
}

.nav-bar ul {
  list-style-type: none;
  background-color: #D4AF37;
  overflow: hidden;
  margin: 0;
  padding: 0;
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

p {
  font-size: 150%;
  text-align: center;
  margin: 30px 0;
}

.interest-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  padding: 20px;
}

.interest-card {
  background-color: white;
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 2px 8px rgba(0,0,0,0.1);
  text-align: center;
}

.interest-card h2 {
  margin-bottom: 15px;
  font-size: 22px;
  color: #2e8b57;
}

.interest-card p {
  font-size: 16px;
  line-height: 1.6;
  color: #333;
}
</style>
</head>
<body>

<div class="header-bar">
  <h1>MY INTEREST</h1>
  <div class="nav-bar">
    <ul>
      <li><a href="ABOUT_ME_PAGE.php">ABOUT ME</a></li>
      <li><a href="MY_QUALIFICATION_PAGE.php">MY QUALIFICATION</a></li>
      <li><a href="MY_EDUCATION_PAGE.php">MY EDUCATION</a></li>
      <li><a href="MY_ACTIVITIES_PAGE.php">MY ACTIVITIES</a></li>
      <li><a href="Index.php">HOME</a></li>
    </ul>
  </div>
</div>

<p>Here are some things that I have interest in:</p>

<div class="interest-grid">
  <?php while($row = $interests->fetch_assoc()): ?>
    <div class="interest-card">
      <h2><?= htmlspecialchars($row['title']) ?></h2>
      <p><?= htmlspecialchars($row['description']) ?></p>
    </div>
  <?php endwhile; ?>
</div>

</body>
</html>