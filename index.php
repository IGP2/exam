<?php

echo'<!DOCTYPE html>';
echo'<html lang="en">';
echo'<head>';
    echo'<meta charset="UTF-8">';
    echo'<meta http-equiv="X-UA-Compatible" content="IE=edge">';
    echo'<meta name="viewport" content="width=, initial-scale=1.0">';
    echo'<title>Igor Przybysz</title>';
    echo'</head>';
    echo'<body>';
    echo date('H:i:s d/m/Y');
    $con = mysqli_connect("localhost", "root", "", "images");
    if (mysqli_connect_errno()){
        echo 'blad polaczenia: ' . mysqli_connect_error();
    }
    $sql = "SELECT * FROM images";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {?>
        <div class="container mt-4">
            <div class="row">
        <?php while ($row = $result->fetch_assoc()) {?> 
            <div class="col-sm-3">
                <div class="card mt-4" style="width: 300px; height: 300px; margin-right: 100px;">
        <img style="width: 300px; height: 300px; margin-right: 100px; margin-top: 70px; display:flex;" src= "./images/<?php echo $row['imagefile']?>" alt="<?php echo $row['imagefile']?>"
        <p> author: <?php echo $row['author'] ?></p> 
        <p> name: <?php echo $row['name'] ?></p><br>
        <input type="submit" value = "more" form = "<?php echo $row['id'] ?>">
        <form action = "./view.php" id = "<?php echo $row['id'] ?>" method = "GET"> 
        <input type="hidden" name="id" value = "<?php echo $row['id'] ?>" form = "<?php echo $row['id'] ?>">
        <?php 
   echo  '</div> </div> </div> </div>';   

    }
    }
    echo'</body>';
    echo'</html>';
?>