<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connection.php';

// Fetch data
$education = $conn->query("SELECT * FROM education");
$achievements = $conn->query("SELECT * FROM achievements");
$activities = $conn->query("SELECT * FROM activities");
$interests = $conn->query("SELECT * FROM interests");
$about = $conn->query("SELECT * FROM about_me LIMIT 1")->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin_View</title>
    <style>
        body {
    background-color: #D4AF37;
    font-family: cursive;
    margin: 0;
    padding: 40px;
    color: black;
}

h2 {
    text-align: center;
    margin-bottom: 30px;
    font-size: 28px;
    color: white;
}

h3 {
    margin-top: 40px;
    font-size: 22px;
    color: white;
    text-align: center;
}

.button {
    display: inline-block;
    margin: 10px 5px 20px 0;
    padding: 10px 20px;
    background-color: black;
    color: white;
    text-decoration: none;
    border-radius: 8px;
    font-family: Arial, sans-serif;
    font-size: 14px;
}

.button:hover {
    background-color: cyan;
    color: black;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    background-color: white;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
}

th, td {
    padding: 14px;
    border-bottom: 1px solid #ccc;
    text-align: left;
    font-size: 14px;
    font-family: Arial, sans-serif;
}

th {
    background-color: #f0f0f0;
    font-weight: bold;
}

td a.button {
    font-size: 12px;
    padding: 6px 12px;
    margin-right: 5px;
}
    </style>
</head>
<a href="logout.php" class="button" style="float:right;">Logout</a>
<body>

<h2>Welcome to Admin View</h2>

<!-- Education Section -->
<h3>Education</h3>
<a href="add_education.php" class="button">Add New Education</a>
<table>
    <tr>
        <th>ID</th>
        <th>Institution</th>
        <th>Years</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php while($row = $education->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['institution']) ?></td>
        <td><?= htmlspecialchars($row['years']) ?></td>
        <td><?= htmlspecialchars($row['description']) ?></td>
        <td>
            <a href="update_education.php?id=<?= $row['id'] ?>" class="button">Edit</a>
            <a href="delete_education.php?id=<?= $row['id'] ?>" class="button" onclick="return confirm('Delete this education entry?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<!-- Achievements Section -->
<h3>Qualifications</h3>
<a href="add_qualification.php" class="button">Add New Qualification</a>
<table>
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Year</th>
        <th>Description</th>
        <th>Actions</th>
    </tr>
    <?php while($row = $achievements->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= htmlspecialchars($row['title']) ?></td>
        <td><?= htmlspecialchars($row['year']) ?></td>
        <td><?= htmlspecialchars($row['description']) ?></td>
        <td>
            <a href="update_qualification.php?id=<?= $row['id'] ?>" class="button">Edit</a>
            <a href="delete_qualification.php?id=<?= $row['id'] ?>" class="button" onclick="return confirm('Delete this achievement?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>

<h3>Activities</h3>
<a href="add_activity.php" class="button">Add New Activity</a>
<table>
  <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Description</th>
    <th>Actions</th>
  </tr>
  <?php while($row = $activities->fetch_assoc()): ?>
  <tr>
    <td><?= $row['id'] ?></td>
    <td><?= htmlspecialchars($row['title']) ?></td>
    <td><?= htmlspecialchars($row['description']) ?></td>
    <td>
      <a href="update_activity.php?id=<?= $row['id'] ?>" class="button">Edit</a>
      <a href="delete_activity.php?id=<?= $row['id'] ?>" class="button" onclick="return confirm('Delete this activity?')">Delete</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>

<h3>Interests</h3>
<a href="add_interest.php" class="button">Add New Interest</a>
<table>
  <tr>
    <th>ID</th>
    <th>Titles</th>
    <th>Description</th>
    <th>Actions</th>
  </tr>
  <?php while($row = $interests->fetch_assoc()): ?>
  <tr>
    <td><?= $row['id'] ?></td>
    <td><?= htmlspecialchars($row['title']) ?></td>
    <td><?= htmlspecialchars($row['description']) ?></td>
    <td>
      <a href="update_interest.php?id=<?= $row['id'] ?>" class="button">Edit</a>
      <a href="delete_interest.php?id=<?= $row['id'] ?>" class="button" onclick="return confirm('Delete this interest?')">Delete</a>
    </td>
  </tr>
  <?php endwhile; ?>
</table>

<h3>About Me</h3>
<table>
  <tr>
    <th>Name</th>
    <th>Title</th>
    <th>Birthdate</th>
    <th>Location</th>
    <th>Actions</th>
  </tr>
  <tr>
    <td><?= htmlspecialchars($about['name']) ?></td>
    <td><?= htmlspecialchars($about['title']) ?></td>
    <td><?= htmlspecialchars($about['birthdate']) ?></td>
    <td><?= htmlspecialchars($about['location']) ?></td>
    <td><a href="update_about_me.php" class="button">Edit</a></td>
  </tr>
</table>

</body>
</html>