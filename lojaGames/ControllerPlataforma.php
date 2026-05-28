<?php
require_once 'db.php';

$controller = new ControllerPlataforma();

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

class ControllerPlataforma {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM plataformas");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaPlataforma.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formPlataforma.php';
        include '_rodape.php';
    }

    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO plataformas (nome, fabricante) 
                                VALUES (:nome, :fabricante)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':fabricante' => $_POST['fabricante']            
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE plataformas SET
                nome = :nome, fabricante = :fabricante");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':fabricante' => $_POST['fabricante'],
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }
    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM plataformas
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formPlataforma.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM plataformas
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }

}
