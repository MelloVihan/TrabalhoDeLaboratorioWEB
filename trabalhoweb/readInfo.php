<?php 

include_once("connect.php");
include_once("Crud.php")

$nome = $_POST['nome'];

$obj = new Crud($connection);

$dado = $obj->readInfoAll($nome); //Lê o id 1 no BD
?>
<?php

echo "<table border='1'>";
echo "<tr><th> id </th> <th> Nome </th><th> Idade </th><th> E-Mail </th><th> Data </th></tr>";

foreach ($dado as $info) {
	echo "<tr><td>".$info['id']."</td>
	<td>".$info['nome']."</td>
	<td>".$info['idade']."</td>
	<td>".$info['email']."</td>
	<td>".$info['data_now']."</td></tr>";
}

echo "</table>";

// $nome = $_POST['nome'];

// $obj = new Crud($connection);

// $dado = $obj->readInfoAll($nome);

// echo "<table border='1'>";
// echo "<tr><th> id </th> <th> Nome </th><th> Idade </th><th> E-Mail </th><th> Data </th></tr>";


// 	echo "<tr><td>".$dado['id']."</td>
// 	<td>".$dado['nome']."</td>
// 	<td>".$dado['idade']."</td>
// 	<td>".$dado['email']."</td>
// 	<td>".$dado['data_now']."</td></tr>";


// echo "</table>";

