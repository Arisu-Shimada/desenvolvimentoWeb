<?php
require_once 'db.php';

$controller = new ExameController();

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

class ExameController {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM exames");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaExame.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formExame.php';
        include '_rodape.php';
    }


    public function salvar() {
        $pdo = getConnection();

        $stmt = $pdo->prepare("INSERT INTO exames (nome_exame, tipo, valor, resultado) 
                                VALUES (:nome_exame, :tipo, :valor, :resultado)");
        $stmt->execute([
            ':nome_exame' => $_POST['nome_exame'],
            ':tipo' => $_POST['tipo'],
            ':valor' => $_POST['valor'],
            ':resultado' => $_POST['resultado']
        ]);
           
        header("Location: ?acao=index");
        exit;
    }

}
