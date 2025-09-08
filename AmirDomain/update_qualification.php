<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_login.php");
    exit();
}

include 'db_connection.php';

// Get the ID from the URL
$id = $_GET['id'] ?? null;
if (!$id) {
    echo "Invalid request.";
    exit();
}

// Fetch current data
$stmt = $conn->prepare("SELECT * FROM achievements WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$qualification = $result->fetch_assoc();

if (!$qualification) {
    echo "Qualification entry not found.";
    exit();
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $year = $_POST['year'];
    $description = $_POST['description'];

    $update = $conn->prepare("UPDATE achievements SET title = ?, year = ?, description = ? WHERE id = ?");
    $update->bind_param("sssi", $title, $year, $description, $id);

    if ($update->execute()) {
        header("Location: admin.php");
        exit();
    } else {
        $error = "Failed to update qualification.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Qualification</title>
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

<h2>Update Qualification Entry</h2>

<form method="POST" action="">
    <label for="title">Qualification Title:</label>
    <input type="text" name="title" value="<?= htmlspecialchars($qualification['title']) ?>" required>

    <label for="year">Years:</label>
    <input type="text" name="year" value="<?= htmlspecialchars($qualification['year']) ?>" required>

    <label for="description">Description:</label>
    <textarea name="description" rows="5" required><?= htmlspecialchars($qualification['description']) ?></textarea>

    <button type="submit">Update Qualification</button>
</form>

<?php if (isset($error)): ?>
    <div class="error"><?= $error ?></div>
<?php endif; ?>

<a href="admin.php" class="button">Back to Admin View</a>

</body>
</html>