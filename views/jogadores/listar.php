<?php
require_once '../../controllers/jogadorController.php';
require_once '../templates/head.php';

$controller = new JogadorController();
$busca = isset($_GET['busca']) ? $_GET['busca'] : null;
$jogadores = $controller->index($busca);
?>

<style>
body {
    background: #f4f6fa;
    font-family: Arial, sans-serif;
}
h2 {
    text-align: center;
    margin-top: 30px;
    color: #333;
    animation: fadeInDown 1s;
}
@keyframes fadeInDown {
    from { opacity: 0; transform: translateY(-30px);}
    to { opacity: 1; transform: translateY(0);}
}
.table-container {
    max-width: 1100px;
    margin: 40px auto;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 24px rgba(0,0,0,0.08);
    padding: 30px;
    animation: fadeIn 1.2s;
}
@keyframes fadeIn {
    from { opacity: 0;}
    to { opacity: 1;}
}
form {
    margin-bottom: 18px;
    display: flex;
    justify-content: flex-end;
    gap: 8px;
    animation: fadeInLeft 1s;
}
@keyframes fadeInLeft {
    from { opacity: 0; transform: translateX(-40px);}
    to { opacity: 1; transform: translateX(0);}
}
input[type="text"] {
    padding: 7px 12px;
    border: 1px solid #bbb;
    border-radius: 5px;
    font-size: 15px;
    transition: border 0.2s;
}
input[type="text"]:focus {
    border: 1.5px solid #007bff;
    outline: none;
}
button[type="submit"] {
    background: #007bff;
    color: #fff;
    border: none;
    padding: 7px 18px;
    border-radius: 5px;
    font-size: 15px;
    cursor: pointer;
    transition: background 0.2s;
}
button[type="submit"]:hover {
    background: #0056b3;
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    animation: fadeInUp 1.2s;
}
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(40px);}
    to { opacity: 1; transform: translateY(0);}
}
th, td {
    padding: 12px 10px;
    text-align: center;
}
th {
    background: #007bff;
    color: #fff;
    font-weight: 600;
    letter-spacing: 0.5px;
}
tr {
    background: #f9f9f9;
    transition: background 0.3s;
}
tr:nth-child(even) {
    background: #eaf1fb;
}
tr:hover {
    background: #d0e3fa;
    animation: rowHighlight 0.4s;
}
@keyframes rowHighlight {
    from { background: #f9f9f9;}
    to { background: #d0e3fa;}
}
img {
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    animation: imgPop 0.8s;
}
@keyframes imgPop {
    from { opacity: 0; transform: scale(0.8);}
    to { opacity: 1; transform: scale(1);}
}
a {
    color: #007bff;
    text-decoration: none;
    transition: color 0.2s;
}
a:hover {
    color: #0056b3;
    text-decoration: underline;
}
</style>

<div class="table-container">
    <h2>Lista de Jogadores</h2>
    <form method="GET" action="listar.php">
        <input type="text" name="busca" placeholder="Buscar por nome, posição, time, número ou ID..." value="<?php echo isset($_GET['busca']) ? htmlspecialchars($_GET['busca']) : ''; ?>">
        <button type="submit">Buscar</button>
    </form>
    <table border="0">
        <tr>
            <th>ID</th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Altura</th>
            <th>Posição</th>
            <th>Número</th>
            <th>Time</th>
            <th>Ficha</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($jogadores as $j): ?>
        <tr>
            <td><?php echo $j['id']; ?></td>
            <td><img src="../../uploads/pictures/<?php echo $j['foto']; ?>" width="60"></td>
            <td><?php echo $j['nome']; ?></td>
            <td><?php echo $j['altura']; ?></td>
            <td><?php echo $j['posicao']; ?></td>
            <td><?php echo $j['numero_camisa']; ?></td>
            <td><?php echo $j['time_atual']; ?></td>
            <td><a href="../../uploads/pdfs/<?php echo $j['ficha_tecnica']; ?>" download>Download</a></td>
            <td>
                <a href="edit.php?id=<?php echo $j['id']; ?>">Editar</a> |
                <a href="../../public/index.php?excluir=<?php echo $j['id']; ?>" onclick="return confirm('Tem certeza?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<?php require_once '../templates/footer.php'; ?></div>
