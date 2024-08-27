<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>
</head>
<body>
    <h1>Calcular Valor Total da Refeição</h1>
    
    <?php
    // Definindo a classe Restaurante
    class Restaurante {
        private $valorPrato;
        private $percentualGarcom = 0.10; // 10%

        public function __construct($valorPrato) {
            $this->valorPrato = $valorPrato;
        }

        private function calcularValorGarcom() {
            return $this->valorPrato * $this->percentualGarcom;
        }

        public function exibirValorTotal() {
            $valorGarcom = $this->calcularValorGarcom();
            $valorTotal = $this->valorPrato + $valorGarcom;
            echo "<p>Valor do Prato: R$ " . number_format($this->valorPrato, 2) . "</p>";
            echo "<p>Valor do Garçom (10%): R$ " . number_format($valorGarcom, 2) . "</p>";
            echo "<p><strong>Valor Total a Pagar: R$ " . number_format($valorTotal, 2) . "</strong></p>";
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $valorPrato = isset($_POST['valor_prato']) ? floatval($_POST['valor_prato']) : 0;

        // Criar um objeto da classe Restaurante e exibir o valor total
        $restaurante = new Restaurante($valorPrato);
        $restaurante->exibirValorTotal();
    } else {
        ?>
        <form action="restaurante.php" method="post">
            <label for="valor_prato">Valor do Prato:</label>
            <input type="number" step="0.01" name="valor_prato" id="valor_prato" required><br><br>
            <input type="submit" value="Calcular Total">
        </form>
        <?php
    }
    ?>
</body>
</html>
