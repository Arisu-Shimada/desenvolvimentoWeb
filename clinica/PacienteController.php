<?php
require_once 'db.php';

$controller = new PacienteController();

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

class PacienteController {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM pacientes");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaPaciente.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formPaciente.php';
        include '_rodape.php';
    }

    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO pacientes (nome, idade, telefone, email) 
                                VALUES (:nome, :idade, :telefone, :email)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':idade' => $_POST['idade'],
                ':telefone' => $_POST['telefone'],
                ':email' => $_POST['email'],
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE pacientes SET
                nome = :nome, idade = :idade, telefone = :telefone, email = :email WHERE id = :id");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':idade' => $_POST['idade'],
                ':telefone' => $_POST['telefone'],
                ':email' => $_POST['email'],
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }
    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM pacientes
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formPaciente.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM pacientes
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }

}
