<?php

namespace SON;

class Contratos
{

    private $db;

    public function __construct (ConexaoInterface $conexao)
    {
        $this->db = $conexao->getConnection();
    }

    public function listAll()
    {
        $query = "SELECT co.*,cl.cpf,cl.nome FROM Contratos co INNER JOIN Clientes cl ON co.cliente_id=cl.id ";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function listOne($id){
        $query = "SELECT co.*,cl.id as cli_id,cl.cpf,cl.nome FROM Contratos co INNER JOIN Clientes cl ON co.cliente_id=cl.id WHERE co.id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    public function create($data)
    {

        try {
            $query = "INSERT INTO Contratos (codigo, contrato, cliente_id, valor, data_contrato) VALUES (:codigo, :contrato, :cliente_id, :valor, :dt)";
            $stmt = $this->db->prepare($query);
            $stmt->execute([
                ':codigo' => $data['codigo'],
                ':contrato' => $data['contrato'],
                ':cliente_id' => $data['cliente_id'],
                ':valor' => number_format($data['valor'],2,'.',''),
                ':dt' => date('Y-m-d',strtotime($data['data_contrato']))
            ]);

            return $stmt->rowCount();

        }catch (\PDOException $e){
            return $e->getMessage();
        }

    }

    public function  update($id, $data)
    {
        try {
        $query = "UPDATE Contratos SET  codigo = :codigo, contrato = :contrato, cliente_id = :cliente_id, valor = :valor, data_contrato = :dt WHERE id= :id ";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':codigo' => $data['codigo'],
            ':contrato' => $data['contrato'],
            ':cliente_id' => $data['cliente_id'],
            ':valor' => number_format($data['valor'],2,'.',''),
            ':dt' => date('Y-m-d',strtotime($data['data_contrato']))
        ]);

        }catch (\PDOException $e){
            return $e->getMessage();
        }
    }

    public function  delete($id)
    {
        $query = "DELETE FROM Contratos WHERE id= :id ";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':id' => $id
        ]);

        return $stmt->rowCount();
    }
    
}