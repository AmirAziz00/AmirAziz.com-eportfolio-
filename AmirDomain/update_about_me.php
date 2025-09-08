<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connection.php';

// Fetch current data
$result = $conn->query("SELECT * FROM about_me LIMIT 1");
$about = $result->fetch_assoc();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $title = $_POST['title'];
    $birthdate = $_POST['birthdate'];
    $location = $_POST['location'];
    $family = $_POST['family'];
    $education = $_POST['education'];
    $skills = $_POST['skills'];
    $goals = $_POST['goals'];

    $stmt = $conn->prepare("UPDATE about_me SET name=?, title=?, birthdate=?, location=?, family=?, education=?, skills=?, goals=? WHERE id=?");
    $stmt->bind_param("ssssssssi", $name, $title, $birthdate, $location, $family, $education, $skills, $goals, $about['id']);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        $error = "Failed to update About Me.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update About Me</title>
    <style>
        body {
            background-color: #D4AF37;
            font-family: Arial, sans-serif;
            color: black;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 40px;
        }

        h2 {
            margin-bottom: 30px;
        }

        form {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.2);
            width: 600px;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            font-size: 14px;
        }

        button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: black;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: cyan;
            color: black;
        }

        .error {
            margin-top: 15px;
            color: red;
            font-weight: bold;
        }

        a {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: black;
            text-decoration: underline;
        }
        .button {
        display: inline-block;
        padding: 10px 20px;
        background-color: black;
        color: white;
        text-decoration: none;
        border-radius: 8px;
        font-family: Arial, sans-serif;
        font-size: 14px;
        }
    </style>
</head>
<body>

<h2>Update About Me</h2>

<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($about['name']) ?>" required>

    <label>Title:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($about['title']) ?>" required>

    <label>Birthdate:</label>
    <input type="text" name="birthdate" value="<?= htmlspecialchars($about['birthdate']) ?>" required>

    <label>Location:</label>
    <input type="text" name="location" value="<?= htmlspecialchars($about['location']) ?>" required>

    <label>Family:</label>
    <textarea name="family" rows="2"><?= htmlspecialchars($about['family']) ?></textarea>

    <label>Education:</label>
    <textarea name="education" rows="4"><?= htmlspecialchars($about['education']) ?></textarea>

    <label>Skills:</label>
    <textarea name="skills" rows="4"><?= htmlspecialchars($about['skills']) ?></textarea>

    <label>Career Goals:</label>
    <textarea name="goals" rows="4"><?= htmlspecialchars($about['goals']) ?></textarea>

    <button type="submit">Update</button>
</form>

<?php if (isset($error)): ?>
    <div class="error"><?= $error ?></div>
<?php endif; ?>

<a href="admin.php" class="button">Back to Admin View</a>

</body>
</html>