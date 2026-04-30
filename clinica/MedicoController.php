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

        $stmt = $pdo->prepare("INSERT INTO medicos (nome, especialidade, crm, salario) 
                                VALUES (:nome, :especialidade, :crm, :salario)");
        $stmt->execute([
            ':nome' => $_POST['nome'],
            ':especialidade' => $_POST['especialidade'],
            ':crm' => $_POST['crm'],
            ':salario' => $_POST['salario']
        ]);
           
        header("Location: ?acao=index");
        exit;
    }

}
