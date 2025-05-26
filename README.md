# 🏀 Sistema de Gerenciamento de Jogadores de Basquete

Um sistema web simples em PHP com padrão MVC para cadastrar, listar, editar e excluir jogadores de basquete. O sistema também permite o upload de foto e ficha técnica (PDF) de cada jogador.

---

## 🚀 Funcionalidades

- 📋 Listar jogadores
- ➕ Cadastrar novo jogador
- ✏️ Editar informações
- ❌ Excluir jogador
- 🔍 Buscar por nome, posição, número, time ou ID
- 🖼️ Upload de foto
- 📄 Upload de ficha técnica em PDF

---

---

## 🛠️ Tecnologias

- PHP (padrão MVC)
- MySQL (com script SQL pronto)
- HTML5 + CSS3 (básico)
- PDO para acesso seguro ao banco de dados

---

## 🧪 Como usar

1. Clone o repositório:
   git clone https://github.com/Emanoel-Ribeiro/Crud-BasketPlayer.git

Importe o arquivo db/banco.sql no seu MySQL (ex: usando o phpMyAdmin)

Altere o arquivo config/config.php com os dados do seu banco:

private $host = 'localhost';
private $dbname = 'basquete_db';
private $usuario = 'root';
private $senha = '';

Coloque o projeto em um servidor local (ex: XAMPP, WampServer)

Acesse pelo navegador:

http://localhost/Crud-BasketPlayer/public
