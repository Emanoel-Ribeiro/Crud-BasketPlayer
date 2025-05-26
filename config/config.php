<?php
class Conexao {
    private $host = 'localhost';
    private $dbname = 'basquete_db';
    private $usuario = 'root';
    private $senha = '';
    public $conn;

    public function conectar() {
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->usuario, $this->senha);
            $this->conn->exec("set names utf8");
        } catch (PDOException $e) {
            die("Erro de conexão: " . $e->getMessage());
        }
        return $this->conn;
    }
}
?>