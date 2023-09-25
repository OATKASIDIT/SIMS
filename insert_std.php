<?php
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

if (empty($id)) {
    echo "<script>alert('กรุณากรอก ID'); window.history.back();</script>";
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
    echo "<script>alert('อีเมล์ @ ไม่ถูกต้อง'); window.history.back();</script>";
    exit;
}

// create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed " . mysqli_connect_error());
}
$sql = "INSERT INTO `std_info` (`id`, `en_name`, `en_surname`, `th_name`, `th_surname`, `major_code`, `email`) VALUES ('$id', '$en_name', '$en_surname', '$th_name', '$th_surname', '$major_code', '$email')";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข้อมูล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php
    if ($result) {
        echo "<center><h1>เพิ่มข้อมูลเรียบร้อยแล้ว!</h1>";
        echo "<a href='student.php'><button type='button' class='btn btn-warning'>กลับหน้าหลัก</button></a></center>";
    } else {
        echo "<h1>เกิดข้อผิดพลาดในการเพิ่มข้อมูล</h1>";
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
