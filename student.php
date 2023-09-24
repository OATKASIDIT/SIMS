<?php
$servername="localhost";
$username="root";
$password="";
$dbname="students";
// create connection
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die("Connection failed ".mysqli_connect_error());
}
$sql="SELECT * FROM `std_info`";
$result=mysqli_query($conn,$sql);
if($result){
    if(mysqli_num_rows($result)>0){
        echo "<table border='1'>";
        echo "<tr><th>id</th><th>name</th><th>surname</th>";
        echo "<th>ชื่อ</th><th>นามสกุล</th>";
        echo "<th>Major</th><th>email</th>";
        echo "<th>Delete</th><th>Edit</th></tr>";
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row["id"]."</td>";
            echo "<td>".$row["en_name"]."</td>";
            echo "<td>".$row["en_surname"]."</td>";
            echo "<td>".$row["th_name"]."</td>";
            echo "<td>".$row["th_surname"]."</td>";
            echo "<td>".$row["major_code"]."</td>";
            echo "<td>".$row["email"]."</td>";
            echo "<td><a href = 'delete_std.php?id=".$row["id"]."'>X</a></td>";
            echo "<td><a href = 'update_std_form.php?id=".$row["id"]."'>Edit</a></td></tr>";
        }
        echo "</table>";
    }
}
echo "<a href='insert_std_form.html'>Insert new record</a><br>";
mysqli_close($conn);
?>