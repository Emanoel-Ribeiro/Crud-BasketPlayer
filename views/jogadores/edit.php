<?php
require_once '../../controllers/jogadorController.php';
require_once '../templates/head.php';

$controller = new JogadorController();
$jogador = $controller->editar($_GET['id']);
?>

<style>
body {
    background: linear-gradient(135deg, #e0eafc 0%, #cfdef3 100%);
    font-family: 'Segoe UI', Arial, sans-serif;
    margin: 0;
    padding: 0;
}
.edit-container {
    max-width: 450px;
    margin: 40px auto;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(31, 38, 135, 0.18);
    padding: 32px 36px 28px 36px;
    animation: fadeInUp 1s cubic-bezier(.39,.575,.565,1) both;
}
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(40px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}
.edit-container h2 {
    text-align: center;
    color: #2d3a4b;
    margin-bottom: 28px;
    letter-spacing: 1px;
}
.edit-form label {
    color: #2d3a4b;
    font-weight: 500;
    margin-bottom: 6px;
    display: block;
    letter-spacing: .5px;
}
.edit-form input[type="text"],
.edit-form input[type="number"],
.edit-form input[type="file"] {
    width: 100%;
    padding: 9px 12px;
    margin-bottom: 18px;
    border: 1px solid #bfc9d9;
    border-radius: 7px;
    background: #f7fafd;
    font-size: 1rem;
    transition: border-color .2s;
}
.edit-form input[type="text"]:focus,
.edit-form input[type="number"]:focus {
    border-color: #5b9df9;
    outline: none;
}
.edit-form img {
    display: block;
    margin: 8px 0 16px 0;
    border-radius: 6px;
    box-shadow: 0 2px 8px rgba(44, 62, 80, 0.08);
    animation: pulseImg 1.2s infinite alternate;
}
@keyframes pulseImg {
    0% { box-shadow: 0 2px 8px rgba(44, 62, 80, 0.08);}
    100% { box-shadow: 0 4px 16px rgba(44, 62, 80, 0.18);}
}
.edit-form a {
    color: #5b9df9;
    text-decoration: none;
    font-size: 0.97rem;
    margin-bottom: 12px;
    display: inline-block;
    transition: color .2s;
}
.edit-form a:hover {
    color: #2d3a4b;
    text-decoration: underline;
}
.edit-form button {
    width: 100%;
    padding: 12px 0;
    background: linear-gradient(90deg, #5b9df9 0%, #4a6cf7 100%);
    color: #fff;
    border: none;
    border-radius: 7px;
    font-size: 1.08rem;
    font-weight: 600;
    letter-spacing: 1px;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(91,157,249,0.08);
    transition: background .2s, transform .1s;
    animation: btnPop 1.2s .5s both;
}
@keyframes btnPop {
    0% { transform: scale(0.95);}
    100% { transform: scale(1);}
}
.edit-form button:hover {
    background: linear-gradient(90deg, #4a6cf7 0%, #5b9df9 100%);
}
</style>

<div class="edit-container">
    <h2>Editar Jogador</h2>
    <form class="edit-form" action="../../public/index.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="acao" value="atualizar">
        <input type="hidden" name="id" value="<?php echo $jogador['id']; ?>">
        <input type="hidden" name="foto_atual" value="<?php echo $jogador['foto']; ?>">
        <input type="hidden" name="ficha_atual" value="<?php echo $jogador['ficha_tecnica']; ?>">

        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $jogador['nome']; ?>" required>

        <label>Altura:</label>
        <input type="text" name="altura" value="<?php echo $jogador['altura']; ?>" required>

        <label>Posição:</label>
        <input type="text" name="posicao" value="<?php echo $jogador['posicao']; ?>" required>

        <label>Número da Camisa:</label>
        <input type="number" name="numero_camisa" value="<?php echo $jogador['numero_camisa']; ?>" required>

        <label>Time Atual:</label>
        <input type="text" name="time_atual" value="<?php echo $jogador['time_atual']; ?>" required>

        <label>Foto Atual:</label>
        <img src="../../uploads/pictures/<?php echo $jogador['foto']; ?>" width="100">
        <input type="file" name="foto">

        <label>Ficha Técnica Atual:</label>
        <a href="../../uploads/pdfs/<?php echo $jogador['ficha_tecnica']; ?>" download>Download atual</a>
        <input type="file" name="ficha_tecnica">

        <button type="submit">Atualizar</button>
    </form>
</div>

<?php require_once '../templates/footer.php'; ?>
