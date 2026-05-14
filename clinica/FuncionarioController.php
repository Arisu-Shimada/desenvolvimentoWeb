<?php
require_once 'db.php';

$controller = new FuncionarioController();

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

class FuncionarioController {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM funcionarios");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaFuncionario.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formFuncionario.php';
        include '_rodape.php';
    }

    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO funcionarios (nome, cargo, salario, data_admissao) 
                                VALUES (:nome, :cargo, :salario, :data_admissao)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':cargo' => $_POST['cargo'],
                ':salario' => $_POST['salario'],
                ':data_admissao' => $_POST['data_admissao']
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE funcionarios SET
                nome = :nome, cargo = :cargo, salario = :salario, data_admissao = :data_admissao WHERE id = :id");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':cargo' => $_POST['cargo'],
                ':salario' => $_POST['salario'],
                ':data_admissao' => $_POST['data_admissao'], 
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }
    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM funcionarios
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formFuncionario.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM funcionarios
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }

}
