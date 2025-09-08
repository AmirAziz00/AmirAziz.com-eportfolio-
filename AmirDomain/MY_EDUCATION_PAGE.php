<?php
include 'db_connection.php';
$result = $conn->query("SELECT * FROM education");
?>

<!DOCTYPE html>
<html>
<head>
<title>MY_EDUCATION</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
/* Your existing styles remain unchanged */
html, body {
    margin: 0;
    padding: 0;
    background-color: #D4AF37;
    font-family: cursive;
}
.header-bar {
    text-align: center;
    color: #D4AF37;
    background-color: #8e8e8e;
    padding: 10px 0;
}
ul {
    list-style-type: none;
    overflow: hidden;
    background-color: #D4AF37;
    margin: 0;
    padding: 0;
}
li {
    float: right;
}
li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    background-color: black;
}
li a:hover {
    background-color: cyan;
    color: white;
}
.education-section {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 30px;
    padding: 30px;
}
.edu-card {
    width: 500px;
    background-color: white;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.3);
}
.edu-card h3 {
    margin-bottom: 10px;
    color: black;
}
.edu-card p {
    font-size: 16px;
    color: #333;
}
</style>
</head>
<body>

<div class="header-bar">
    <h1>MY EDUCATION</h1>
    <ul>
        <li><a href="ABOUT_ME_PAGE.php">ABOUT ME</a></li>
        <li><a href="MY_INTEREST_PAGE.php">MY INTEREST</a></li>
        <li><a href="MY_QUALIFICATION_PAGE.php">MY QUALIFICATION</a></li>
        <li><a href="MY_ACTIVITIES_PAGE.php">MY ACTIVITIES</a></li>
        <li><a href="Index.php">HOME</a></li>
    </ul>
</div>

<p style="text-align:center; font-size:150%; margin-top:20px;">Here are all my education I have acquired throughout my life!</p>

<div class="education-section">
<?php while($row = $result->fetch_assoc()): ?>
    <div class="edu-card">
        <h3><?= htmlspecialchars($row['institution']) ?> (<?= htmlspecialchars($row['years']) ?>)</h3>
        <p><?= nl2br(htmlspecialchars($row['description'])) ?></p>
    </div>
<?php endwhile; ?>
</div>

</body>
</html>