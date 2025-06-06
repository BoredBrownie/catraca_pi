
<?php
$host = getenv("DB_HOST");
$usuario = getenv("DB_USER");
$senha = getenv("DB_PASSWORD");
$banco = getenv("DB_NAME");

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>
