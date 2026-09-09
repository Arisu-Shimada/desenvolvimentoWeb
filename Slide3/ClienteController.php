<?php
require_once("db.php");
$controller = new ClienteController();

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
     default:
        $controller->index();
}
class ClienteController {
    private $pasta_imagens = "imagens_cliente/"; // pasta para salvar imagens dos produtos
    private $ext_imagem = ".jpg"; // extensão padrão para todas as imagens


    public function index() {
        $pdo = getConnection();
        $stmt = $pdo->query("SELECT * FROM clientes");

        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaCliente.php';
        include '_rodape.php';
    }

    public function novo(){
        include '_cabecalho.php';
        include 'formCliente.php';
        include '_rodape.php';
    }


    public function editar() {
        $id = $_GET['id'];
        $pdo = getConnection();
        $stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $dado = $stmt->fetch(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'formCliente.php';
        include '_rodape.php';
    }

    public function salvar() {
        $pdo = getConnection();
        if ($_POST['id']=="") {
            $stmt = $pdo->prepare("INSERT INTO
                                clientes (nome, email, telefone, cidade)
                                VALUES (:nome, :email, :telefone, :cidade)");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':email' => $_POST['email'],
                ':telefone' => $_POST['telefone'],
                ':cidade' => $_POST['cidade']
            ]);
        } else {
            $stmt = $pdo->prepare("UPDATE clientes SET
                                    nome = :nome, email = :email, telefone = :telefone, cidade = :cidade
                                    WHERE id = :id");
            $stmt->execute([
                ':nome' => $_POST['nome'],
                ':email' => $_POST['email'],
                ':telefone' => $_POST['telefone'],
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
                                clientes 
                                WHERE id = :id");
        $stmt->execute([':id' => $id]);

        $this->excluirImagem($id);

        header("Location: ?acao=index");
        exit;
    }


    public function pesquisar() {
        $pdo = getConnection();
        $busca = $_POST['busca'] ?? '';

        $stmt = $pdo->prepare("SELECT * FROM clientes WHERE nome LIKE :busca");
        $stmt->execute([':busca' => '%' . $busca . '%']);
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaCliente.php';
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
        $stmt = $pdo->prepare("UPDATE clientes SET url_imagem_cliente = :url_imagem_cliente WHERE id = :id");
        $stmt->execute([
            ':url_imagem_cliente' => $caminho_final,
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
