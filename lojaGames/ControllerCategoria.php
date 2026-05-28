<?php
require_once 'db.php';

$controller = new ControllerCategoria();

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

class ControllerCategoria {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM categorias");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaCategoria.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formCategoria.php';
        include '_rodape.php';
    }

    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO categorias (nome, descricao) 
                                VALUES (:nome, :descricao)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':descricao' => $_POST['descricao']            
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE categorias SET
                nome = :nome, descricao = :descricao");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':descricao' => $_POST['descricao'],            
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }
    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM categorias
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formCategoria.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM categorias
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }

}
