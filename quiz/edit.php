<?php
// ===== Database Config =====
$host = "localhost";
$user = "root";
$pass = "";
$db   = "student_db";

// ===== Connect Database =====
$conn = new mysqli($host, $user, $pass, $db);

$id = $_GET['id'];
$student = $conn->query("SELECT * FROM students WHERE id=$id")->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "UPDATE students SET name='$name', email='$email', phone='$phone' WHERE id=$id";
    $conn->query($sql);
    header("Location: list.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        input { padding: 8px; width: 300px; margin-bottom: 10px; display: block; }
        .btn { padding: 8px 20px; background: #2196F3; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
<h2>✏️ Edit Student</h2>
<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required>
    <label>Email:</label>
    <input type="text" name="email" value="<?= htmlspecialchars($student['email']) ?>">
    <label>Phone:</label>
    <input type="text" name="phone" value="<?= htmlspecialchars($student['phone']) ?>">
    <button type="submit" class="btn">Update</button>
    <a href="list.php">Cancel</a>
</form>
</body>
</html>
<?php $conn->close(); ?>