<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trabalho prático PHP</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2> Preencha os campos corretamente </h2>

    <div> 
      <form action="" method="post">
        <div id="centro"> 
          Valor total da Prova 1:  <input type="number" name="prova1" ><br>
          Valor total da Prova 2:  <input type="number" name="prova2" ><br>
          Nota da prova 1:  <input type="number" name="nota1" ><br>
          Nota da prova 2:  <input type="number" name="nota2" ><br>
          
          <input type="submit" name="submit" value="Calcular">
        </div>
      </form>

      <?php
      if(isset($_POST['submit'])){
          if(isset($_POST['prova1']) && isset($_POST['prova2']) && isset($_POST['nota1']) && isset($_POST['nota2'])) {
              $prova1 = $_POST['prova1'];
              $prova2 = $_POST['prova2'];
              $nota1 = $_POST['nota1'];
              $nota2 = $_POST['nota2'];

              $total_pontos = $prova1 + $prova2;
              $porcentagem1 = round(($nota1 / $prova1) * 100);
              $porcentagem2 = round(($nota2 / $prova2) * 100);
              $pontos_totais = $nota1 + $nota2;
              $porcentagem_total = round(($pontos_totais / $total_pontos) * 100);

              echo "<br><strong> Resultado </strong><br> <br>";
              if (isset($total_pontos)) {
                  echo "O valor total das duas provas é $total_pontos pontos.<br>";
              } else {
                  echo "Erro: Valor total das provas não definido.<br>";
              }
              if (isset($porcentagem1)) {
                  echo "Em relação à Prova 1, o aluno obteve $porcentagem1% do total.<br>";
              } else {
                  echo "Erro: Porcentagem da Prova 1 não definida.<br>";
              }
              if (isset($porcentagem2)) {
                  echo "Em relação à Prova 2, o aluno obteve $porcentagem2% do total.<br>";
              } else {
                  echo "Erro: Porcentagem da Prova 2 não definida.<br>";
              }
              if (isset($pontos_totais)) {
                  echo "O aluno totalizou, com as duas provas, $pontos_totais pontos.<br>";
              } else {
                  echo "Erro: Pontuação total não definida.<br>";
              }
              if (isset($porcentagem_total)) {
                  echo "A porcentagem obtida pelo aluno em função do total foi de $porcentagem_total%.<br>";
              } else {
                  echo "Erro: Porcentagem total não definida.<br>";
              }

              if ($porcentagem_total < 60) {
                  echo "O conceito do aluno foi Péssimo.";
              } elseif ($porcentagem_total >= 60 && $porcentagem_total < 70) {
                  echo "O conceito do aluno foi Ruim.";
              } elseif ($porcentagem_total >= 70 && $porcentagem_total < 80) {
                  echo "O conceito do aluno foi Bom.";
              } elseif ($porcentagem_total >= 80 && $porcentagem_total < 90) {
                  echo "O conceito do aluno foi Ótimo.";
              } elseif ($porcentagem_total >= 90 && $porcentagem_total <= 100) {
                  echo "O conceito do aluno foi Excelente.";
              }
          } else {
              echo "Por favor, preencha todos os campos.";
          }
      }
      ?>
    </div>
  </div>
</body>
</html>
