<?php
// ================================
// ค่าระบบ
// ================================
$currentYear = 2567;

// ================================
// เตรียมตัวแปรเก็บข้อมูลผู้ใช้
// ================================
$users = [];

// ================================
// Function: คำนวณอายุ
// ================================
function calculateAge($birthYear, $currentYear) {
    return $currentYear - $birthYear;
}

// ================================
// Function: ตรวจสอบสิทธิ์
// ================================
function checkAccess($age, $birthYear, $currentYear) {

    if ($birthYear > $currentYear) {
        return "ข้อมูลปีเกิดไม่ถูกต้อง";
    } else if ($age > 120) {
        return "กรุณาตรวจสอบข้อมูลอีกครั้ง";
    } else if ($age < 18) {
        return "ไม่อนุญาตให้เข้าใช้งานเว็บไซต์";
    } else {
        return "อนุญาตให้เข้าใช้งานเว็บไซต์";
    }
}

// ================================
// ประมวลผล Form
// ================================
if (isset($_POST['username']) && isset($_POST['birthYear'])) {

    $username = $_POST['username'];
    $birthYear = (int)$_POST['birthYear'];

    $age = calculateAge($birthYear, $currentYear);
    $status = checkAccess($age, $birthYear, $currentYear);

    // เก็บข้อมูลผู้ใช้ (ชั่วคราว)
    $users[] = [
        "name" => $username,
        "age" => $age,
        "status" => $status
    ];
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Age Gate Web App</title>
</head>
<body>

<h2>ระบบตรวจสอบสิทธิ์เข้าใช้งานเว็บไซต์</h2>

<form method="post">
    ชื่อผู้ใช้:<br>
    <input type="text" name="username"><br><br>

    ปีเกิด (พ.ศ.):<br>
    <input type="number" name="birthYear"><br><br>

    <button type="submit">เพิ่มผู้ใช้</button>
</form>

<hr>

<?php
// ================================
// แสดงผลผู้ใช้ทั้งหมด
// ================================
foreach ($users as $user) {
    echo "ชื่อ: " . $user["name"] . "<br>";
    echo "อายุ: " . $user["age"] . " ปี<br>";
    echo "สถานะ: " . $user["status"] . "<br>";
    echo "<hr>";
}
?>

</body>
</html>