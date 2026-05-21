<?php
require_once 'db.php';

$controller = new ControllerAutor();

$acao = $_GET['acao'] ?? 'index';
switch ($acao) {
    case 'novo':
        $controller->novo();
        break;
    case 'salvar':
        $controller->salvar();
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

class ControllerAutor {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM autores");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaAutor.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formAutor.php';
        include '_rodape.php';
    }

    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO autores (nome, nacionalidade) 
                                VALUES (:nome, :nacionalidade)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':nacionalidade' => $_POST['nacionalidade']            
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE autores SET
                nome = :nome, nacionalidade = :nacionalidade");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':nacionalidade' => $_POST['nacionalidade'],            
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }
    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM autores
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formAutor.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM autores
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }

}
