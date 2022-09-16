<?php

require_once('app/Models/Usuario.php');
require_once('app/Controllers/ControllerUsuario.php');

$usuarioDao = new ControllerUsuario();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votação</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light p-5">
      <?php if ($usuarioDao->readUsuario()) { ?>
        <div class="container">
            <h1>Registros</h1>
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Idade</th>
                        <th>Candidato</th>
                        <th>Data Registro</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($usuarioDao->readUsuario() as $usuarios) { ?>
                        <tr>
                            <td><?php echo $usuarios["nome"]; ?></td>
                            <td><?php echo $usuarios["cpf"]; ?></td>
                            <td><?php echo $usuarios["idade"]; ?></td>
                            <td><?php echo $usuarios["candidato"]; ?></td>
                            <td><?php echo date('d/m/Y', strtotime($usuarios["data_registro"])); ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <div class="d-grid mb-4">
                <a href="http://localhost/index.php" class="btn btn-primary btn-lg form-control form-contro-lg">Voltar</a>
          </div>
        </div>
    <?php } ?>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>