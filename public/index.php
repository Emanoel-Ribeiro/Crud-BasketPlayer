<?php
require_once '../controllers/jogadorController.php';

$controller = new JogadorController();

// INSERIR
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['acao'] === 'inserir') {
    if ($controller->salvar($_POST, $_FILES)) {
        header('Location: ../views/jogadores/listar.php');
        exit;
    } else {
        echo "Erro ao inserir jogador.";
    }
}

// ATUALIZAR
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['acao'] === 'atualizar') {
    if ($controller->atualizar($_POST, $_FILES)) {
        header('Location: ../views/jogadores/listar.php');
        exit;
    } else {
        echo "Erro ao atualizar jogador.";
    }
}

// EXCLUIR
if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    if ($controller->excluir($id)) {
        header('Location: ../views/jogadores/listar.php');
        exit;
    } else {
        echo "Erro ao excluir jogador.";
    }
}

// LISTAGEM PADRÃO
header('Location: ../views/jogadores/listar.php');
exit;
