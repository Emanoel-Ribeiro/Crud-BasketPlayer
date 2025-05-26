<?php
require_once(__DIR__ . '/../config/config.php');

class Jogador {
    private $conn;
    private $tabela = 'jogadores';

    public function __construct() {
        $db = new Conexao();
        $this->conn = $db->conectar();
    }

    public function listar() {
        $sql = "SELECT * FROM {$this->tabela}";
        return $this->conn->query($sql);
    }

    public function buscar($id) {
        $sql = "SELECT * FROM {$this->tabela} WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function inserir($dados) {
        $sql = "INSERT INTO {$this->tabela} (nome, altura, posicao, numero_camisa, time_atual, foto, ficha_tecnica) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(array_values($dados));
    }

    public function atualizar($dados) {
        $sql = "UPDATE {$this->tabela} SET nome=?, altura=?, posicao=?, numero_camisa=?, time_atual=?, foto=?, ficha_tecnica=? WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute(array_values($dados));
    }

    public function excluir($id) {
        $sql = "DELETE FROM {$this->tabela} WHERE id=?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }
}
