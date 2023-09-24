<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "students";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$old =$_GET["id"];//IDที่ใช้อ้างอิง
$id = $_GET["id"]; // IDที่จะอัพเดต

// ดึงข้อมูลเก่าจากฐานข้อมูล
$sql = "SELECT * FROM `std_info` WHERE `id`=$id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error fetching record: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
</head>
<body>
<form method="post" action="update_std.php">
    <input type="hidden" name="old" value="<?php echo $old; ?>">
    id: <input type="text" name="id" value="<?php echo $row['id']; ?>"><br>
    name: <input type="text" name="en_name" value="<?php echo $row['en_name']; ?>"><br>
    surname: <input type="text" name="en_surname" value="<?php echo $row['en_surname']; ?>"><br>
    ชื่อ: <input type="text" name="th_name" value="<?php echo $row['th_name']; ?>"><br>
    นามสกุล: <input type="text" name="th_surname" value="<?php echo $row['th_surname']; ?>"><br>
    Major: <input type="text" name="major_code" value="<?php echo $row['major_code']; ?>"><br>
    Email: <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
    <input type="submit" value="Update">
    <input type="reset">
</form>

</body>
</html>
