
<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "meu_banco";

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
