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

        $stmt = $pdo->prepare("INSERT INTO pacientes (nome, idade, telefone, email) 
                                VALUES (:nome, :idade, :telefone, :email)");
        $stmt->execute([
            ':nome' => $_POST['nome'],
            ':idade' => $_POST['idade'],
            ':telefone' => $_POST['telefone'],
            ':email' => $_POST['email'],
        ]);
           
        header("Location: ?acao=index");
        exit;
    }

}
