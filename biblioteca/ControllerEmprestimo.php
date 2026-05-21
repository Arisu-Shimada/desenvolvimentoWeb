<?php
require_once 'db.php';

$controller = new ControllerEmprestimo();

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

class ControllerEmprestimo {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM emprestimos");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaEmprestimo.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formEmprestimo.php';
        include '_rodape.php';
    }

    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO emprestimos (livro, usuario, data_emprestimo, data_devolucao) 
                                VALUES (:livro, :usuario, :data_emprestimo, :data_devolucao)");
            $stmt->execute([
                ':livro' => $_POST['livro'],
                ':usuario' => $_POST['usuario'],
                ':data_devolucao' => $_POST['data_emprestimo'],
                ':data_devolucao' => $_POST['data_devolucao']
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE emprestimos SET
                livro = :livro, usuario = :usuario, data_emprestimo = :data_emprestimo, data_devolucao = :data_devolucao WHERE id = :id");
            $stmt->execute([
                ':livro' => $_POST['livro'],
                ':usuario' => $_POST['usuario'],
                ':data_emprestimo' => $_POST['data_emprestimo'],
                ':data_devolucao' => $_POST['data_devolucao'], 
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }
    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM emprestimos
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formEmprestimo.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM emprestimos
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }

}
