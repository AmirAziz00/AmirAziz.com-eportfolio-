<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO interests (title, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $description);

    if ($stmt->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        $error = "Failed to add interest.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Interest</title>
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
            width: 500px;
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

.button:hover {
  background-color: cyan;
  color: black;
}
    </style>
</head>
<body>

<h2>Add New Interest</h2>

<form method="POST">
    <label>Title:</label>
    <input type="text" name="title" required>

    <label>Description:</label>
    <textarea name="description" rows="4" required></textarea>

    <button type="submit">Add Interest</button>
</form>

<?php if (isset($error)): ?>
    <div class="error"><?= $error ?></div>
<?php endif; ?>

<a href="admin.php" class="button">Back to Admin View</a>

</body>
</html>