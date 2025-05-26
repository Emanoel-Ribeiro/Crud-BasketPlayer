<?php require_once '../templates/head.php'; ?>

<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.form-container {
    max-width: 400px;
    margin: 40px auto;
    padding: 30px 25px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
    animation: fadeInUp 0.8s ease;
}

.form-container h2 {
    text-align: center;
    margin-bottom: 25px;
    color: #2c3e50;
    animation: fadeInUp 0.8s 0.1s backwards;
}

.form-container label {
    font-weight: 500;
    color: #34495e;
    display: block;
    margin-bottom: 6px;
    animation: fadeInUp 0.8s 0.15s backwards;
}

.form-container input[type="text"],
.form-container input[type="number"],
.form-container input[type="file"] {
    width: 100%;
    padding: 8px 10px;
    margin-bottom: 18px;
    border: 1px solid #dfe6e9;
    border-radius: 5px;
    font-size: 15px;
    animation: fadeInUp 0.8s 0.2s backwards;
}

.form-container button[type="submit"] {
    width: 100%;
    padding: 10px;
    background: #2980b9;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.2s;
    animation: fadeInUp 0.8s 0.25s backwards;
}

.form-container button[type="submit"]:hover {
    background: #1abc9c;
}
</style>

<div class="form-container">
    <h2>Adicionar Jogador</h2>
    <form action="../../public/index.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="acao" value="inserir">

        <label>Nome:</label>
        <input type="text" name="nome" required>

        <label>Altura:</label>
        <input type="text" name="altura" required>

        <label>Posição:</label>
        <input type="text" name="posicao" required>

        <label>Número da Camisa:</label>
        <input type="number" name="numero_camisa" required>

        <label>Time Atual:</label>
        <input type="text" name="time_atual" required>

        <label>Foto:</label>
        <input type="file" name="foto" required>

        <label>Ficha Técnica (PDF):</label>
        <input type="file" name="ficha_tecnica" required>

        <button type="submit">Salvar</button>
    </form>
</div>

<?php require_once '../templates/footer.php'; ?>
