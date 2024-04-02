<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Calculadora de IMC</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Calculadora de IMC</h2>

    <div> 
      <form action="" method="post">
        <div id="centro"> 
          Peso (kg): <input type="number" name="peso" step="0.01" required ><br>
          Altura (cm): <input type="number" name="altura" step="1" required > <br>
        </div>
        <input type="submit" name="submit" value="Calcular IMC">
      </form>

      <?php
      if(isset($_POST['submit'])) {
        $peso = filter_input(INPUT_POST, 'peso', FILTER_VALIDATE_FLOAT);
        $altura_cm = filter_input(INPUT_POST, 'altura', FILTER_VALIDATE_INT);

        if (!$peso || !$altura_cm || $altura_cm <= 0) {
          echo "<p style='color: red'>Por favor, insira valores válidos para peso e altura.</p>";
        } else {
          // Converter altura para metros
          $altura_m = $altura_cm / 100;

          // Calcular IMC
          $imc = $peso / ($altura_m * $altura_m);

          // Exibir resultado
          echo "<h3>Seu IMC é: " . number_format($imc, 2) . "</h3>";
          echo "<p class='resultado'>" . interpretarIMC($imc) . "</p>";
        }
      }

      function interpretarIMC($imc) {
        if ($imc < 18.5) {
          return "Você está abaixo do peso.";
        } elseif ($imc < 24.9) {
          return "Seu peso está normal.";
        } elseif ($imc < 29.9) {
          return "Você está com sobrepeso.";
        } elseif ($imc < 34.9) {
          return "Você está com obesidade grau I.";
        } elseif ($imc < 39.9) {
          return "Você está com obesidade grau II (severa).";
        } else {
          return "Você está com obesidade grau III (mórbida).";
        }
      }
      ?>
    </div>
  </div>
</body>
</html>
