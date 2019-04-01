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
                            <h2><i class="icon-edit"></i>Cadastro do Segurado</h2>
				    <div class="box-icon">
                                        
					</div>
                            
					</div>
                            
                            
					<div class="box-content">
                                              
	<td>
            <?php
    
    
    $segurados = new Segurados();
    if(isset($_POST['salvar'])):
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
    
    //Insert
    
    $segurados->insert();
    
    
    endif;

         ?>
            
            
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
     
        
    $segurados->setIdSegurados($id_segurados);
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
            
          <form action="" method="post" accept-charset="utf-8" class="control-group">
            
            <table class="form-group has-warning" >
                <fieldset id="item_basic_info">
    
        <td>
            <label for="id_segurados" class="control-label">Código do Segurado</label><br>
            <input type="text" name="id_segurados" value="<?php echo $resultado['id_segurados']; ?>" id="id_segurados" class="input-small" readonly="readonly"  />
            </br>
           </td>
        
        <td>

            

        <tr>
            <td colspan="10">	
        
            <label for="nome" class="control-label">Nome do Segurado: </label><br>
            <input type="text" name="nome" value="<?php echo $resultado['nome']; ?>" id="nome" class="input-xxlarge" readonly="readonly"  />
            </br>
    <td>
</td>

            	

                <td>	

                    <label for="documento" class="control-label">Documento</label>                    <br>
                    <input type="text" name="documento" value="<?php echo $resultado['documento']; ?>" id="documento" class="input-medium" readonly="readonly"  />
                    </br>
                </td>
  
            <td>	
                    
                    <label for="data_nascimento" class="control-label">Data de Nascimento</label>                    <br>
                    <input type="text" name="data_nascimento" value="<?php echo date("d/m/Y", strtotime($resultado['data_nascimento'])); ?>" id="data_nascimento" class="input-medium" readonly="readonly"  />
                    </br>
                </td>
                <td>	

                    <label for="sexo" class="control-label">Sexo</label><br>
                    <input type="text" name="sexo" value="<?php echo $resultado['sexo']; ?>" id="sexo" class="input-small" readonly="readonly"  />
                    </br>
                </td>
                
                <td>	

                    <label for="cpf" class="control-label">Cpf</label>                    <br>
                    <input type="text" name="cpf" value="<?php echo $resultado['cpf']; ?>" id="cpf" class="input-medium" readonly="readonly"  />
                </td>
                
                
            
            
	<table class="table paper-tbl-theme table-bordered responsive table-paper">

    <thead>
        <tr style="background-color:#005EBA; color:#FFF; font-size:10px">
            <th><center>NOME DO BENEFICIÁRIO</center></th>
            <th><center>DATA NASC.</center></th>
            <th><center>PORCENTAGEM</center></th>
            
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $resultado['beneficiario']; ?></td>
            <td></td>
            <td><?php echo $resultado['porcentagem']; ?></td>
           
        </tr>
        <tr>
		    <td></td>
            <td></td>
            <td></td>
		</tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            
        </tr>
        
    </tbody>

</table>


	</td>
	</tr>

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

