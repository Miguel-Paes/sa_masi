<?php
require_once 'conexao.php';

if (!isset($_GET['id'])) {
  die('ID não informado');
}

$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nome = $_POST['nome'];
  $cpf = $_POST['cpf'];


  $sql_update = "UPDATE clientes SET nome = '$nome', cpf = '$cpf' WHERE id = $id"; //Variáveis estavam invertidas, corrigido.
  mysqli_query($conn, $sql_update);

  header('Location: index.php?msg=editado'); //Adição da mensagem de confirmação na URL
  exit;
}
?>
<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Editar Cliente</title>
</head>

<body>
  <h1>Editar</h1>
  <form method="post">
    <label>Nome:<br><input type="text" name="nome" value="<?php echo $row['nome']; ?>"></label><br><br>
    <label>CPF:<br><input type="text" name="cpf" value="<?php echo $row['cpf']; ?>"></label><br><br>
    <button type="submit">Atualizar</button>
  </form>
  <p><a href="index.php">Voltar</a></p>
</body>

</html>