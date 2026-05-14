<?php
require_once 'db.php';

$controller = new MedicoController();

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

class MedicoController {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM medicos");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaMedico.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formMedico.php';
        include '_rodape.php';
    }


    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO medicos (nome, especialidade, crm, salario) 
                                VALUES (:nome, :especialidade, :crm, :salario)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':especialidade' => $_POST['especialidade'],
                ':crm' => $_POST['crm'],
                ':salario' => $_POST['salario']
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE medicos SET
                nome = :nome, especialidade = :especialidade, crm = :crm, salario = :salario WHERE id = :id");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':especialidade' => $_POST['especialidade'],
                ':crm' => $_POST['crm'],
                ':salario' => $_POST['salario'],
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }
    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM medicos
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formMedico.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM medicos
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }

}
