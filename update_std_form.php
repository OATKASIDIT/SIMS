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
$old =isset($_GET["id"]) ?$_GET["id"]: 0;//IDที่ใช้อ้างอิง
$id = isset($_GET["id"]) ? $_GET["id"] : 0;

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
    id: <input type="text" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>"><br>
    name: <input type="text" name="en_name" value="<?php echo isset($row['en_name']) ? $row['en_name'] : ''; ?>"><br>
    surname: <input type="text" name="en_surname" value="<?php echo isset($row['en_surname']) ? $row['en_surname'] : ''; ?>"><br>
    ชื่อ: <input type="text" name="th_name" value="<?php echo isset($row['th_name']) ? $row['th_name'] : ''; ?>"><br>
    นามสกุล: <input type="text" name="th_surname" value="<?php echo isset($row['th_surname']) ? $row['th_surname'] : ''; ?>"><br>
    Major: <input type="text" name="major_code" value="<?php echo isset($row['major_code']) ? $row['major_code'] : ''; ?>"><br>
    Email: <input type="text" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>"><br>
    <input type="submit" value="Update">
    <input type="reset">

    
</form>

</body>
</html>
