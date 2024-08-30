<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
    <div class="container-fluid d-flex justify-content-center align-items-center full-height">
        <form action="../controller/cadastros.php" method="post">
            <h1>Formulário de Cadastro</h1>
            <div class="form-group">
                <label for="nome" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>

            <div class="form-group">
                <label for="idade" class="form-label">Email:</label>
                <input type="text" class="form-control" id="idade" name="email" required>
            </div>

            <div class="form-group">
                <label for="email" class="form-label">Idade:</label>
                <input type="text" class="form-control" id="email" name="idade" required>
            </div>

            <div class="form-group">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
            <p class="form-text mt-3">Tem uma conta? <a href="../index.html">Fazer Login</a></p>
        </form>
    </div>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
