<?php
require_once 'conexao.php';

$sql = "SELECT * FROM clientes";
$result = mysqli_query($conn, $sql);

?>

<!-- Mensagens de Confirmação para as ações: Excluir, Editar e Cadastrar clientes -->

<?php if (isset($_GET['msg']) && $_GET['msg'] === 'excluido'): ?>
  <div style="padding:10px; background: #edd4da; color: #571524; border-radius:4px;">
    Cliente excluído com sucesso!
  </div>
<?php endif; ?>

<?php if (isset($_GET['msg']) && $_GET['msg'] === 'editado'): ?>
  <div style="padding:10px; background:rgb(237, 234, 212); color:rgb(87, 64, 21); border-radius:4px;">
    Cliente editado com sucesso!
  </div>
<?php endif; ?>

<?php if (isset($_GET['msg']) && $_GET['msg'] === 'adicionado'): ?>
  <div style="padding:10px; background:rgb(215, 237, 212); color:rgb(32, 87, 21); border-radius:4px;">
    Cliente cadastrado com sucesso!
  </div>
<?php endif; ?>

<!-- Mensagens de Confirmação para as ações: Excluir, Editar e Cadastrar clientes -->

<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>Lista de Clientes</title>
</head>

<body>
  <h1>Clientes</h1>
  <a href="cadastro.php">Cadastrar novo</a>
  <table border="1" cellpadding="5" cellspacing="0">
    <tr>
      <th>ID</th>
      <th>Nome</th>
      <th>CPF</th>
      <th>Ações</th>
    </tr>
    <?php
    if ($result) { //A variável original se chama $result, mas na função, buscava por $results. Problema corrigido.
      while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['nome'] . '</td>';
        echo '<td>' . $row['cpf'] . '</td>';
        echo '<td><a href="editar.php?id=' . $row['id'] . '">Editar</a> | <a href="excluir.php?id=' . $row['id'] . '">Excluir</a></td>';
        echo '</tr>';
      }
    } else {
      echo '<tr><td colspan="4">Nenhum registro encontrado</td></tr>';
    }
    ?>
  </table>
</body>

</html>