<?php
include 'db_connection.php';
$result = $conn->query("SELECT * FROM achievements");
?>

<!DOCTYPE html>
<html>
<head>
<title>MY_QUALIFICATION</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html, body {
  background-color: #D4AF37;
  font-family: cursive;
}

.header-bar {
  text-align: center;
  color: #D4AF37;
  background-color: #8e8e8e;
  padding: 10px 0;
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
  color: white;
}

p {
  font-size: 150%;
  padding: 30px;
  text-align: center;
}

.qualifications-grid {
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 20px;
  padding: 30px;
}

.qualification-card {
  background-color: white;
  color: black;
  width: 500px;
  margin: 20px auto;
  padding: 20px;
  border-radius: 15px;
  box-shadow: 0 0 10px rgba(0,0,0,0.2);
  font-family: cursive;
  text-align: center; /* This centers all text inside */
}
.qualification-card h3 {
  margin-bottom: 10px;
}
.qualification-card p {
  margin-bottom: 5px;
  font-size: 16px;
  color: #333;
}
</style>
</head>
<body>

<div class="header-bar">
  <h1>MY QUALIFICATION</h1>
  <div class="nav-bar">
    <ul>
      <li><a href="ABOUT_ME_PAGE.php">ABOUT ME</a></li>
      <li><a href="MY_INTEREST_PAGE.php">MY INTEREST</a></li>
      <li><a href="MY_EDUCATION_PAGE.php">MY EDUCATION</a></li>
      <li><a href="MY_ACTIVITIES_PAGE.php">MY ACTIVITIES</a></li>
      <li><a href="Index.php">HOME</a></li>
    </ul>
  </div>
</div>

<p>Here are the qualifications and skills I have gained over the years:</p>

<div class="qualifications-grid">
  <?php while($row = $result->fetch_assoc()): ?>
    <div class="qualification-card">
      <h3><?= htmlspecialchars($row['title']) ?></h3>
      <p><strong><?= htmlspecialchars($row['year']) ?></strong></p>
      <p><?= nl2br(htmlspecialchars($row['description'])) ?></p>
    </div>
  <?php endwhile; ?>
</div>

</body>
</html>