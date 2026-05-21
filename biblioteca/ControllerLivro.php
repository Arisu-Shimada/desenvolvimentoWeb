<?php
require_once 'db.php';

$controller = new ControllerLivro();

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

class ControllerLivro {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM livros");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaLivro.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formLivro.php';
        include '_rodape.php';
    }


    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO livros (titulo, ano, quantidade) 
                                VALUES (:titulo, :ano, :quantidade)");
            $stmt->execute([
                ':titulo' => $_POST['titulo'],
                ':ano' => $_POST['ano'],
                ':quantidade' => $_POST['quantidade'],                
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE livros SET
                titulo = :titulo, ano = :ano, quantidade = :quantidade WHERE id = :id");
            $stmt->execute([
                ':titulo' => $_POST['titulo'],
                ':ano' => $_POST['ano'],
                ':quantidade' => $_POST['quantidade'],                
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }
    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM livros
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formLivro.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM livros
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }

}
