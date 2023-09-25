<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Information</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php
$old = htmlspecialchars(trim($_POST["old"]));
$id = htmlspecialchars(trim($_POST["id"]));
$en_name = htmlspecialchars(trim($_POST["en_name"]));
$en_surname = htmlspecialchars(trim($_POST["en_surname"]));
$th_name = htmlspecialchars(trim($_POST["th_name"]));
$th_surname = htmlspecialchars(trim($_POST["th_surname"]));
$major_code = htmlspecialchars(trim($_POST["major_code"]));
$email = htmlspecialchars(trim($_POST["email"]));

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

// สร้างการเชื่อมต่อ
$conn = mysqli_connect($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (empty($old) || empty($id)) {
    echo "<script>alert('กรุณากรอก ID '); window.history.back();</script>";
    exit;
}

if (!is_numeric($id)) {
    echo "<script>alert('กรอกเป็นตัวเลขเท่านั้น'); window.history.back();</script>";
    exit;
}

if (empty($en_name)) {
    echo "<script>alert('กรุณากรอก ชื่อ (ภาษาอังกฤษ)'); window.history.back();</script>";
    exit;
}

if (empty($en_surname)) {
    echo "<script>alert('กรุณากรอก นามสกุล (ภาษาอังกฤษ)'); window.history.back();</script>";
    exit;
}

if (empty($th_name)) {
    echo "<script>alert('กรุณากรอก ชื่อ (ภาษาไทย)'); window.history.back();</script>";
    exit;
}

if (empty($th_surname)) {
    echo "<script>alert('กรุณากรอก นามสกุล (ภาษาไทย)'); window.history.back();</script>";
    exit;
}

if (empty($major_code)) {
    echo "<script>alert('กรุณากรอก major'); window.history.back();</script>";
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<script>alert('อีเมล์ @ ไม่ถูกต้อง');window.history.back();</script>";
    exit;
}

$sql = "UPDATE `std_info` SET `id`='$id',`en_name`='$en_name',`en_surname`='$en_surname',`th_name`='$th_name',`th_surname`='$th_surname',`major_code`='$major_code',`email`='$email' WHERE `id`=$old";

if (mysqli_query($conn, $sql)) {
    $sql = "SELECT * FROM `std_info` WHERE `id` = $id";

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        echo "<center><h1>อัพเดตข้อมูลแล้ว</h1><br>";
        echo "<h2>id: " . $id . "<br></h2>";
        echo "<h2>Successfully</h2><br>";
        echo "<a href='student.php'><button type='button' class='btn btn-warning'>กลับหน้าหลัก</button></a></center>";
    } else {
        echo "Error fetching updated record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
