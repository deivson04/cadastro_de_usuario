<?php 
require_once "../fachada/fachada.php";

$fachada = new Fachada();
$row = $fachada->buscarUsuario($_GET["id_usuario"]);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Formulário de atualização</h1>
        <form action="../controller/update.php" method="post" class="mt-4">
            <input type="hidden" name="id_usuario" value="<?php echo $row["id_usuario"]; ?>">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $row["nome"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="text" class="form-control" id="email" name="email" value="<?php echo $row["email"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="idade" class="form-label">Idade:</label>
                <input type="text" class="form-control" id="idade" name="idade" value="<?php echo $row["idade"]; ?>" required>
            </div>

            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="text" class="form-control" id="senha" name="senha" value="<?php echo $row["senha"]; ?>" required>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form><br>
        <a href="home.php">Voltar a Home</a>
    </div>
</body>
</html>
