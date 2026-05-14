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
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO exames (nome_exame, tipo, valor, resultado) 
                                VALUES (:nome_exame, :tipo, :valor, :resultado)");
            $stmt->execute([
                ':nome_exame' => $_POST['nome_exame'],
                ':tipo' => $_POST['tipo'],
                ':valor' => $_POST['valor'],
                ':resultado' => $_POST['resultado']
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE exames SET
                nome_exame = :nome_exame, tipo = :tipo, valor = :valor, resultado = :resultado WHERE id = :id");
            $stmt->execute([
                ':nome_exame' => $_POST['nome_exame'],
                ':tipo' => $_POST['tipo'],
                ':valor' => $_POST['valor'],
                ':resultado' => $_POST['resultado'], 
                ':id' => $_POST['id']
            ]);
        }
        header("Location: ?acao=index");
        exit;
    }
    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM exames
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        include '_cabecalho.php';
        include 'formExame.php';
        include '_rodape.php';
    }
    public function remover() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM exames
                               WHERE id = :id");
        $stmt->execute(['id' => $id]);
        header("Location: ?acao=index");
        exit;
    }

}
