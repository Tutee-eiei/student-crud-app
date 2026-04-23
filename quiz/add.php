<?php
// ===== Database Config =====
$host = "localhost";
$user = "root";
$pass = "";
$db   = "student_db";

// ===== Connect Database =====
$conn = new mysqli($host, $user, $pass, $db);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name  = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO students (name, email, phone) VALUES ('$name', '$email', '$phone')";
    $conn->query($sql);
    header("Location: list.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <style>
        body { font-family: Arial; margin: 40px; }
        input { padding: 8px; width: 300px; margin-bottom: 10px; display: block; }
        .btn { padding: 8px 20px; background: #4CAF50; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
<h2>➕ Add Student</h2>
<form method="POST">
    <label>Name:</label>
    <input type="text" name="name" required>
    <label>Email:</label>
    <input type="text" name="email">
    <label>Phone:</label>
    <input type="text" name="phone">
    <button type="submit" class="btn">Save</button>
    <a href="list.php">Cancel</a>
</form>
</body>
</html>
<?php $conn->close(); ?>