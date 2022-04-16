<?php

class Crud
{
	private $conn;

	private $nome;
	private $email;
	private $idade;

	function __construct($connection)
	{
		$this->conn = $connection;
	}

	public function setDados($nome, $email, $idade)
	{
		$this->nome = $nome;
		$this->email = $email;
		$this->idade = $idade;
	}

	public function insertDados()
	{
		$sql = $this->conn->prepare("INSERT INTO clientes(nome,idade,email,data_now)VALUES(?,?,?,now())");

		$sql->bindParam(1, $this->nome);
		$sql->bindParam(2, $this->idade);
		$sql->bindParam(3, $this->email);



		if ($sql->execute()) {
			echo "ok";
		} else {
			echo "Erro";
		}
	}

	public function readInfo($id = null)
	{
		if (isset($id)) {
			$sql = $this->conn->prepare("SELECT * FROM clientes WHERE id=?");

			$sql->bindValue(1, $id);

			$sql->execute();

			$result = $sql->fetch(PDO::FETCH_OBJ);

			return $result;
		} else {
			$this->getAll();
		}
	} //Fechamento de readInfo()

	public function getAll()
	{
		$sql = $this->conn->query("SELECT * FROM clientes");

		return $res = $sql->fetchAll();
	}

	public function readInfoAll($nome = null)
	{
		if (isset($nome)) {
			$sql = $this->conn->prepare("SELECT * FROM clientes WHERE nome LIKE ?");

			$sql->bindValue(1, "%$nome");
			$sql->execute();
			// $result = $sql->fetch(PDO::FETCH_ASSOC);
			$result = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		} else {
			$this->getAll();
		}
	} //FECHAMENTO READ INFO ALL


	public function update($id, $nome, $idade, $email)
	{

		$sql = $this->conn->prepare("UPDATE clientes SET nome=?,idade=?,email=? WHERE id=?");

		$sql->bindValue(1, $nome, PDO::PARAM_STR);
		$sql->bindValue(2, $idade, PDO::PARAM_STR);
		$sql->bindValue(3, $email, PDO::PARAM_STR);
		$sql->bindValue(4, $id, PDO::PARAM_STR);

		if ($sql->execute()) {
			echo "Dados Atualizados com Sucesso! <br> <a href='readAll.php'>Voltar</a>";
		} else {
			echo "Erro ao tentar atualizar dados! <br> <a href=readAll.php>Voltar</a>";
		}
	}

	public function delete($id)
	{

		$sql = $this->conn->prepare("DELETE FROM clientes WHERE id=?");

		$sql->bindValue(1, $id, PDO::PARAM_STR);

		if ($sql->execute()) {
			echo "Dados excluidos com sucesso! <br> <a href='readAllDelete.php'>Voltar</a>";
		} else {
			echo "Erro ao tentar excluir dados! <br> <a href='readAllDelete.php'>Voltar</a>";
		}
	}
} //Fechamento da classe Crud(topo)