<?php

$nome = $_POST['nome'];
$email = $_POST['e-mail'];
$idade = $_POST['idade'];

// echo $nome."-".$email."-".$idade;

include_once("connect.php"); // IMPORTANDO O ARQUIVO DE CONEXÃO


include_once("Crud.php");// IMPORTANDO O ARQUIVO CRUD


$obj = new Crud($connection);

$obj->setDados($nome,$email,$idade);

$obj->insertDados();