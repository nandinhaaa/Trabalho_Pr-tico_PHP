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
          Largura:  <input type="number" name="largura" required ><br>
          Altura:   <input type="number" name="altura" required > <br>
          Caractere da Borda:   <input type="text" name="caractere" maxlength="1" required> <br>
          Cor da borda:  
          <select name="corBorda" id="">
            <option value="red">Vermelho</option>
            <option value="blue">Azul</option>
            <option value="green">Verde</option>
            <option value="yellow">Amarelo</option>
            <option value="black">Preto</option>
          </select> <br>
        </div>

        Caractere de Preenchimento <input type="text" name="caractereP" maxlength="1" required> <br>

        Cor do preenchimento:  
        <select name="corPreenchimento" id="">
          <option value="red">Vermelho</option>
          <option value="blue">Azul</option>
          <option value="green">Verde</option>
          <option value="yellow">Amarelo</option>
          <option value="black">Preto</option>
        </select> <br>

        <input type="submit" name="submit" value="Gerar retângulo">
      </form>

      <?php
      if(isset($_POST['submit'])) {
        // Obter dados do formulário
        $largura = filter_input(INPUT_POST, 'largura', FILTER_VALIDATE_INT);
        $altura = filter_input(INPUT_POST, 'altura', FILTER_VALIDATE_INT);
        $caractereBorda = filter_input(INPUT_POST, 'caractere', FILTER_SANITIZE_STRING);
        $caracterePreenchimento = filter_input(INPUT_POST, 'caractereP', FILTER_SANITIZE_STRING);
        $corBorda = filter_input(INPUT_POST, 'corBorda', FILTER_SANITIZE_STRING);
        $corPreenchimento = filter_input(INPUT_POST, 'corPreenchimento', FILTER_SANITIZE_STRING);

        // Validar dados
        if (!$largura || !$altura || !$caractereBorda || !$caracterePreenchimento || !$corBorda || !$corPreenchimento) {
          echo "<p style='color: red'>Erro: Todos os campos são obrigatórios!</p>";
          exit;
        }

        // Gerar o retângulo como string
        $resultado = "";

        // Borda superior
        for ($i = 0; $i < $largura; $i++) {
          $resultado .= "<span style='color: $corBorda'>$caractereBorda</span>";
        }
        $resultado .= "<br>"; // Nova linha

        // Linhas intermediárias (preenchimento)
        for ($i = 1; $i < $altura - 1; $i++) {
          $resultado .= "<span style='color: $corBorda'>$caractereBorda</span>";
          for ($j = 1; $j < $largura - 1; $j++) {
            $resultado .= "<span style='color: $corPreenchimento'>$caracterePreenchimento</span>";
          }
          $resultado .= "<span style='color: $corBorda'>$caractereBorda</span>";
          $resultado .= "<br>"; // Nova linha
        }

        // Borda inferior
        for ($i = 0; $i < $largura; $i++) {
          $resultado .= "<span style='color: $corBorda'>$caractereBorda</span>";
        }
        $resultado .= "<br> "; // Nova linha

        // Exibir o resultado dentro de uma pre tag para manter a formatação
        echo "<br>";
        echo "<h2> Retangulo gerado com sucesso! </h2>";
        echo "<pre style='color: $corPreenchimento; text-align: center; margin: 0 auto;'>$resultado</pre>";

      }
      ?>
    </div>
  </div>
</body>
</html>
