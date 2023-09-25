<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
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
    $old = isset($_GET["id"]) ? $_GET["id"] : 0; // รหัสที่ใช้อ้างอิง
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

    <div class="container">
        <h1>อัพเดตข้อมูล</h1>
        <form method="post" action="update_std.php">
            <input type="hidden" name="old" value="<?php echo $old; ?>">
            <div class="mb-3">
                <h4><label for="id" class="form-label">ID:</label></h4>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
            </div>
            <div class="mb-3">
                <h4><label for="en_name" class="form-label">ชื่อ (ภาษาอังกฤษ):</label></h4>
                <input type="text" class="form-control" id="en_name" name="en_name" value="<?php echo isset($row['en_name']) ? $row['en_name'] : ''; ?>">
            </div>
            <div class="mb-3">
                <h4><label for="en_surname" class="form-label">นามสกุล (ภาษาอังกฤษ):</label></h4>
                <input type="text" class="form-control" id="en_surname" name="en_surname" value="<?php echo isset($row['en_surname']) ? $row['en_surname'] : ''; ?>">
            </div>
            <div class="mb-3">
                <h4><label for="th_name" class="form-label">ชื่อ (ภาษาไทย):</label></h4>
                <input type="text" class="form-control" id="th_name" name="th_name" value="<?php echo isset($row['th_name']) ? $row['th_name'] : ''; ?>">
            </div>
            <div class="mb-3">
                <h4><label for="th_surname" class="form-label">นามสกุล (ภาษาไทย):</label></h4>
                <input type="text" class="form-control" id="th_surname" name="th_surname" value="<?php echo isset($row['th_surname']) ? $row['th_surname'] : ''; ?>">
            </div>
            <div class="mb-3">
                <h4><label for="major_code" class="form-label">Major:</label></h4>
                <input type="text" class="form-control" id="major_code" name="major_code" value="<?php echo isset($row['major_code']) ? $row['major_code'] : ''; ?>">
            </div>
            <div class="mb-3">
                <h4><label for="email" class="form-label">Email:</label></h4>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($row['email']) ? $row['email'] : ''; ?>">
            </div>
            
            <button type="submit" class="btn btn-primary">อัพเดต</button>
            <button type="reset" class="btn btn-secondary">ล้างข้อมูล</button>
        </form>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
