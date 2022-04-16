<?php  

$id = $_GET['id'];

// echo $id;

include_once("connect.php");
include_once("Crud.php");

$obj = new Crud($connection);

$dados = $obj->readInfo($id);

// var_dump($dados);
?>

<form action="update.php" method="post">
	<p>Nome:<input type="text" name="pessoa" value="<?=$dados->nome;?>"></p>
	<p>Idade:<input type="number" name="idade" value="<?=$dados->idade;?>"></p>
	<p>E-mail:<input type="email" name="email" value="<?=$dados->email;?>"></p>
	<input type="hidden" name="id" value="<?=$dados->id;?>">
	<p><button type="submit">Alterar</button></p>
</form>