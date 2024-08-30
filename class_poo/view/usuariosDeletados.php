<?php
require_once "../fachada/fachada.php";

$fachada = new Fachada();

$usuario = $fachada->usuariosRestaurados();
//var_dump($usuario);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios Deletados</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <h3>Usuários Deletados</h3>
    <?php if (!empty($usuario)) { ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">NOME</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">IDADE</th>
                    <th scope="col">DELETED_AT</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($usuario as $usuarios) { ?>
                    <tr>
                        <td><?php echo $usuarios['id_usuario']; ?></td>
                        <td><?php echo $usuarios['nome']; ?></td>
                        <td><?php echo $usuarios['email']; ?></td>
                        <td><?php echo $usuarios['idade']; ?></td>
                        <td><?php echo $usuarios['deleted_at']; ?></td>
                        <td><a class="btn btn-success btn-sm" href="../controller/restore.php?id_usuario=<?php echo $usuarios["id_usuario"]; ?>">Restaurar</a></td>
                    </tr>

                <?php }  ?>
            </tbody>
        </table>
    <?php } else { ?>
        <p><b>Nenhum usuário deletado encontrado.</b></p>
    <?php } ?>

    <a href='home.php'>Voltar a home</a>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>