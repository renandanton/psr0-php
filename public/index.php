<?php

require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'services.php';

$serviceClientes = $container['clientes'];

$listaClientes = $serviceClientes->listAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Stormtech</title>

    <link href="css/app.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Stormtech</a>
        </div>

      
    </div>
</nav>

<div  class="container">


    <div class="container">

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"> Admin:</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <ul class="nav nav-tabs">
                    <li role="presentation" class="active"><a href="#">Clientes</a></li>
                    <li role="presentation"><a href="contratos.index.php">Contratos</a></li>
                </ul>

            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <table class="table">
                    <tr>
                        <td>Id</td>
                        <td>Cpf</td>
                        <td>Nome</td>
                        <td>Nascimento</td>
                        <td>Cidade</td>
                        <td>Estado</td>
                        <td>Telefone</td>
                        <td>A&ccedil;&atilde;o</td>
                    </tr>

                    <?php foreach($listaClientes as $cliente): ?>

                    <tr>
                        <td><?php echo $cliente['id']; ?></td>
                        <td><?php echo $cliente['cpf']; ?></td>
                        <td><?php echo $cliente['nome']; ?></td>
                        <td><?php echo date('d-m-Y',strtotime($cliente['nascimento'])); ?></td>
                        <td><?php echo $cliente['cidade']; ?></td>
                        <td><?php echo $cliente['estado']; ?></td>
                        <td><?php echo $cliente['telefone']; ?></td>
                        <td>
                            <a href="clientes.editar.php?id=<?php echo $cliente['id'] ;?>" class="btn btn-default">Editar</a>
                            <a href="clientes.excluir.php?id=<?php echo $cliente['id'] ;?>" class="btn btn-danger">Excluir</a>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                </table>
            </div>
        </div>


        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <a href="clientes.create.php" class="btn btn-success">Novo Cliente</a>
            </div>
        </div>

    </div>

</div>

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>