<?php
require_once 'db.php';

$controller = new MarcaController();

$acao = $_GET['acao'] ?? 'index';
switch ($acao) {
    case 'novo':
        $controller->novo();
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'salvar':
        $controller->salvar();
        break;
    case 'remover':
        $controller->remover();
        break;
    default:
        $controller->index();
}

class MarcaController {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM marcas");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaMarca.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formMarca.php';
        include '_rodape.php';
    }


    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO marcas (nome, descricao, pais_origem) 
                                VALUES (:nome, :descricao, :pais_origem)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':descricao' => $_POST['descricao'],
                ':pais_origem' => $_POST['pais_origem']

            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE marcas SET
                nome = :nome, descricao = :descricao, pais_origem = :pais_origem WHERE id = :id");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':descricao' => $_POST['descricao'],
                ':pais_origem' => $_POST['pais_origem'],
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }
    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM marcas
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formMarca.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM marcas
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }
}
