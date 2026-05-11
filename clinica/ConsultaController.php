<?php
require_once 'db.php';

$controller = new ConsultaController();

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

class ConsultaController {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM consultas");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaConsulta.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formConsulta.php';
        include '_rodape.php';
    }


    public function salvar() {
        $pdo = getConnection();

        $stmt = $pdo->prepare("INSERT INTO consultas (data_consulta, hora, valor, tipo) 
                                VALUES (:data_consulta, :hora, :valor, :tipo)");
        $stmt->execute([
            ':data_consulta' => $_POST['data_consulta'],
            ':hora' => $_POST['hora'],
            ':valor' => $_POST['valor'],
            ':tipo' => $_POST['tipo']
        ]);
           
        header("Location: ?acao=index");
        exit;
    }

}
