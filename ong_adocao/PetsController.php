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
    private $pasta_imagens = "imagens_animal/"; // pasta para salvar imagens dos produtos
    private $ext_imagem = ".jpg"; // extensão padrão para todas as imagens

    public function __construct() {
        AutController::verificarAutenticacao();
    }

    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM animais");

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
                                animais
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
                                animais (nome, especie, idade, cidade) 
                                VALUES (:nome, :especie, :idade, :cidade)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':especie' => $_POST['especie'],
                ':idade' => $_POST['idade'],
                ':cidade' => $_POST['cidade']
            ]); 
        } else { 
            $stmt = $pdo->prepare("UPDATE animais SET 
                                    nome = :nome,  especie = :especie, idade = :idade, cidade = :cidade
                                    WHERE id = :id"); 
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':especie' => $_POST['especie'],
                ':idade' => $_POST['idade'],
                ':cidade' => $_POST['cidade'],
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
                                animais 
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

        $stmt = $pdo->prepare(
            "SELECT * FROM animais 
            WHERE nome LIKE :busca AND
            especie LIKE :especie;"
        );
        $stmt->execute(
            [':busca' => '%' . $busca . '%',
             ':especie' => '%' . $especie . '%']
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
        $stmt = $pdo->prepare("UPDATE animais SET url_imagem_animal = :url_imagem_animal WHERE id = :id");
        $stmt->execute([
            ':url_imagem_animal' => $caminho_final,
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
