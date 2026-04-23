<?php
// ===== Database Config =====
$host = "localhost";
$user = "root";
$pass = "";
$db   = "student_db";

// ===== Connect Database =====
$conn = new mysqli($host, $user, $pass, $db);

$id = $_GET['id'];
$conn->query("DELETE FROM students WHERE id=$id");

header("Location: list.php");
exit();

$conn->close();
?>