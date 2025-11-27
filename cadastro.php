<?php
require_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $cpf = $_POST['cpf']; //A falta do ponto e vírgula aqui causava erro, adicionado e corrigido.

  if (empty($nome) || empty($cpf)) {
    die('Por favor, preencha todos os campos.');
  }
  $sql = "INSERT INTO clientes (nome, cpf) VALUES ('$nome', '$cpf')";
  mysqli_query($conn, $sql);

  if (mysqli_errno($conn) == 1062) {
    echo ('Erro: CPF já cadastrado.');
  } else {
    header('Location: index.php?msg=adicionado'); //Adição da mensagem de confirmação na URL
  }

  exit;
}
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Cadastro</title>
</head>

<body>
  <h1>Cadastrar Cliente</h1>
  <form method="post">
    <label>Nome:<br><input type="text" name="nome"></label><br><br>
    <label>CPF:<br><input type="text" name="cpf"></label><br><br>
    <button type="">Salvar</button>
  </form>

  <p><a href="index.php">Voltar</a></p>
  <!--Alteração do link de voltar, estava apontando para index, corrigido para index.php. -->
</body>

</html>