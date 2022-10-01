<?php include_once('./calcsign.php'); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/bootstrap.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <title>Forum: Disciplina Sistemas Web</title>
</head>
<?php
  $nome = $_POST['nome'];
  $datanasc = $_POST['datanasc'];
  $signo = calcsign($datanasc);
  $className = getClassName($signo->nome);
?>
<body>
  <div class="container">
    <div class="row">
      <header class="col-12">
        <h1 class="display-2">
          Qual é o seu Signo
        </h1>
      </header>
      <div class="col">
        <div class="card">
          <div class="card-header">
            Qual é o seu signo - Resultado
          </div>
          <div class="card-body">
            <h5 class="card-title">Olá, <?php echo $nome;?>! O seu signo é <span class="badge bg-success"><?php echo $signo->nome; ?></span></h5>
            <div class="row">
              <div class="col-12 col-md-3 zodiac <?php echo $className; ?>"></div>
              <div class="col-12 col-md-9">
                <p class="card-text"><?php echo $signo->descricao; ?></p>
              </div>
            </div>
          </div>
        </div>
        <a class="btn btn-link" href="index.html">Voltar</a>
      </div>
    </div>
  </div>
</body>
</html>