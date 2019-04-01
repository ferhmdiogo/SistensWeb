<?php
session_start();
require_once "banco/conexao.php";
require_once "class/login.php";

if(isset($_GET['logout'])):
    
    if($_GET['logout']== 'ok'):
        $l = new Login;
        $l->deslogar();
        
    endif;
    
endif;

if(isset($_SESSION['logado'])):
   
    else:
        header("Location:index.php");

        
    
endif;


?>


<!DOCTYPE html>
<meta http-equiv="content-language" content="pt-br">
<head>
    <meta http-equiv="content-language" content="pt-br">
    <title>Menu - SistensWeb</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="recursos/css/bootstrap.min.css" rel="stylesheet">
    <link href="recursos/css/bootstrap.css" rel="stylesheet">
    <link href="recursos/css/charisma-app.css" rel="stylesheet">
    <link href="recursos/css/bootstrap-cerulean.css" rel="stylesheet">
	<style type="text/css">
    .label,.glyphicon { margin-right:5px; }</style>
    
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
        
	
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="recursos/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default" role="navigation">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-list-alt"></span>Cadastros<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="listaclientes.php">Clientes</a></li>
                        <li><a href="listacorretor.php">Corretores</a></li>
                        <li><a href="listaassistente.php">Assistentes</a></li>
                        <li><a href="listasinistro.php">Sinistros</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-barcode"></span>Faturamento<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Movimentacao</a></li>
                        <li><a href="#">Encerramento Automatico</a></li>
						<li><a href="#">Certificados</a></li>
                        <li><a href="#">Sac</a></li>
                    </ul>
                </li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-usd"></span>Financeiro<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Arquivo Remessa</a></li>
                        <li><a href="#">Recebimentos</a></li>
						<li><a href="#">Baixa do Sistema</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-search"></span>Buscar<b class="caret"></b></a>
                    <ul class="dropdown-menu" style="min-width: 300px;">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="navbar-form navbar-left" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button">
                                                Ir!</button>
                                        </span>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Bem Vindo <?php echo $_SESSION['usuario'];?></span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li><a href="menu_sinistro.php?logout=ok"><span class="glyphicon glyphicon-off"></span>Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
		
        <!-- /.navbar-collapse -->
    </nav>
				
			<div>
				<ul class="breadcrumb">
					<li>
                                   <a href="listasinistro.php"><span class="glyphicon glyphicon-tasks"></span>Lista de Sinistro</a></li>
				   <a href="sinistro.php"><span class="glyphicon glyphicon-plus"></span>Novo Sinistro</a></li>
                                   <a href="relatorio.php"><span class="glyphicon glyphicon-plus"></span>Relatório</a></li>
				</ul>
			</div>
			
			

</body>
</html>


