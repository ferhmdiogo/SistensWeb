<?php


require_once"class/class_segurados.php";
require_once"class/crud_segurados.php";
require_once"utilidades/formatacao.php";


if(isset($_SESSION['logado'])):
   
    else:
        header("");

        
    
endif;

?>

<!DOCTYPE html>
<meta http-equiv="content-language" content="pt-br">
<link id="bs-css" href="recursos/css/bootstrap-cerulean.min.css" rel="stylesheet">
<link href="recursos/css/charisma-app.css" rel="stylesheet">
<link href='recursos/bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
<link href='recursos/bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
<link href='recursos/bower_components/chosen/chosen.min.css' rel='stylesheet'>
<link href='recursos/bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
<link href='recursos/bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
<link href='recursos/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
<link href='recursos/css/jquery.noty.css' rel='stylesheet'>
<link href='recursos/css/noty_theme_default.css' rel='stylesheet'>
<link href='recursos/css/elfinder.min.css' rel='stylesheet'>
<link href='recursos/css/elfinder.theme.css' rel='stylesheet'>
<link href='recursos/css/jquery.iphone.toggle.css' rel='stylesheet'>
<link href='recursos/css/uploadify.css' rel='stylesheet'>
<link href='recursos/css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="recursos/bower_components/jquery/jquery.min.js"></script>
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
                            <h2><i class="icon-edit"></i>Lista de Segurados</h2>
				    <div class="box-icon">
                                        
					</div>
                            
					</div>
                            
					<div class="box-content">
                                              <tr>
        
<script type="text/javascript">
$(document).ready(function() {
// Captura o retorno do retornaCliente.php
    $.getJSON('autocompletecoberturas.php', function(data){
    var dados = [];
    // Armazena na array capturando somente o nome do EC
    $(data).each(function(key, value) {
        dados.push(value.id_cliente);
    });
    // Chamo o Auto complete do JQuery ui setando o id do input, array com os dados e o mínimo de caracteres para disparar o AutoComplete
    $('#id_cliente').autocomplete({ source: dados, minLength: 3});
    });
});



</script>



        <td> 
            
                
			              <table class="table table-striped table-bordered bootstrap-datatable datatable responsive">
                                                    
                                            <?php
    
    
    $segurados = new Segurados();
    if(isset($_POST['atualizar'])):
    $id_segurados = $_POST['id_segurados'];    
    $id_cliente = $_POST['id_cliente'];
    $nome = $_POST['nome'];
    $documento = $_POST['documento'];
    $data_nascimento = $_POST['data_nascimento'];
    $multiplicador = $_POST['multiplicador'];
    $capital = $_POST['capital'];
    $sexo = $_POST['sexo'];
    $cpf = $_POST['cpf'];
    $beneficiario = $_POST['beneficiario'];
    $porcentagem = $_POST['porcentagem'];
     
    
    //Set
    
    $segurados->setId_segurados($id_segurados);
    $segurados->setId_cliente($id_cliente);
    $segurados->setNome($nome);
    $segurados->setDocumento($documento);
    $segurados->setDataNascimento($data_nascimento);
    $segurados->setMultiplicador($multiplicador);
    $segurados->setCapital($capital);
    $segurados->setSexo($sexo);
    $segurados->setCpf($cpf);
    $segurados->setBeneficiario($beneficiario);
    $segurados->setPorcentagem($porcentagem);
    
    
    if($segurados->update($id_segurados)){
                    echo "<script>alert(\"Cadastro atualizado com sucesso!\")</script>";
                    echo "<script>window.location = \"segurados.php\"</script>";        
                }
        
            endif;
            ?>
        
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
            $id_segurados = (int)$_GET['id_segurados'];
            $resultado = $segurados->find($id_segurados);
        }

         ?>
					
						  <thead>
                                                      
							  <tr>
							  <th>Código do Segurado</th>
							  <th>Código do Estipulante</th>
							  <th>Nome do Segurado</th>
							  <th>Capital</th>
                                                          <th>Acão</th>
							  </tr>
                                                          
						  </thead>
                                                 <?php foreach($segurados->findAll() as $key => $value): ?> 
                                                  
						  <tbody>
							<tr>
                                        <td><?php echo $value['id_segurados'];?></td>
					<td><?php echo $value['id_cliente'];?></td>
                                        <td><?php echo $value['nome'];?> </td>
                                        <td><?php echo $value['capital'];?> </td>
                                        
					
					<td>
                                        <?php echo '<a class="btn btn-success" href="cadastrosegurados.php?acao=editar&id_segurados='.$value['id_segurados'].'"><i class="glyphicon glyphicon-edit icon-white"></i></a>'; ?>
                                        <?php echo '<a class="btn btn-danger" href="listaclientes.php?acao=deletar&id_cliente='.$value['id_cliente'].'"><i class="glyphicon glyphicon-trash icon-white"></i></a>'; ?>
                                        <?php echo '<a class="btn btn-primary" href="listaclientes.php?acao=deletar&id_cliente='.$value['id_cliente'].'"><i class="glyphicon glyphicon-print icon-white"></i></a>'; ?>
                                        <?php echo '<a class="btn btn-primary" href="listaclientes.php?acao=deletar&id_cliente='.$value['id_cliente'].'"><i class="glyphicon glyphicon-envelope icon-white"></i></a>'; ?>

					</td>
				</tr>
							
						  </tbody>
                                              <?php endforeach; ?>	    
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

			
	<!-- external javascript -->

        <script src="recursos/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='recursos/js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="recursos/bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="recursos/bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="recursos/js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="recursos/bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="recursos/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
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
<script src="recursos/js/charisma.js"></script>

</body>
</html>
