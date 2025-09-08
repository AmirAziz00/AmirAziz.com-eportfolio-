<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO achievements (title, year, description) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $year, $description);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        $error = "Failed to add qualification.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Qualification</title>
    <style>
        body {
            background-color: #D4AF37;
            font-family: Arial, sans-serif;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding-top: 50px;
        }

        h2 {
            color: white;
            margin-bottom: 30px;
        }

        form {
            background-color: rgba(255, 255, 255, 0.1);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            width: 400px;
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
            border: none;
            border-radius: 5px;
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
            color: #ffdddd;
            font-weight: bold;
        }

        a {
            display: block;
            margin-top: 20px;
            color: white;
            text-decoration: underline;
            text-align: center;
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

<h2>Add New Qualification</h2>

<form method="POST" action="add_qualification.php">
    <label for="title">Qualification Title:</label>
    <input type="text" name="title" required>

    <label for="year">Year:</label>
    <input type="text" name="year" required>

    <label for="description">Description:</label>
    <textarea name="description" rows="5" required></textarea>

    <button type="submit">Add Qualification</button>
</form>

<?php if (isset($error)): ?>
    <div class="error"><?= $error ?></div>
<?php endif; ?>

<a href="admin.php" class="button">Back to Admin View</a>

</body>
</html>