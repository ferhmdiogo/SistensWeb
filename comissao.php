<?php

require_once "class/crud_comissao.php";
require_once "class/class_comissao.php";
require_once "utilidades/formatacao.php";

if(isset($_SESSION['logado'])):
   
    else:
        header("");

        
    
endif;

?>

<!DOCTYPE html>
<meta http-equiv="content-language" content="pt-br">

<link href="recursos/css/responsive-tables.css" rel="stylesheet">
<link href="recursos/css/chosen.css" rel="stylesheet">
<link href="recursos/css/bootstrap-cerulean.css" rel="stylesheet">
<link href="recursos/css/bootstrap-cerulean.min.css" rel="stylesheet">
<link href="recursos/css/all.css" rel="stylesheet">
<link href="recursos/css/bootstrap.min.css" rel="stylesheet">
<link href="recursos/css/bootstrap.css" rel="stylesheet">
<script type="text/javascript" src="recursos/js/jquery-1.7.2.min.js"></script>
<link href="recursos/css/datepicker.css" rel="stylesheet" media="screen">
<link href="recursos/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
<link type="text/css" href="recursos/css/jquery-ui-1.8.5.custom.css" rel="Stylesheet" />
<script src="recursos/js/jquery-1.4.2.min.js" type="text/javascript"></script>
<script src="recursos/js/jquery-ui-1.8.5.custom.min.js" type="text/javascript"></script>
<script type="text/javascript" src="recursos/js/autocomplete.js"></script>
<script type="text/javascript" src="recursos/js/jquery.js"></script>
<script type="text/javascript" src="recursos/js/jquery.quick.search.js"></script>

<head>
    
    
    <?php 
    require_once "menu_usuarios.php";
    ?>


</head>
<body>

			
  <div class="row-fluid sortable">
    <div class="box span12">
    <div class="box-header well" data-original-title>
    <h2><i class="icon-edit"></i>Cadastrar Comissões</h2>
    </div>
        <script type="text/javascript">
            function tornarTabelaEditavel(tabela)
            {
                // Obtém todas as tds da tabela fornecida.
                var tdlist = tabela.getElementsByTagName("td");

                for(var i = 0; tdlist[i]; i++) {
                    // Adiciona o evento double click em cada td da tabela.
                    tdlist[i].ondblclick = function() {
                        // Se for texto, muda para input.
                        if(this.firstChild.nodeType == 3) {
                            // Cria um campo de texto editável e insere o valor da td nesse campo.
                            var campo = document.createElement("input");
                            campo.value = this.firstChild.nodeValue;

                            // Substitui o texto da td pelo campo.
                            this.replaceChild(campo, this.firstChild);

                            campo.select();

                            // Faz o processo inverso ao perder o foco.
                            campo.onblur = function() {
                                this.parentNode.replaceChild(document.createTextNode(this.value), this);
                            }
                        }
                    }
                }
            }

            window.onload = function() {
                tornarTabelaEditavel(document.getElementById('idtabela'));
            }
            
            
            
            
                    </script>
        
        <form action="" method="post" accept-charset="utf-8" id="form_cadastro" class="control-group">
            
            <table class="form-group has-warning" >
                <fieldset id="item_basic_info">
    <tr>
        <td>
            <label for="id_cliente" class="control-label">Class</label><br>
            <?php
        $pdo = new PDO('mysql:host=localhost;dbname=sistensweb', 'root', '123@mudar');
        $sql = "SELECT id_cliente FROM novo";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) { ?>
        <select id="id_cliente" name="id_cliente" data-rel="chosen" class="input-medium">
<?php foreach ($results as $row) { ?>
        <option value="<?php echo $row['id_cliente']; ?>"><?php echo $row['id_cliente']; ?> </option>
<?php } ?>
</select>
<?php } ?>
        </td>
        
        <td>
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


<label for="estipulante" class="control-label">Estipulante</label><br>

    <?php
        $pdo = new PDO('mysql:host=localhost;dbname=sistensweb', 'root', '123@mudar');
        $sql = "SELECT id_cliente, estipulante FROM novo";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) { ?>
                <select id="estipulante" name="estipulante" data-rel="chosen" class="input-xxlarge">
<?php foreach ($results as $row) { ?>
        <option value="<?php echo $row['id_cliente']; ?>"><?php echo $row['estipulante']; ?></option>
<?php } ?>
</select>
<?php } ?>

        </td>
        <td>
      
             <tr>
               
                <td>


                   <div class="control-group">
                        <label for="tipo_documento" class="control-label">Código do corretor</label><br>
                      <?php
        $pdo = new PDO('mysql:host=localhost;dbname=sistensweb', 'root', '123@mudar');
        $sql = "SELECT id_corretor, nome_razaosocial FROM corretor";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) { ?>
                <select id="id_corretor" name="id_corretor" data-rel="chosen" class="input-medium">
<?php foreach ($results as $row) { ?>
        <option value="<?php echo $row['id_corretor']; ?>"><?php echo $row['id_corretor']; ?></option>
<?php } ?>
</select>
<?php } ?>                
                    

                </td>
          
                <td>

                    <div class="control-group">
                        <label for="nome_razaosocial" class="control-label">Nome do Corretor</label><br>
                        <?php
        $pdo = new PDO('mysql:host=localhost;dbname=sistensweb', 'root', '123@mudar');
        $sql = "SELECT id_corretor, nome_razaosocial FROM corretor";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) { ?>
                <select id="nome_razaosocial" name="nome_razaosocial" data-rel="chosen" class="input-xxlarge">
<?php foreach ($results as $row) { ?>
        <option value="<?php echo $row['id_corretor']; ?>"><?php echo $row['nome_razaosocial']; ?></option>
<?php } ?>
</select>
<?php } ?>                                      
                    
                </td>
                
                <td>

                    <div class="control-group">
                        <label for="tipo" class="control-label">Tipo</label><br>
                        <select name='tipo' id='tipo' class='input-medium'>
                            <option value=''>Escolha</option>
                            <option value='vg'>PESSOA FISICA</option>
                            <option value='individual'>PESSOA JURÍDICA</option>
                        </select>                            
                    
                </td>
            <td>
            
            
             </tr>
               
                <td>


                   <div class="control-group">
                        <label for="tipo_documento" class="control-label">Comissão %</label> 
                        <select name='comissao' id='comissao' class='input-medium'>
                            <option value=''>Escolha</option>
                            <option value='1'>10%</option>
                            <option value='2'>20%</option>
                            <option value='1'>30%</option>
                            <option value='2'>40%</option>
                            <option value='1'>50%</option>
                            <option value='2'>60%</option>
                            <option value='1'>70%</option>
                            <option value='2'>80%</option>
                            <option value='1'>90%</option>
                            <option value='2'>100%</option>
                            <option value='1'>DEMAIS COMISSÕES ABAIXO DE 10%</option>
                            <option value='2'>DEMAIS COMISSÕES ACIMA DE 100%</option>
                        </select>
                        </td>
          
                <td>
                    <div class="control-group">
                        <label for="tipo_documento" class="control-label">Agenciamento %</label> 
                        <select name='agenciamento' id='agenciamento' class='input-medium'>
                            <option value=''>Escolha</option>
                            <option value='vg'>VG</option>
                            <option value='individual'>Individual</option>
                        </select>                 
                    </div>


                </td>
            <td>
            
            
             
               
                <td>
                    
                       
                    <input type="radio" name="parcela_1" value="1" id="parcela_1" class="form-control" style="width:20px; height:20px;"/>                         
                    
                    <label for="filial" class="control-label">1 - Parcela</label>

                     
                    
                    
                    
                    
                </td>
                
                <td>
                    
                      
                    <input type="radio" name="parcela_2" value="$parcela_2" id="parcela_2" class="form-control" style="width:20px; height:20px;"  />                    
                    <label for="filial" class="control-label">2 - Parcela</label>

                     

                </td>
                
                
                <td>

                  <input type="radio" name="demais_parcela" value="demais" id="demais_parcela" class="form-control" style="width:20px; height:20px;"  />                    
                    <label for="filial" class="control-label">Demais Parcelas</label>

                   
                </td>
                
            </tr>
            
            
            
        </table>
       <div class="form-actions">
       <button type="submit" class="btn btn-primary" name="salvar" value="Submit request">Cadastrar Nova Comissão</button>
       <button class="btn btn-danger">Cancelar</button>
       </div>
      
       <div class="row-fluid sortable">		
			<div class="box span12">
			<div class="box-header well" data-original-title>
                            <h2><i class="icon-edit"></i>Comissões Cadastradas</h2>
				    <div class="box-icon">
					</div>
					</div>
					<div class="box-content">
                                      <input type="text" class="input-search" alt="table table-striped table-bordered bootstrap-datatable datatable" placeholder="Buscar nesta lista" />         
			              <table class="table table-striped table-bordered bootstrap-datatable datatable" id="idtabela"> 
                                          <?php
    
    
    $comissao = new Comissao();
    
    if(isset($_POST['salvar'])):
        
    $id_cliente = $_POST['id_cliente'];    
    $estipulante = $_POST['estipulante'];
    $id_corretor = $_POST['id_corretor'];
    $nome_razaosocial = $_POST['nome_razaosocial'];
    $tipo = $_POST['tipo'];
    $comissao = $_POST['comissao'];
    $agenciamento = $_POST['agenciamento'];
    if(!empty($_POST['parcela_1'])){
    $parcela_1 = $_POST['parcela_1'];    
    }
    if(!empty($_POST['parcela_2'])){
    $parcela_2 = $_POST['parcela_2'];    
    }
    if(!empty($_POST['demais_parcela'])){
    $demais_parcela = $_POST['demais_parcela'];    
    }
    
       
    
    //Set
    
    
/* @var $setId_cliente type */
    $comissao->setIdComissao($id_comissao);
    $comissao->setIdCliente($id_cliente);  
    $comissao->setEstipulante($estipulante); 
    $comissao->setIdcorretor($id_corretor); 
    $comissao->setNome_razaosocial($nome_razaosocial);
    $comissao->setTipo($tipo);        
    $comissao->setComissao($comissao);
    $comissao->setAgenciamento($agenciamento);
    $comissao->setParcela1($parcela_1);
    $comissao->setParcela2($parcela_2);
    $comissao->setDemaisparcela($demais_parcela);
        
    //Insert
    
    $comissao->insert();
    
    echo "<script>alert(\"Cadastro efetuado com sucesso!\")</script>";
    echo "<script>window.location = \"comissao.php\"</script>";
    
endif;
    
    ?>
                                          
                                          
            <?php
    if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
    
        $id_comissao = (int)$_GET['id_comissao'];
        $comissao->delete($id_comissao);
        
        endif;
    ?>                               
      <thead>
                                                      
							  <tr>
                                                          <th>Código</th>
							  <th>Corretor</th>
							  <th>Tipo</th>
							  <th>Comissão</th>
                                                          <th>Primeira</th>
                                                          <th>Segunda</th>
                                                          <th>Demais Parcelas</th>
							  <th>Acão</th>
							  </tr>
                                                          
						  </thead>
                                                 <?php foreach($comissao->findAll() as $key => $value): ?> 
                                                  
						  <tbody>
							<tr>
                                        <td><?php echo $value['id_comissao'];?></td>
					<td><?php echo $value['nome_razaosocial'];?></td>
                                        <td><?php echo $value['tipo'];?> </td>
                                        <td><?php echo $value['comissao'];?> </td>
                                        <td><?php echo $value['parcela_1'];?></td>
                                        <td><?php echo $value['parcela_2'];?></td>
                                        <td><?php echo $value['demais_parcela'];?></td>
					
					<td>
                                        
                                           
					</td>
				</tr>
							
						  </tbody>
                                              <?php endforeach; ?>	    
					  </table>              
    <!-- jQuery -->
    <script src="recursos/js/jquery-1.7.2.min.js"></script>
    <!-- jQuery UI -->
    <script src="recursos/js/jquery-ui-1.8.21.custom.min.js"></script>
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
    <script src='recursos/js/jquery.dataTables.min.js'></script>

    <!-- chart libraries start -->
    <script src="js/excanvas.js"></script>
    <script src="js/jquery.flot.min.js"></script>
    <script src="js/jquery.flot.pie.min.js"></script>
    <script src="js/jquery.flot.stack.js"></script>
    <script src="js/jquery.flot.resize.min.js"></script>
    <!-- chart libraries end -->

    <!-- select or dropdown enhancer -->
    <script src="recursos/js/jquery.chosen.min.js"></script>
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
    <script src="recursos/js/charisma.js"></script>

    <script src="recursos/js/bootstrap-datepicker.js"></script>
    
<style>
                   
.has-warning .form-control {
    border-color: blue;
    height: 50px;
    
}
.has-warning .help-block, .has-warning .control-label {
    color: #3498DB;
    opacity: 5;
}
.has-warning .input-group-addon {
    color: graytext;
    border-color: blue;
    background-color: #000;

}
legend {
   color: #fff;
    background-color: graytext;
	padding: 2px;
	padding-left: 15px;
}
.azul {
    background: graytext;
    padding: 5px;
    color: #FFF;
    text-align: center;
}



    </style>

</body>
</html>


