<?php  

$id = $_GET['id'];
// echo $id;

include_once("connect.php");
include_once("Crud.php");
$obj = new Crud($connection);

$obj->delete($id);


?>