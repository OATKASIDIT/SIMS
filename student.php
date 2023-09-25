<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "students";

                // Create connection
                $conn = mysqli_connect($servername, $username, $password, $dbname);
                if (!$conn) {
                    die("Connection failed " . mysqli_connect_error());
                }

                $sql = "SELECT * FROM `std_info`";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    if (mysqli_num_rows($result) > 0) {
                        echo "<th>ID</th>";
                        echo "<th>Name</th>";
                        echo "<th>Surname</th>";
                        echo "<th>ชื่อ</th>";
                        echo "<th>นามสกุล</th>";
                        echo "<th>Major</th>";
                        echo "<th>Email</th>";
                        echo "<th>Delete</th>";
                        echo "<th>Edit</th>";
                    }
                }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["en_name"] . "</td>";
                    echo "<td>" . $row["en_surname"] . "</td>";
                    echo "<td>" . $row["th_name"] . "</td>";
                    echo "<td>" . $row["th_surname"] . "</td>";
                    echo "<td>" . $row["major_code"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td><a href='delete_std.php?id=" . $row["id"] . "'><button type='button' class='btn btn-danger'>X</button></a></td>";
                    echo "<td><a href='update_std_form.php?id=" . $row["id"] . "'><button type='button' class='btn btn-warning'>Edit</button></a></td>";
                    echo "</tr>";
                }
            }
            mysqli_close($conn);
            ?>
        </tbody>
        
    </table>
     <center><a class='btn btn-info' href='insert_std_form.html'>เพิ่มข้อมูล</a></center>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>
