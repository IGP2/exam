<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $row['name'] ?></title>
</head>

<body>
    <?php
    $id = $_GET['id'];
    $host = "localhost";
    $username = "root";
    $password = "";
    $name = "images";
    $connect = mysqli_connect($host, $username, $password, $name);
    if (mysqli_connect_errno()) {
        echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
    }
    $sql = "SELECT * FROM images WHERE id = '$id'";
    $result = $connect->query($sql);
    if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc())?>
        <div class="card mt-4" style="width: 300px; height: 300px; margin-right: 100px;">
            <img style="width: 300px; height: 300px; margin-right: 100px; margin-top: 70px; display:flex;" src="./images/<?php echo $row['imagefile'] ?>" alt="<?php echo $row['imagefile'] ?>" 
           
        echo "</div>" <?php
            } ?>

</body>

</html>