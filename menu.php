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
    
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Menu - SistensWeb</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="recursos/css/bootstrap.min.css" rel="stylesheet">
        <link href="recursos/css/bootstrap.css" rel="stylesheet">
        <link href="recursos/css/charisma-app.css" rel="stylesheet">
        <link href="recursos/css/bootstrap-cerulean.css" rel="stylesheet">
    <style type="text/css">
        .label,.glyphicon { margin-right:5px; }    </style>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="recursos/js/bootstrap.min.js"></script>
    
</head>
<body>

<div class="container">
    <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-list-alt "></span>Cadastros<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="listaclientes.php">Clientes</a></li>
                        <li><a href="listacorretor.php">Corretores</a></li>
			<li><a href="listaassistente.php">Assistentes</a></li>
                        <li><a href="listasinistros.php">Sinistros</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-barcode"></span>Faturamento<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="movimentacao.php">Movimentacao</a></li>
                        <li><a href="encerramento.php">Encerramento Automatico</a></li>
						<li><a href="certificado.php">Certificados</a></li>
                        <li><a href="sac.php">Sac</a></li>
                    </ul>
                </li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-usd"></span>Financeiro<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="remessa.php">Arquivo Remessa</a></li>
                        <li><a href="recebimentos.php">Recebimentos</a></li>
		        <li><a href="baixa.php">Baixa do Sistema</a></li>
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
                                        <input type="text" class="form-control" placeholder="BUSCAR" />
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
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-comment yellow"></span>Avisos<span class="label label-primary">42</span>
                </a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="label label-warning">7:00 AM</span>Hi :)</a></li>
                        <li><a href="#"><span class="label label-warning">8:00 AM</span>How are you?</a></li>
                        <li><a href="#"><span class="label label-warning">9:00 AM</span>What are you doing?</a></li>
                        <li class="divider"></li>
                        <li><a href="#" class="text-center">View All</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="caixaentrada.html" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-envelope"></span>Email</span>
                </a>
                    <ul class="dropdown-menu">
                        <li><a href="caixaentrada.html"></span>Caixa de Entrada</a></li>
                        
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Bem Vindo <?php echo $_SESSION['usuario'];?></span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><span class="glyphicon glyphicon-user blue"></span>Perfil</a></li>
                        <li class="divider"></li>
                        <li><a href="cadastro_usuario.php"><span class="glyphicon glyphicon-user green"></span>Usuários</a></li>
                        <li class="divider"></li>
                        <li><a href="menu.php?logout=ok"><span class="glyphicon glyphicon-off red"></span>Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
	
			<div class="sortable row-fluid">
				<a data-rel="tooltip" title="Relatórios" class="well span3 top-block" href="#">
					<span class="icon32 icon-red icon-user"></span>
					<div>Relatórios</div>
					<span class="notification">1</span>
				</a>

				<a data-rel="tooltip" title="Cadastros" class="well span3 top-block" href="#">
					<span class="icon32 icon-color icon-star-on"></span>
					<div>Cadastros</div>
				    <span class="notification green">2</span>
				</a>

				<a data-rel="tooltip" title="Segurados" class="well span3 top-block" href="#">
					<span class="icon32 icon-color icon-cart"></span>
					<div>Segurados</div>
					<span class="notification yellow">3</span>
				</a>
				
				<a data-rel="tooltip" title="Prêmio Total" class="well span3 top-block" href="#">
					<span class="icon32 icon-color icon-envelope-closed"></span>
					<div>Prêmio Total</div>
					<span class="notification red">4</span>
				</a>
			</div>
</div>
<script type="text/javascript">
</script>
<!-- jQuery -->
<script src="..//recursos/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
        <script src="..//js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
        <script src="..//js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
        <script src="..//js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
	<script src="js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
	<script src="js/bootstrap-tooltip.js"></script>
	<!-- popover effect library -->
	<script src="js/bootstrap-popover.js"></script>
	<!-- button enhancer library -->
	<script src="js/bootstrap-button.js"></script>
	<!-- accordion library (optional, not used in demo) -->
	<script src="js/bootstrap-collapse.js"></script>
	<!-- carousel slideshow library (optional, not used in demo) -->
	<script src="js/bootstrap-carousel.js"></script>
	<!-- autocomplete library -->
	<script src="js/bootstrap-typeahead.js"></script>
	<!-- tour library -->
	<script src="js/bootstrap-tour.js"></script>
	<!-- library for cookie management -->
	<script src="js/jquery.cookie.js"></script>
	<!-- calander plugin -->
	<script src='js/fullcalendar.min.js'></script>
	<!-- data table plugin -->
	<script src='js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
	<script src="js/excanvas.js"></script>
	<script src="js/jquery.flot.min.js"></script>
	<script src="js/jquery.flot.pie.min.js"></script>
	<script src="js/jquery.flot.stack.js"></script>
	<script src="js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
	<script src="js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
	<script src="js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
	<script src="js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
	<script src="js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
	<script src="js/jquery.noty.js"></script>
	<!-- file manager library -->
	<script src="js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
	<script src="js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
	<script src="js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
	<script src="js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
	<script src="js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
	<script src="js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
	<script src="js/charisma.js"></script>

</body>
</html>

