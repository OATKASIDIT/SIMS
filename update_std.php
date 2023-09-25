<?php
$old = trim($_POST["old"]);
$id=trim($_POST["id"]);
$en_name=trim($_POST["en_name"]);
$en_surname=trim($_POST["en_surname"]);
$th_name=trim($_POST["th_name"]);
$th_surname=trim($_POST["th_surname"]);
$major_code=trim($_POST["major_code"]);
$email=trim($_POST["email"]);
//echo $id; echo $en_name; echo $en_surname; echo $th_name; echo $th_surname;
//echo $major_code; echo $email;
$servername="localhost";
$username="root";
$password="";
$dbname="students";
// create connection
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Connection failed ".mysqli_connect_error());
}
    if (empty($old) || empty($id)){
        echo "<script>alert('กรุณากรอก ID '); window.history.back();</script>";
        exit;
    }
    if (!is_numeric($id)){
        echo "<script>alert('กรอกเป็นตัวเลขเท่านั้น'); window.history.back();</script>";
        exit;
    }
    if (empty($en_name)){
        echo "<script>alert('กรุณากรอก name'); window.history.back();</script>";
        exit;
    }
    if (empty($en_surname)){
        echo "<script>alert('กรุณากรอก surname'); window.history.back();</script>";
        exit;
    }
    if (empty($th_name)){
        echo "<script>alert('กรุณากรอก ชื่อ'); window.history.back();</script>";
        exit;
    }
    if (empty($th_surname)){
        echo "<script>alert('กรุณากรอก นามสกุล'); window.history.back();</script>";
        exit;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>alert('อีเมล์ @ ไม่ถูกต้อง');window.history.back();</script>";
        exit;
    }
$sql="UPDATE `std_info` SET `id`='$id',`en_name`='$en_name',`en_surname`='$en_surname',`th_name`='$th_name',`th_surname`='$th_surname',`major_code`='$major_code',`email`='$email' WHERE `id`=$old";

 if(mysqli_query($conn,$sql)){
    $sql = "SELECT * FROM `std_info` WHERE `id` = $id";
    
    $result=mysqli_query($conn,$sql);
    if($result){
        $row = mysqli_fetch_assoc($result);
        echo "Update Record<br>";
        echo "id:".$id."<br>";
        echo "Successfully<br>";
        echo "<a href='student.php'><br>Back</a>";
    }
    else{
        echo "Error fetching updated record: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>