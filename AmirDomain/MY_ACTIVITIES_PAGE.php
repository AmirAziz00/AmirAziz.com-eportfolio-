<?php
include 'db_connection.php';
$activities = $conn->query("SELECT * FROM activities");
?>

<!DOCTYPE html>
<html>
<head>
<title>MY ACTIVITIES</title>
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

.activities-container {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 30px;
  margin-bottom: 60px;
}

.activity-block {
  width: 600px;
  background-color: white;
  border-radius: 20px;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
  padding: 20px;
  text-align: center;
}

.activity-block h2 {
  font-size: 24px;
  margin-bottom: 15px;
  color: black;
}

.activity-block p {
  font-size: 16px;
  line-height: 1.6;
  color: #333;
}
</style>
</head>
<body>

<div class="header-bar">
  <h1>MY ACTIVITIES</h1>
  <div class="nav-bar">
    <ul>
      <li><a href="ABOUT_ME_PAGE.php">ABOUT ME</a></li>
      <li><a href="MY_INTEREST_PAGE.php">MY INTEREST</a></li>
      <li><a href="MY_QUALIFICATION_PAGE.php">MY QUALIFICATION</a></li>
      <li><a href="MY_EDUCATION_PAGE.php">MY EDUCATION</a></li>
      <li><a href="Index.php">HOME</a></li>
    </ul>
  </div>
</div>

<p>Here are some activities I enjoy doing when I have leisure time!</p>

<div class="activities-container">
  <?php while($row = $activities->fetch_assoc()): ?>
    <div class="activity-block">
      <h2><?= htmlspecialchars($row['title']) ?></h2>
      <p><?= htmlspecialchars($row['description']) ?></p>
    </div>
  <?php endwhile; ?>
</div>

</body>
</html>