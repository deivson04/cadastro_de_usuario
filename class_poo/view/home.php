<?php
require_once "../fachada/fachada.php";
require_once "../object/Usuario.php";




$usuarioFiltro = new Usuario();


$fachada = new Fachada();

if (isset($_GET["busca"])) {
  $busca = $_GET["busca"];
  $usuarioFiltro->setNome($busca);
}

if ((isset($_GET["idade_de"]) && $_GET["idade_de"]) && (isset($_GET["idade_ate"]) && $_GET["idade_ate"])) {

  $idade_de = $_GET["idade_de"];
  $idade_ate = $_GET["idade_ate"];
  $usuarioFiltro->setIdadeDe($idade_de);
  $usuarioFiltro->setIdadeAte($idade_ate);
}

$rows = $fachada->listarUsuarios($usuarioFiltro);


$usuario = $fachada->usuariosRestaurados();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>home</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <form action="" method="get">
    <h3>Busca por nome</h3>
    <input type="text" name="busca" id="" placeholder="digite o nome">
    <input class="btn btn-primary btn-sm" type="submit" value="Buscar">
    <h3>Busca por idade</h3>
    <label for="">De</label>
    <input type="text" type="number" name="idade_de" placeholder="digite uma idade">
    <label for="">Até</label>
    <input type="text" type="number" name="idade_ate" placeholder="digite uma idade">
    <input class="btn btn-primary btn-sm" type="submit" value="Buscar">
  </form><br>

  <table class="table">
    <h3>Usuários</h3>
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">NOME</th>
        <th scope="col">EMAIL</th>
        <th scope="col">IDADE</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($rows as $row) { ?>
        <tr>
          <th scope="row"><?php echo $row["id_usuario"]; ?></th>
          <td><?php echo $row["nome"]; ?></td>
          <td><?php echo $row["email"]; ?></td>
          <td><?php echo $row["idade"]; ?></td>
          <td><a class="btn btn-success btn-sm" href="atualizar.php?id_usuario=<?php echo $row["id_usuario"]; ?>">Atualizar</a></td>
          <td><a class="btn btn-danger btn-sm" href="../controller/deletar.php?id_usuario=<?php echo $row["id_usuario"]; ?>">Deletar</a></td>
        </tr>
      <?php } ?>
    </tbody>
  </table><br><br>
  <h3><a href="usuariosDeletados.php">Lista de Usuarios Deletados</a></h3>

  <a href="../index.html">Sair</a>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/script.js"></script>

</body>

</html>