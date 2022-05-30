<?php
// require_once 'vendor/autoload.php';
// $faker = Faker\Factory::create();
// $connect = mysqli_connect("localhost","root","","images");
// if (mysqli_connect_errno()){
//     echo 'blad polaczenia' . mysqli_connect_error();
// }
// for ($i=0; $i < 20; $i++){
//     $faker = Faker\Factory::create();
//     $name = $faker->words(2,true);
//     $pics = $faker->unique()->numberBetween(0,1000);
//     $pattern = '/ /';
//     $replace = '_';
//     $file = preg_replace($pattern, $replace, $name).'.png';
//     $url = 'https://picsum.photos/id/'.$pics.'/info';
//     $json = file_get_contents($url);
//     if ($json == null){
//         return;
//     } else { 
//         $obj = json_decode($json);
//         $author = $obj->author;
//         $width = $obj->width;
//         $height = $obj->height;
//         $download_url = $obj->download_url;
//         file_put_contents('./images/'.$file, file_get_contents($download_url));
//     }
//     $added_at = date('H:i:s d/m/Y');
//     $queryadd = "INSERT INTO `images` (id, name, picsum_id, imagefile, author, width, height, added_at) VALUES ('$name', '$pics', '$file', '$author', '$width', '$height', '$added_at')";
//     $result_add = mysqli_query($connect, $queryadd);
// }
?>


 <?php
require_once 'vendor/autoload.php';
    $con = mysqli_connect("localhost","root","","images");
    if (mysqli_connect_errno()){
        echo 'Failed to connect to MySQL: ' . mysqli_connect_error();
    }
    for ($i=0; $i < 20; $i++) { 
$faker = Faker\Factory::create();

 $name = $faker->words(2, true);
 $picsum_id = $faker->unique()->numberBetween(0, 1000);

$pattern = '/ /';
$replacement = '_';

$imagefile = preg_replace($pattern, $replacement, $name).'.png';

$url = 'https://picsum.photos/id/'.$picsum_id.'/info';
$json = file_get_contents($url);

if($json == null){
    //url parsing didn't work
    return;
}else{
    $obj = json_decode($json);
    $author = $obj->author;
    $width = $obj->width;
    $height = $obj->height;
    $img_dw = $obj->download_url;
    file_put_contents('./images/'.$imagefile, file_get_contents($img_dw));
}
$added_at = date("Y-m-d H:i:s");


$queryadd  = "INSERT into `images` (name, picsum_id, imagefile, author, width, height, added_at) VALUES ('$name', '$picsum_id', '$imagefile', '$author', '$width', '$height', '$added_at')";
$resultadd = mysqli_query($con, $queryadd);
    }
?> 