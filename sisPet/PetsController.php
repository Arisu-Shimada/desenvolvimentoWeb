<?php
require_once 'AutController.php';
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
    
    public function __construct() {
        AutController::verificarAutenticacao();
    }

    private $pasta_imagens = "imagens_pet/"; // pasta para salvar imagens dos produtos
    private $ext_imagem = ".jpg"; // extensão padrão para todas as imagens

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

        $id = $_POST['id'] == '' ? $pdo->lastInsertId() : $_POST['id'];
        $this->uploadImagem($id);

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

        $this->excluirImagem($id);

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

    private function uploadImagem($id) {
        if (!is_dir($this->pasta_imagens)) { // se nao existir a pasta, cria
            mkdir($this->pasta_imagens, 0777, true); // cria pasta
        }

        if (empty($_FILES['input_imagem']['name'])) { // sem envio de arquivo, apenas sair do método uploadImagem
            return;
        }

        $arquivo = $_FILES['input_imagem']; // vetor global $_FILES possui os dados arquivo selecionado para upload
        $novo_nome = $id . $this->ext_imagem;
        $caminho_final = $this->pasta_imagens . $novo_nome;

        try { // Move o arquivo enviado da pasta temporária para o caminho e nome definidos
            $sucesso = move_uploaded_file($arquivo['tmp_name'], $caminho_final);
            if ($sucesso === false) {
                throw new Exception("Não foi possível mover o arquivo '{$arquivo['tmp_name']}' para '{$caminho_final}'.");
            }
        } catch (Exception $e) {
            die("Erro no upload da imagem: " . $e->getMessage());
        }

        $pdo = getConnection();
        $stmt = $pdo->prepare("UPDATE pets SET url_imagem_pet = :url_imagem_pet WHERE id = :id");
        $stmt->execute([
            ':url_imagem_pet' => $caminho_final,
            ':id' => $id
        ]);
    }

    private function excluirImagem($id) {
        // Remove imagem
        $caminho_imagem = $this->pasta_imagens . $id . $this->ext_imagem;
        if (file_exists($caminho_imagem)) {
            unlink($caminho_imagem);
        }

    }
}
