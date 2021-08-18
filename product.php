<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "dynamic_website";
$connection = mysqli_connect($host,$user,$pass,$database);
if (!$connection){
    echo "Kết nối database thất bại!";
}else{
    echo "Kết nối database thành công!";
}

$query = "CREATE TABLE product(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(30) NOT NULL,
    price DOUBLE,
    thumbnail VARCHAR (255), 
    reg_date TIMESTAMP
)";
$ret = mysqli_query($connection,$query);
if ($ret){
    echo "<p>Tạo bảng thành công!</p>";
}else{
    echo "<p>Tạo bảng thất bại!</p>";
}

$name = "";
$price = "";
$thumbnail = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["name"])) { $name = $_POST['name']; }
    if(isset($_POST["price"])) { $price = $_POST['price']; }
    if(isset($_POST["thumbnail"])) { $thumbnail = $_POST['thumbnail']; }

    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO product (name, price, thumbnail)
    VALUES ('$name', '$price', '$thumbnail')";

    if ($connection->query($sql) === TRUE) {
        echo "Thêm dữ liệu thành công!";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }
}
//Đóng database
$connection->close();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Style/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="contener">
    <form action="" method="post">
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Please enter name" name="name">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Please enter price" name="price">
        </div>
        <div class="form-group">
            <input class="form-control" type="text" placeholder=" Please enter thumbnail" name="thumbnail">
        </div>
        <div class="form-group">
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
<script src="Script/bootstrap.min.js"></script>
<script src="Script/jquery.min.js"></script>
</body>
</html>

