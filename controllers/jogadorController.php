<?php
require_once(__DIR__ . '/../class/JogadorClass.php');

class JogadorController {
    
    private $jogador;
   //conecta ao banco de dados
    private $conn;

    public function __construct() {
        $this->jogador = new Jogador();
        // Ajuste a string de conexão conforme necessário para seu ambiente
        $this->conn = new PDO('mysql:host=localhost;dbname=basquete_db', 'root', '');
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

public function index($termo = null) {
    $sql = "SELECT * FROM jogadores";

    if ($termo) {
        $sql .= " WHERE 
            nome LIKE :termo OR 
            posicao LIKE :termo OR 
            time_atual LIKE :termo OR 
            numero_camisa = :numero OR 
            id = :id";
    }

    $stmt = $this->conn->prepare($sql);

    if ($termo) {
        $stmt->bindValue(':termo', '%' . $termo . '%');
        $stmt->bindValue(':numero', $termo, PDO::PARAM_INT);
        $stmt->bindValue(':id', $termo, PDO::PARAM_INT);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

    public function salvar($post, $files) {
        $foto = $this->uploadArquivo($files['foto'], 'pictures');
        $ficha = $this->uploadArquivo($files['ficha_tecnica'], 'pdfs');

        $dados = [
            $post['nome'],
            $post['altura'],
            $post['posicao'],
            $post['numero_camisa'],
            $post['time_atual'],
            $foto,
            $ficha
        ];

        return $this->jogador->inserir($dados);
    }

    public function editar($id) {
        return $this->jogador->buscar($id);
    }

    public function atualizar($post, $files) {
        $foto = $files['foto']['name'] ? $this->uploadArquivo($files['foto'], 'pictures') : $post['foto_atual'];
        $ficha = $files['ficha_tecnica']['name'] ? $this->uploadArquivo($files['ficha_tecnica'], 'pdfs') : $post['ficha_atual'];

        $dados = [
            $post['nome'],
            $post['altura'],
            $post['posicao'],
            $post['numero_camisa'],
            $post['time_atual'],
            $foto,
            $ficha,
            $post['id']
        ];

        return $this->jogador->atualizar($dados);
    }

    public function excluir($id) {
        return $this->jogador->excluir($id);
    }

    private function uploadArquivo($arquivo, $pasta) {
        //cria um nome diferente para o arquivo 
        $nome = uniqid() . '_' . $arquivo['name'];
        // faz o caminho para a pasta de uploads
        $caminho = __DIR__ . "/../uploads/{$pasta}/" . $nome;
        // move para a pasta temporária para a pasta de uploads
        move_uploaded_file($arquivo['tmp_name'], $caminho);
        //Retorna o nome do arquivo salvo, que será guardado no bd.
        return $nome;
    }
}
