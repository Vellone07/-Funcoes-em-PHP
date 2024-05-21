<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação de Números</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <div class="container">
        <h1>Verifique seus números</h1>
        <form method="post">
            <label for="numeros">Digite 5 números separados por vírgula:</label><br>
            <input type="text" id="numeros" name="numeros" required><br>
            <input type="submit" value="Verificar">
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Funções para verificar paridade e positividade
            function parOuImpar($numero) {
                if ($numero == 0) {
                    return "neutro";
                } elseif ($numero % 2 == 0) {
                    return "par";
                } else {
                    return "ímpar";
                }
            }

            function positivoNegativoOuZero($numero) {
                if ($numero > 0) {
                    return "positivo";
                } elseif ($numero < 0) {
                    return "negativo";
                } else {
                    return "zero";
                }
            }

            // Recebe os números do formulário e exibe os resultados
            if (isset($_POST['numeros'])) {
                $numerosInput = $_POST['numeros'];
                $numerosArray = explode(',', $numerosInput);

                if (count($numerosArray) == 5) {
                    foreach ($numerosArray as $numero) {
                        $numero = trim($numero);
                        if (is_numeric($numero)) {
                            $numero = (int)$numero;
                            $paridade = parOuImpar($numero);
                            $positividade = positivoNegativoOuZero($numero);

                            if ($numero == 0) {
                                echo "<p>O número $numero é $paridade.</p>";
                            } else {
                                echo "<p>O número $numero é $paridade e é $positividade.</p>";
                            }
                        } else {
                            echo "<p>Entrada inválida: '$numero' não é um número válido.</p>";
                        }
                    }
                } else {
                    echo "<p>Por favor, insira exatamente 5 números separados por vírgula.</p>";
                }
            }
        }
        ?>
    </div>
</body>
</html>
