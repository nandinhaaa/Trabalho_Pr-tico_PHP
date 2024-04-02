<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Triângulo Retângulo</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Preencha os campos corretamente:</h2>

    <form action="" method="post">
      Altura do triângulo: <input type="number" name="altura" min="1" max="50" required><br>
      Caractere de preenchimento: <input type="text" name="caractere" maxlength="1" required><br>
      Cor de preenchimento:
      <select name="corPreenchimento" required>
        <option value="red">Vermelho</option>
        <option value="blue">Azul</option>
        <option value="green">Verde</option>
        <option value="yellow">Amarelo</option>
        <option value="black">Preto</option>
      </select><br>
      <input type="submit" name="submit" value="Gerar triângulo">
    </form>

    <?php
    if(isset($_POST['submit'])) {
      $altura = filter_input(INPUT_POST, 'altura', FILTER_VALIDATE_INT);
      $caractere = filter_input(INPUT_POST, 'caractere', FILTER_SANITIZE_STRING);
      $corPreenchimento = filter_input(INPUT_POST, 'corPreenchimento', FILTER_SANITIZE_STRING);

      // Validar dados
      if (!$altura || !$caractere || !$corPreenchimento) {
        echo "<p style='color: red'>Erro: Todos os campos são obrigatórios!</p>";
        exit;
      }

      // Gerar triângulo
      echo "<h2>Triângulo Gerado:</h2>";
      echo "<pre class='triangulo' style='color: $corPreenchimento'>";
      for ($i = 1; $i <= $altura; $i++) {
        echo str_repeat($caractere, $i) . "<br>";
      }
      echo "</pre>";
    }
    ?>
  </div>
</body>
</html>
