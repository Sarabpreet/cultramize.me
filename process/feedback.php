<?php 


if($_GET['name'] && $_GET['rating'] && $_GET['comment'] && $_GET['website']) {

$name=$_GET['name'];
$rating=$_GET['rating'];
$website=$_GET['website'];
$comments=$_GET['comment'];

echo $name.$rating.$website.$comments;
sleep(10);
header("location:../index.php");
}

else {

	echo "LOL putentire thing no!";
}

 ?>

