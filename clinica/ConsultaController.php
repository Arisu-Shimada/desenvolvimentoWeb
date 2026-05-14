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
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO consultas (data_consulta, hora, valor, tipo) 
                                VALUES (:data_consulta, :hora, :valor, :tipo)");
            $stmt->execute([
                ':data_consulta' => $_POST['data_consulta'],
                ':hora' => $_POST['hora'],
                ':valor' => $_POST['valor'],
                ':tipo' => $_POST['tipo']
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE consultas SET
                data_consulta = :data_consulta, hora = :hora, valor = :valor, tipo = :tipo WHERE id = :id");
            $stmt->execute([
                ':data_consulta' => $_POST['data_consulta'],
                ':hora' => $_POST['hora'],
                ':valor' => $_POST['valor'],
                ':tipo' => $_POST['tipo'], 
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }
    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM consultas
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formConsulta.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM consultas
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }

}
