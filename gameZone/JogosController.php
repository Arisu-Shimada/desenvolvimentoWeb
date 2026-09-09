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
    case 'pesquisar':
        $controller->pesquisar();
        break;
    case 'pesquisarCategorias':
        $controller->pesquisarCategorias();
        break;
     default:
        $controller->index();
}
class JogosController {
    private $pasta_imagens = "imagens_pet/"; // pasta para salvar imagens dos produtos
    private $ext_imagem = ".jpg"; // extensão padrão para todas as imagens

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

        $id = $_POST['id'] == '' ? $pdo->lastInsertId() : $_POST['id'];
        $this->uploadImagem($id);

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

    public function pesquisar() {
        $pdo = getConnection();
        $busca = $_POST['busca'] ?? '';
        $categoria = $_POST['categoria'] ?? '';
        $nota_minima = $_POST['nota_minima'] ?? '';

        $stmt = $pdo->prepare(
            "SELECT * FROM jogos 
            WHERE nome LIKE :busca AND
            categoria like :categoria AND
            nota_media > :nota_minima;"
        );
        $stmt->execute(
            [':busca' => '%' . $busca . '%',
             ':categoria' => '%' . $categoria . '%',
             ':nota_minima' => $nota_minima]
        );
        $dados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        include '_cabecalho.php';
        include 'listaJogo.php';
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
        $stmt = $pdo->prepare("UPDATE jogos SET url_imagem_jogo = :url_imagem_jogo WHERE id = :id");
        $stmt->execute([
            ':url_imagem_jogo' => $caminho_final,
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
