
<?php include("conexao.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro</title>
    <style>
        .gaveta { display: none; border: 1px solid #aaa; padding: 10px; margin-top: 20px; background: #f4f4f4; }
        .usuario { border-bottom: 1px solid #ddd; padding: 5px; }
    </style>
    <script>
        function abrirGaveta() {
            document.getElementById("gaveta").style.display = "block";
        }
        function fecharGaveta() {
            document.getElementById("gaveta").style.display = "none";
        }
    </script>
</head>
<body>
    <nav>
        <a href="index.php">HOME</a> |
        <a href="cadastro.php">CADASTRO</a> |
        <a href="relatorios.php">RELATÓRIOS DE ACESSO</a>
    </nav>

    <h2>Usuários Cadastrados</h2>
    <form method="GET">
        <input type="text" name="busca" placeholder="Buscar por nome ou e-mail">
        <button type="submit">Buscar</button>
        <button type="button" onclick="abrirGaveta()">Criar</button>
    </form>

    <div>
        <?php
        $filtro = "";
        if (!empty($_GET['busca'])) {
            $busca = $conn->real_escape_string($_GET['busca']);
            $filtro = "WHERE nome LIKE '%$busca%' OR email LIKE '%$busca%'";
        }

        $sql = "SELECT * FROM usuarios $filtro";
        $res = $conn->query($sql);

        while ($row = $res->fetch_assoc()) {
            echo "<div class='usuario'>
                <strong>{$row['nome']}</strong> – {$row['email']} – ID: {$row['id']} – {$row['status']}
            </div>";
        }
        ?>
    </div>

    <div id="gaveta" class="gaveta">
        <h3>Novo Usuário</h3>
        <form action="salvar_usuario.php" method="POST" enctype="multipart/form-data">
            <label>Nome Completo *</label><br>
            <input type="text" name="nome" required><br>

            <label>E-mail *</label><br>
            <input type="email" name="email" required><br>

            <label>ID *</label><br>
            <input type="number" name="id" required><br>

            <label>Status</label><br>
            <select name="status">
                <option value="Ativo">Ativo</option>
                <option value="Inativo">Inativo</option>
            </select><br>

            <label>Incluir Foto *</label><br>
            <input type="file" name="foto" required><br><br>

            <button type="submit">Salvar</button>
            <button type="button" onclick="fecharGaveta()">Fechar</button>
        </form>
    </div>
</body>
</html>
