<?php

namespace SON;


class Clientes
{

    private $db;

    public function __construct (ConexaoInterface $conexao)
    {
        $this->db = $conexao->getConnection();
    }

    public function listAll()
    {
        $query = "SELECT * FROM Clientes ORDER BY id";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function listOne($id){
        $query = "SELECT * FROM Clientes WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $query = "INSERT INTO Clientes (cpf, nome, nascimento, cidade, estado, telefone) VALUES (:cpf, :nome, :nascimento, :cidade, :estado, :telefone)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':cpf' => $data['cpf'],
            ':nome' => $data['nome'],
            ':nascimento' => date('Y-m-d',strtotime($data['nascimento'])),
            ':cidade' => $data['cidade'],
            ':estado' => $data['estado'],
            ':telefone' => $data['telefone']
        ]);

        return $stmt->rowCount();
    }

    public function  update($id, $data)
    {
        $query = "UPDATE Clientes SET  cpf = :cpf, nome = :nome, nascimento = :nascimento, cidade = :cidade, estado = :estado, telefone = :telefone WHERE id= :id ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':id' => $id,
            ':cpf' => $data['cpf'],
            ':nome' => $data['nome'],
            ':nascimento' => date('Y-m-d',strtotime($data['nascimento'])),
            ':cidade' => $data['cidade'],
            ':estado' => $data['estado'],
            ':telefone' => $data['telefone']
        ]);

        return $stmt->rowCount();
    }

    public function  delete($id)
    {
        $query = "DELETE FROM Clientes WHERE id= :id ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->rowCount();
    }


}