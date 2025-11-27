<?php
// Conexão com o banco de dados
$host = "localhost";
$user = "root";
$pass = "root"; //Alteração da senha para root, estava vazia anteriormente.
$db = "manutencao";

$conn = mysqli_connect($host, $user, $pass, $db); //A variável apresentava um nome incorreto, corrigido para $host.

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>