
<?php
include("conexao.php");

$nome = $_POST['nome'];
$email = $_POST['email'];
$id = $_POST['id'];
$status = $_POST['status'];

// Foto
$foto_nome = $_FILES['foto']['name'];
$foto_tmp = $_FILES['foto']['tmp_name'];
$destino = "uploads/" . $foto_nome;

move_uploaded_file($foto_tmp, $destino);

$sql = "INSERT INTO usuarios (id, nome, email, status, foto)
        VALUES ('$id', '$nome', '$email', '$status', '$destino')";

if ($conn->query($sql) === TRUE) {
    header("Location: cadastro.php");
} else {
    echo "Erro: " . $conn->error;
}
?>
