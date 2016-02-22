<?php

require_once '../vendor/autoload.php';
require_once 'config.php';
require_once 'services.php';

$serviceClientes = $container['clientes'];
$serviceContratos = $container['contratos'];

$listClientes = $serviceClientes->listAll();
$contrato = $serviceContratos->listOne($_GET['id']);

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
                    <li role="presentation"><a href="index.php">Clientes</a></li>
                    <li role="presentation" class="active"><a href="contratos.index.php">Contratos</a></li>
                </ul>

            </div>
        </div>

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <form action="contratos.update.php?id=<?php echo $contrato['id']; ?>" method="post">

                    <div class="form-group">
                        <label for="codigo">C&oacute;digo:</label>
                        <input type="text" class="form-control" name="codigo" value="<?php echo $contrato['codigo']; ?>" id="codigo" placeholder="C&oacute;digo">
                    </div>

                    <div class="form-group">
                        <label for="contrato">Contrato:</label>
                        <input type="text" class="form-control" name="contrato" id="contrato" value="<?php echo $contrato['contrato']; ?>" placeholder="Contrato">
                    </div>

                    <div class="form-group">
                        <label for="cliente">Cliente:</label>
                        <select  class="form-control" name="cliente_id" value="" id="cliente_id">
                            <option value="<?php echo $contrato['cli_id'];  ?>"><?php echo $contrato['nome']; ?></option>

                            <?php foreach($listClientes as $cliente): ?>
                                <?php if($contrato['cliente_id'] != $cliente['id']): ?>
                                <option value="<?php echo $cliente['id']; ?>"><?php echo $cliente['nome'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="form-group">
                        <label for="valor">Valor:</label>
                        <input type="text" class="form-control" name="valor" value="<?php echo number_format($contrato['valor'],2,',',''); ?>" id="valor" placeholder="(R$)">
                    </div>

                    <div class="form-group">
                        <label for="data">Data:</label>
                        <input type="text" class="form-control" name="data_contrato" value="<?php echo date('d-m-Y',strtotime($contrato['data_contrato'])); ?>" id="data_contrato" placeholder="Data">
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Salvar</button>
                    </div>
                </form>

            </div>
        </div>


    </div>


</div>

<!-- Scripts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
</body>
</html>