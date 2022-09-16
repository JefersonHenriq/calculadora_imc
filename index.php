<?php

require_once('app/Models/Usuario.php');
require_once('app/Controllers/ControllerUsuario.php');

$usuarioDao = new ControllerUsuario();

if (!empty($_POST['nome']) && !empty($_POST['cpf']) && !empty($_POST['idade']) && !empty($_POST['candidato'])) {

    $usuario = new Usuario($_POST['nome'], $_POST['cpf'], $_POST['idade'], $_POST['candidato']);

    $usuario->validarVotacao();
    //var_dump($usuario);

    if (empty($usuario->erro)) {
        if ($usuario->getMsg() == "Usuário já votou") {
            $class = "alert-warning";
        } elseif ($usuario->getMsg() == "Voto computado com sucesso") {
            $class = "alert-success";
        } elseif ($usuario->getMsg() == "idade abaixo de 16 anos") {
            $class = "alert-warning";
        } else {
            $class = "alert-danger";
        }
        $usuarioDao->createUsuario($usuario);
    }
}

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

<body class="bg-primary p-5">
    <div class="container border border-2 rounded-4 p-4 bg-white mb-5" style="max-width: 400px;">
        <form method="post">
            <h1 class="mb-4 text-center fw-bold">VOTAÇÃO</h1>
            <div class="row">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome do eleitor</label>
                    <input type="text" id="nome" name="nome" class="form-control form-control-lg bg-light" value="" required>
                </div>

                <div class="mb-3">
                    <label for="cpf" class="form-label">CPF</label>
                    <input type="text" id="cpf" name="cpf" class="form-control form-control-lg bg-light" value="" maxlength="11" minlength="11" required>
                </div>

                <div class="mb-3">
                    <label for="idade" class="form-label">Idade</label>
                    <input type="text" id="idade" name="idade" class="form-control form-control-lg bg-light" value="" required>
                </div>
                <div class="mb-3">
                    <label for="888">
                        <img src="img/Bill.jpg" width="80px" alt="">
                        <input type="radio" id="888" name="candidato" value="1">
                        Bill Gates
                    </label>
                </div>
                <div class="mb-3">
                    <label for="999">
                        <img src="img/mark.jpg" width="80px" alt="">
                        <input type="radio" id="999" name="candidato" value="2">
                        Mark Zuckerberg
                    </label>
                </div>

                <div class="d-grid mb-4">
                    <input type="submit" value="Votar" class="btn btn-primary btn-lg">
                </div>
                </div>
        </form>

        <a href="http://localhost/relatorio.php" class="btn btn-primary btn-lg form-control form-control-lg">Ver relatorio</a>


    </div>
    <!-- <?php if (isset($usuario) && empty($usuario->erro)) { ?>
                    <div class="alert text-center fs-4 <?php echo $class; ?>" role="alert">
                        <span class="d-block fw-bold">IMC: <?php echo round($usuario->getCandidato(), 2); ?></span>
                        <span><?php echo $usuario->getMsg(); ?></span>
                    </div>
                <?php } ?> -->
    </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>