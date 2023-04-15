<?php 
include('connectdata.php');
$id = $_GET['id'];
$sql = "DELETE FROM `product` WHERE id = $id;";
$result = $mysqli->query($sql);
var_dump($result);
if($result){
    header("location:index.php");
}
?>