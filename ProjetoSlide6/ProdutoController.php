<?php
require_once 'db.php';

$controller = new JogosController();

$acao = $_GET['acao'] ?? 'index';
switch ($acao) {
    case 'novo':
        $controller->novo();
        break;
    case 'editar':
        $controller->editar();
        break;
    case 'salvar':
        $controller->salvar();
        break;
    case 'excluir':
        $controller->excluir();
        break;
     default:
        $controller->index();
}
class JogosController {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM jogos");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaJogo.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formJogo.php';
        include '_rodape.php';
    }


public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM 
                                jogos 
                                WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        include '_cabecalho.php';
        include 'formJogo.php';
        include '_rodape.php';
    }

    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO 
                                jogos (nome, categoria, descricao, nota_media) 
                                VALUES (:nome, :categoria, :descricao, :nota_media)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':categoria' => $_POST['categoria'],
                ':descricao' => $_POST['descricao'],
                ':nota_media' => $_POST['nota_media']
            ]); 
        } else { 
            $stmt = $pdo->prepare("UPDATE jogos SET 
                                    nome = :nome, categoria = :categoria,  descricao = :descricao, nota_media = :nota_media
                                    WHERE id = :id"); 
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':categoria' => $_POST['categoria'],
                ':descricao' => $_POST['descricao'],
                ':nota_media' => $_POST['nota_media'],
                ':id' => $_POST['id']
            ]); 
        }
        header("Location: ?acao=index");
        exit;
    }  

    public function excluir() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("DELETE FROM 
                                jogos 
                                WHERE id = :id");
        $stmt->execute([':id' => $id]);
        header("Location: ?acao=index");
        exit;
    }



}
