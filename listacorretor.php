<!DOCTYPE html>
<meta http-equiv="content-language" content="pt-br">
<head>
    <?php 
		require_once "menu_corretor.php";
	?>
</head>
<body>

				
						
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
				    <div class="box-icon">
					</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
							  <th>Código</th>
							  <th>Nome do Corretor</th>
							  <th>Cadastro</th>
							  <th>Status</th>
							  <th>Acão</th>
							  </tr>
						  </thead>   
						  <tbody>
							<?php
                            //conectando com o localhost - mysql
                            $conexao = mysql_connect("localhost","ferhmd","301004");
                            if (!$conexao)
	                        die ("Erro de conex�o com localhost, o seguinte erro ocorreu -> ".mysql_error());
                            //conectando com a tabela do banco de dados
                            $banco = mysql_select_db("bd_sistensweb",$conexao);
                            if (!$banco)
	                        die ("Erro de conex�o com banco de dados, o seguinte erro ocorreu -> ".mysql_error());
                          $query = mysql_query ('SELECT * FROM corretor  ORDER BY id_corretor ASC ');
						       while($r=mysql_fetch_array($query)){
							   
                            echo '<tr>';
                            echo '<td>'. $r['id_corretor'] . '</td>';
                            echo '<td>'. $r['nome_razaosocial'] . '</td>';
                            echo '<td>'. $r['data_cadastro'] . '</td>';
							echo '<td>'. $r['status'] . '</td>';
                            echo '<td width=260>';
                            echo '<a class="btn btn-success" href="alterarcorretores.php"?id='.$r['id_corretor'].'">Alterar</a>';
                            echo ' ';
                            echo '<a class="btn btn-info" href="gerarexcelcorretor.php?id='.$r['id_corretor'].'">Gerar Excel</a>';
			    echo ' ';
                            echo '<a class="btn btn-pending" href="gerarpdf.php?id='.$r['id_corretor'].'">Gerar Pdf</a>';
                            echo '</td>';
                            echo '</tr>';
                   		    }
							mysql_close($conexao);
							
                            ?>
							

						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
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
