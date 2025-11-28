<?php
require_once 'conexao.php';

$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    
    // Validação básica dos campos
    if (empty($nome) || empty($cpf)) {
        $erro = 'Por favor, preencha todos os campos!';
    } else {
        // Verificar se o CPF já existe
        $sql_check = "SELECT id FROM clientes WHERE cpf = '" . mysqli_real_escape_string($conn, $cpf) . "'";
        $result_check = mysqli_query($conn, $sql_check);
        
        if (!$result_check) {
            $erro = 'Erro ao verificar CPF: ' . mysqli_error($conn);
            echo $erro;
        } elseif (mysqli_num_rows($result_check) > 0) {
            $erro = 'Este CPF já está cadastrado!';
            echo $erro;
        } else {
            // Inserir novo cliente
            $sql = "INSERT INTO clientes (nome, cpf) VALUES ('" . mysqli_real_escape_string($conn, $nome) . "', '" . mysqli_real_escape_string($conn, $cpf) . "')";
            
            if (mysqli_query($conn, $sql)) {
                header('Location: index.php');
                exit;
            } else {
                $erro = 'Erro ao cadastrar cliente: ' . mysqli_error($conn);
                echo $erro;
            }
        }
    }
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
    <label>Nome:<br><input type="text" name="nome" required></label><br><br>
    <label>CPF:<br><input type="text" name="cpf" required></label><br><br>
    <button type="">Salvar</button>
  </form>

  <p><a href="index.php">Voltar</a></p>
  <!--Alteração do link de voltar, estava apontando para index, corrigido para index.php. -->
</body>

</html>