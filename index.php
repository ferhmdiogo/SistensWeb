<?php
session_start();
require_once "banco/conexao.php";
require_once "class/login.php";

   if(isset($_POST['enviar'])):
       $login = filter_input(INPUT_POST, "login", FILTER_SANITIZE_MAGIC_QUOTES);
       $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_MAGIC_QUOTES);
    
       
       $l = new Login;
       $l->setLogin($login);
       $l->setPassword($password);
       
       if($l->logar()):
           header("Location: menu.php");
       else:
           $erro = "Erro ao logar";
       endif;
       
       
          
   endif;
?>

<!DOCTYPE>
<html lang="en">
<head>
	
	<title>:::Login:::</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<!-- The styles -->
        <link id="bs-css" href="recursos/css/bootstrap-cerulean.css" rel="stylesheet">
        <style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
        
        <link href="recursos/css/charisma-app.css" rel="stylesheet">
        
		
</head>

<body>
		<div class="container-fluid">
		<div class="row-fluid">
		
			<div class="row-fluid">
				<div class="span12 center login-header">
					<h2>SISTENSWEB - LOGIN</h2>
				</div><!--/span-->
			</div><!--/row-->
			
			<div class="row-fluid">
				<div class="well span5 center login-box">
					<div class="alert alert-info">
						Por favor, faça o login com seu usuário e senha..
					</div>
					<form class="form-horizontal" action="" method="post">
						<fieldset>
							<div class="input-prepend" title="Usuário" data-rel="tooltip">
								<span class="add-on"><i class="glyphicon glyphicon-user"></i></span><input autofocus class="input-large span10" name="login" type="text" value="" />
							</div>
							<div class="clearfix"></div>

							<div class="input-prepend" title="Senha" data-rel="tooltip">
								<span class="add-on"><i class="glyphicon glyphicon-lock"></i></span><input class="input-large span10" name="password" type="password" value="" />
							</div>
                                                        <div class="clearfix">
                                                            
                                                        </div>
                                                        
                    							
							<p class="center span5">
							<button type="submit" name="enviar" value="Login" class="btn btn-primary">Login</button>
							</p>
							
						</fieldset>
					</form>
                                    <?php echo isset($erro)? $erro: ''; ?>
				</div><!--/span-->
			</div><!--/row-->
				</div><!--/fluid-row-->
		
	</div><!--/.fluid-container-->

	<!-- external javascript
	================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->

	<!-- jQuery -->
	<script src="js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
	<script src="js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
	<script src="js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
	<script src="js/bootstrap-alert.js"></script>
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
