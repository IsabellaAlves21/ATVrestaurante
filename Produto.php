<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produto</title>
</head>
<body>
    <h1>Cadastro de Produto</h1>

    <?php
    // Definindo a classe Produto
    class Produto {
        private $nome;
        private $precoCompra;
        private $precoVenda;
        private $validade;

        public function __construct($nome, $precoCompra, $validade) {
            $this->nome = $nome;
            $this->precoCompra = $precoCompra;
            $this->precoVenda = $precoCompra * 1.30; // 30% a mais
            $this->validade = $validade;
        }

        public function exibirDetalhes() {
            echo "<p>Nome do Produto: " . htmlspecialchars($this->nome) . "</p>";
            echo "<p>Preço de Compra: R$ " . number_format($this->precoCompra, 2) . "</p>";
            echo "<p>Preço de Venda: R$ " . number_format($this->precoVenda, 2) . "</p>";
            echo "<p>Validade: " . htmlspecialchars($this->validade) . "</p>";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nomeProduto = isset($_POST['nome_produto']) ? trim($_POST['nome_produto']) : '';
        $precoCompra = isset($_POST['preco_compra']) ? floatval($_POST['preco_compra']) : 0;
        $validade = isset($_POST['validade']) ? $_POST['validade'] : '';

        // Criar um objeto da classe Produto e exibir os detalhes
        $produto = new Produto($nomeProduto, $precoCompra, $validade);
        $produto->exibirDetalhes();
    } else {
        ?>
        <form action="produto.php" method="post">
            <label for="nome_produto">Nome do Produto:</label>
            <input type="text" name="nome_produto" id="nome_produto" required><br><br>
            
            <label for="preco_compra">Preço de Compra:</label>
            <input type="number" step="0.01" name="preco_compra" id="preco_compra" required><br><br>
            
            <label for="validade">Validade:</label>
            <input type="date" name="validade" id="validade" required><br><br>
            
            <input type="submit" value="Cadastrar Produto">
        </form>
        <?php
    }
    ?>
</body>
</html>
