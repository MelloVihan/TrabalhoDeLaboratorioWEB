<?php  

include_once("connect.php");
include_once("Crud.php");

$obj = new Crud($connection);

$obj->readInfo();

$dado = $obj->getAll();
// var_dump($dados);

echo "<table border='1'>";
echo "<tr><th> id </th> <th> Nome </th><th> Idade </th><th> E-Mail </th><th> Data </th><th>Editar</th></tr>";

foreach ($dado as $info) {
	echo "<tr><td>".$info['id']."</td>
	<td>".$info['nome']."</td>
	<td>".$info['idade']."</td>
	<td>".$info['email']."</td>
	<td>".$info['data_now']."</td>
	<td><a href=formEdit.php?id=".$info['id'].">Editar</a></td>
	</tr>";


}
echo "</table>";