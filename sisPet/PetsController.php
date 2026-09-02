<?php
require_once 'db.php';

$controller = new PetsController();

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
    case 'pesquisar':
        $controller->pesquisar();
        break;
    case 'pesquisarCategorias':
        $controller->pesquisarCategorias();
        break;
     default:
        $controller->index();
}
class PetsController {

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM pets");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaPet.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formPet.php';
        include '_rodape.php';
    }


public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM 
                                pets
                                WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);
        
        include '_cabecalho.php';
        include 'formPet.php';
        include '_rodape.php';
    }

    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO 
                                pets (cliente_id, nome, especie, raca, data_nascimento, peso) 
                                VALUES (:cliente_id, :nome, :especie, :raca, :data_nascimento, :peso)");
            $stmt->execute([
                ':cliente_id' => $_POST['cliente_id'],
                ':nome' => $_POST['nome'],
                ':especie' => $_POST['especie'],
                ':raca' => $_POST['raca'],
                ':data_nascimento' => $_POST['data_nascimento'],
                ':peso' => $_POST['peso']
            ]); 
        } else { 
            $stmt = $pdo->prepare("UPDATE pets SET 
                                    cliente_id = :cliente_id, nome = :nome,  especie = :especie, raca = :raca, data_nascimento = :data_nascimento, peso = :peso
                                    WHERE id = :id"); 
            $stmt->execute([
                ':cliente_id' => $_POST['cliente_id'],
                ':nome' => $_POST['nome'],
                ':especie' => $_POST['especie'],
                ':raca' => $_POST['raca'],
                ':data_nascimento' => $_POST['data_nascimento'],
                ':peso' => $_POST['peso'],
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
                                pets 
                                WHERE id = :id");
        $stmt->execute([':id' => $id]);
        header("Location: ?acao=index");
        exit;
    }

    public function pesquisar() {
        $pdo = getConnection();
        $busca = $_POST['busca'] ?? '';
        $especie = $_POST['especie'] ?? '';
        $cliente_id = $_POST['cliente_id'] ?? '';

        $stmt = $pdo->prepare(
            "SELECT * FROM pets 
            WHERE nome LIKE :busca AND
            especie like :especie AND
            cliente_id like :cliente_id;"
        );
        $stmt->execute(
            [':busca' => '%' . $busca . '%',
             ':especie' => '%' . $especie . '%',
             ':cliente_id' => '%' . $cliente_id. '%']
        );
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaPet.php';
        include '_rodape.php';
    }
}
