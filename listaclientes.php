<?php


require_once "class/crud_cliente.php";
require_once "banco/conexao.php";
require_once "class/cliente.php";


if(isset($_SESSION['logado'])):
   
    else:
        header("");

        
    
endif;

?>

<!DOCTYPE html>
<meta http-equiv="content-language" content="pt-br">

<script>
$(function(){
    $("#tabela input").keyup(function(){        
        var index = $(this).parent().index();
        var nth = "#tabela td:nth-child("+(index+1).toString()+")";
        var valor = $(this).val().toUpperCase();
        $("#tabela tbody tr").show();
        $(nth).each(function(){
            if($(this).text().toUpperCase().indexOf(valor) < 0){
                $(this).parent().hide();
            }
        });
    });
 
    $("#tabela input").blur(function(){
        $(this).val("");
    }); 
});
</script>
<head>
    <?php 
		require_once "menu_usuarios.php";
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
                                                    
                                            <?php
    
    
    $cliente = new Clientes();
    if(isset($_POST['salvar'])):
    $status = $_POST['status'];    
    $estipulante = $_POST['estipulante'];
    $cpf_cnpj = $_POST['cpf_cnpj'];
    $inicio_vigencia = formatarData($_POST['inicio_vigencia']);
    $inicio_contrato = formatarData($_POST['inicio_contrato']);
    $tipo_proposta = $_POST['tipo_proposta'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $telefone_1 = $_POST['telefone_1'];
    $telefone_2 = $_POST['telefone_2'];
    $fax = $_POST['fax'];
    $celular = $_POST['celular'];
    $email = $_POST['email'];
    $midias_sociais = $_POST['midias_sociais'];
    $contato = $_POST['contato'];
    $cargo = $_POST['cargo'];
    $corretor = $_POST['corretor'];
    $assistente = $_POST['assistente'];
    
    
    //Set
    
    $cliente->setStatus($status);
    $cliente->setEstipulante($estipulante);
    $cliente->setCpf_Cnpj($cpf_cnpj);
    $cliente->setInicioVigencia($inicio_vigencia);
    $cliente->setInicioContrato($inicio_contrato);
    $cliente->setTipoProposta($tipo_proposta);
    $cliente->setCep($cep);
    $cliente->setEndereco($endereco);
    $cliente->setNumero($numero);
    $cliente->setComplemento($complemento);
    $cliente->setBairro($bairro);
    $cliente->setCidade($cidade);
    $cliente->setUf($uf);
    $cliente->setTelefone1($telefone_1);
    $cliente->setTelefone2($telefone_2);
    $cliente->setFax($fax);
    $cliente->setCelular($celular);
    $cliente->setEmail($email);
    $cliente->setMidiasSociais($midias_sociais);
    $cliente->setContato($contato);
    $cliente->setCargo($cargo);
    $cliente->setCorretor($corretor);
    $cliente->setAssistente($assistente);
    
    //Insert
    
    $cliente->insert();
            
    
endif;
    
    ?>
            <?php
    if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
    
        $id_cliente = (int)$_GET['id_cliente'];
        $cliente->delete($id_cliente);
        
        endif;
    ?>                                
					
						  <thead>
                                                      
							  <tr>
							  <th>Código</th>
							  <th>Estipulante</th>
							  <th>Cadastro</th>
							  <th>Vigência</th>
                                                          <th>Status </th>
							  <th>Acão</th>
							  </tr>
                                                          
						  </thead>
                                                 <?php foreach($cliente->findAll() as $key => $value): ?> 
                                                  
						  <tbody>
							<tr>
                                        <td><?php echo $value['id_cliente'];?></td>
					<td><?php echo $value['estipulante'];?></td>
                                        <td><?php echo date("d/m/Y", strtotime($value['inicio_contrato']));?> </td>
                                        <td><?php echo date("d/m/Y", strtotime($value['inicio_vigencia']));?> </td>
                                        <td><?php echo $value['status'];?></td>
					
					<td>
                                        <?php echo '<a class="btn btn-success" href="atualizarcliente.php?acao=editar&id_cliente='.$value['id_cliente'].'">Editar<i class="glyphicon glyphicon-edit icon-white"></i></a>'; ?>
                                        <?php echo '<a class="btn btn-danger" href="listaclientes.php?acao=deletar&id_cliente='.$value['id_cliente'].'">Deletar<i class="glyphicon glyphicon-trash icon-white"></i></a>'; ?>
                                           
					</td>
				</tr>
							
						  </tbody>
                                              <?php endforeach; ?>	    
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
	<!-- jQuery -->
        <script src="recursos/js/jquery-1.7.2.min.js"></script>
	<!-- jQuery UI -->
        <script src="recursos/js/jquery-ui-1.8.21.custom.min.js"></script>
	<!-- transition / effect library -->
        <script src="recursos/js/bootstrap-transition.js"></script>
	<!-- alert enhancer library -->
        <script src="recursos/js/bootstrap-alert.js"></script>
	<!-- modal / dialog library -->
	<script src="js/bootstrap-modal.js"></script>
	<!-- custom dropdown library -->
	<script src="js/bootstrap-dropdown.js"></script>
	<!-- scrolspy library -->
	<script src="js/bootstrap-scrollspy.js"></script>
	<!-- library for creating tabs -->
        <script src="recursos/js/bootstrap-tab.js"></script>
	<!-- library for advanced tooltip -->
        <script src="recursos/js/bootstrap-tooltip.js"></script>
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
        <script src='recursos/js/jquery.dataTables.min.js'></script>

	<!-- chart libraries start -->
        <script src="recursos/js/excanvas.js"></script>
        <script src="recursos/js/jquery.flot.min.js"></script>
        <script src="recursos/js/jquery.flot.pie.min.js"></script>
        <script src="recursos/js/jquery.flot.stack.js"></script>
        <script src="recursos/js/jquery.flot.resize.min.js"></script>
	<!-- chart libraries end -->

	<!-- select or dropdown enhancer -->
        <script src="recursos/js/jquery.chosen.min.js"></script>
	<!-- checkbox, radio, and file input styler -->
        <script src="recursos/js/jquery.uniform.min.js"></script>
	<!-- plugin for gallery image view -->
        <script src="recursos/js/jquery.colorbox.min.js"></script>
	<!-- rich text editor library -->
        <script src="recursos/js/jquery.cleditor.min.js"></script>
	<!-- notification plugin -->
        <script src="recursos/js/jquery.noty.js"></script>
	<!-- file manager library -->
        <script src="recursos/js/jquery.elfinder.min.js"></script>
	<!-- star rating plugin -->
        <script src="recursos/js/jquery.raty.min.js"></script>
	<!-- for iOS style toggle switch -->
        <script src="recursos/js/jquery.iphone.toggle.js"></script>
	<!-- autogrowing textarea plugin -->
        <script src="recursos/js/jquery.autogrow-textarea.js"></script>
	<!-- multiple file upload plugin -->
        <script src="recursos/js/jquery.uploadify-3.1.min.js"></script>
	<!-- history.js for cross-browser state change on ajax -->
        <script src="recursos/js/jquery.history.js"></script>
	<!-- application script for Charisma demo -->
        <script src="recursos/js/charisma.js"></script>

</body>
</html>
