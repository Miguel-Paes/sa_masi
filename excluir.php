<?php
require_once 'conexao.php';
if (!isset($_GET['id'])) {
    die('ID não informado');
}
$id = $_GET['id'];

//Função de validação da exclusão

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['resposta'])) {
        if ($_POST['resposta'] === 'sim') {
            $sql = "DELETE FROM clientes WHERE id = $id";
            mysqli_query($conn, $sql);
        }
        header('Location: index.php?msg=excluido'); //Redireciona para a página inicial, com mensagem de confirmação. Antes, redirecionava para editar.php, corrigido.
        exit;
    }
}

//Função de validação da exclusão
?>

<!-- Formulário necessário para a validação -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tem certeza?</title>
</head>

<body>
    <section class="card">
        <h1>Tem certeza que deseja excluir este cliente?</h1>
        <form method="post" action="excluir.php?id=<?php echo $id; ?>">
            <button type="submit" name="resposta" value="sim">Sim</button>
            <button type="submit" name="resposta" value="nao">Não</button>
        </form>
    </section>
</body>

</html>