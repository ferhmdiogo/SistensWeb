<?php

require_once "class/crud_cliente.php";
require_once "class/cliente.php";
require_once 'utilidades/formatacao.php';

if(isset($_SESSION['logado'])):
   
    else:
        header("");

        
    
endif;

?>

<!DOCTYPE html>
<meta http-equiv="content-language" content="pt-br">

<script type="text/javascript" src="recursos/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="recursos/js/jquery-ui-1.8.21.custom.min.js"></script>
<script src="recursos/js/culture/jquery.ui.datepicker-pt-BR.js"></script>
<head>
    
    
    <?php 
    require_once "menu_usuarios.php";
    ?>
    
</head>

<body>

			
  <div class="row-fluid sortable">
    <div class="box span12">
    <div class="box-header well" data-original-title>
    <h2><i class="icon-edit"></i>Atualizar Cadastro</h2>
    </div>
        
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
    
        
    if(isset($_POST['atualizar'])):
    
    $id_cliente = $_POST['id_cliente'];
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
    
    $cliente->setIDCliente($id_cliente);
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
                
                if($cliente->update($id_cliente)){
                    echo "<script>alert(\"Cadastro atualizado com sucesso!\")</script>";
                    echo "<script>window.location = \"listaclientes.php\"</script>";        
                }
        
            endif;
            ?>
        
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
            $id_cliente = (int)$_GET['id_cliente'];
            $resultado = $cliente->find($id_cliente);
        

         ?>

    <div class="box-content">
    <form class="form-horizontal" method="post" action="">
    <fieldset>
    <div class="control-group">
    <label class="control-label" for="id_cliente">Class</label>
        <div class="controls">
            <input class="input-medium focused" id="id_cliente" name="id_cliente" type="text" value="<?php echo $resultado['id_cliente']; ?>" placeholder="Campo automático" readonly="readonly" >
        <select id="status" name="status" data-rel="chosen" class="input-large" value="<?php echo $resultado['status']; ?>" >
            <option>ATIVO</option>
            <option>AGUARDANDO APROVAÇÃO</option>
            <option>SETOR TÉCNICO</option>
            <option>CANCELADO</option>
       </select>
        </div>
        </div>
    <div class="control-group">
        <label class="control-label" for="estipulante">Estipulante</label>
    <div class="controls">
        <input class="input-xxlarge focused" id="estipulante" type="text" name="estipulante" value="<?php echo $resultado['estipulante']; ?>"   placeholder="Estipulante" required>
    </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="cpf_cnpj">Cpf/Cnpj</label>
    <div class="controls">
        <input class="input-large focused" id="cpf_cnpj" type="text" name="cpf_cnpj" onBlur="validaDocumento(this.value)" value="<?php echo $resultado['cpf_cnpj']; ?>" placeholder="Cpf/Cnpj" required>
    </div>
    </div>

    <div class="control-group">
       <label class="control-label" for="inicio_vigencia" >Inicio da Vigencia:</label>
    <div class="controls">
       <input type="text" class="input-medium datepicker" name="inicio_vigencia" id="datepicker" value="<?php echo date("d/m/Y", strtotime($resultado['inicio_vigencia'])); ?>" readonly="readonly">
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="inicio_contrato">Inicio de Contrato: </label>
    <div class="controls">
       <input type="text" class="input-medium datepicker" name="inicio_contrato" id="datepicker" value="<?php echo date("d/m/Y", strtotime($resultado['inicio_contrato'])); ?>" readonly="readonly">
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="tipo_proposta">Tipo de Proposta:</label>
    <div class="controls">
        <select id="tipo_proposta" name="tipo_proposta" data-rel="chosen" class="input-large" value="<?php echo $resultado['tipo_proposta']; ?>">
            <option>VG-VIDA EM GRUPO</option>
            <option>INDIVIDUAL</option>
            <option>GLOBAL</option>
            <option>PME</option>
       </select>
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="cep">Cep</label>
    <div class="controls">
       <input class="input-large focused" id="cep" type="text" name="cep" onBlur="getEndereco();" value="<?php echo $resultado['cep']; ?>">
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="endereco">Endereço</label>
    <div class="controls">
       <input class="input-xxlarge focused" id="endereco" type="text" name="endereco" placeholder="Endereço" required value="<?php echo $resultado['endereco']; ?>">
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="numero">Número</label>
    <div class="controls">
       <input class="input-mini focused" id="numero" type="text" name="numero" placeholder="Número" required value="<?php echo $resultado['numero']; ?>">
    </div>
    </div>

    <div class="control-group">
       <label class="control-label" for="complemento">Complemento</label>
    <div class="controls">
       <input class="input-large focused" id="complemento" type="text" name="complemento" value="<?php echo $resultado['complemento']; ?>">
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="bairro">Bairro</label>
    <div class="controls">
       <input class="input-xlarge focused" id="bairro" type="text" name="bairro" placeholder="Bairro" required value="<?php echo $resultado['bairro']; ?>">
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="cidade">Cidade</label>
    <div class="controls">
       <input class="input-xlarge focused" id="cidade" type="text" name="cidade" placeholder="Cidade" required value="<?php echo $resultado['cidade']; ?>">
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="uf">Uf:</label>
    <div class="controls">
       <select id="uf" name="uf" data-rel="chosen" value="<?php echo $resultado['uf']; ?>">
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AM">Amazonas</option>
            <option value="AP">Amapá</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goias</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RO">Rondônia</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SE">Sergipe</option>
            <option value="SP">São Paulo</option>
            <option value="TO">Tocantins</option>
            <option value="0">Escolha o estado</option>
        </select>                

    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="telefone1">Telefone:1</label>
    <div class="controls">
       <input class="input-large focused" id="telefone_1"  type="text" name="telefone_1" placeholder="Telefone 1" required value="<?php echo $resultado['telefone_1']; ?>" >
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="telefone2">Telefone:2</label>
    <div class="controls">
       <input class="input-large focused" id="telefone_2" type="text" name="telefone_2" value="<?php echo $resultado['telefone_2']; ?>" >
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="fax">Fax:</label>
    <div class="controls">
       <input class="input-large focused" id="fax" type="text" name="fax" value="<?php echo $resultado['fax']; ?>" >
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="celular">Celular:</label>
    <div class="controls">
       <input class="input-large focused" id="celular" type="text" name="celular" value="<?php echo $resultado['celular']; ?>" >
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="email">E-Mail:</label>
    <div class="controls">
       <input class="input-large focused" id="email" type="text" name="email" placeholder="E-Mail" required onBlur="ValidaEmail();" value="<?php echo $resultado['email']; ?>">
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="midias_sociais">Midias Sociais:</label>
    <div class="controls">
       <input class="input-large focused" id="midias_sociais" type="text" name="midias_sociais" value="<?php echo $resultado['midias_sociais']; ?>" >
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="contato">Contato</label>
    <div class="controls">
       <input class="input-large focused" id="contato" type="text" name="contato" placeholder="Contato" required value="<?php echo $resultado['contato']; ?>">
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="cargo">Cargo</label>
    <div class="controls">
       <input class="input-large focused" id="cargo" type="text" name="cargo" placeholder="Cargo" required value="<?php echo $resultado['cargo']; ?>">
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="corretor">Corretor:</label>
    <div class="controls">
        <select id="corretor" name="corretor" data-rel="chosen" value="<?php echo $resultado['corretor']; ?>">
            <option>Selecione...</option>



        </select>
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="assistente">Assistente:</label>
    <div class="controls">
       <select id="assistente" name="assistente" data-rel="chosen" value="<?php echo $resultado['assistente']; ?>">
            <option>Selecione...</option>
           
       </select>
    </div>
    </div>
        <?php }
        ?>
    <div class="form-actions">
       <button type="submit" class="btn btn-primary" name="atualizar" value="Atualizar" >Atualizar</button>
       <button class="btn">Cancelar</button>
    </div>
    </fieldset>
    </form>

    </div>
    </div><!--/span-->

                    </div><!--/row-->
        <div class="modal hide fade" id="myModal">
                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">�</button>
                            <h3>Settings</h3>
                    </div>
                    <div class="modal-body">
                            <p>Here settings can be configured...</p>
                    </div>
                    <div class="modal-footer">
                            <a href="#" class="btn" data-dismiss="modal">Close</a>
                            <a href="#" class="btn btn-primary">Save changes</a>
                    </div>
            </div>
                    
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

    <script src="js/bootstrap-datepicker.js"></script>
    <script>

/*==TAGS INPUT==*/
$(function() {
    $('#midias_sociais').tagsInput({width: 'auto'});
     $('#cnpj_cpf_filial').tagsInput({width: 'auto'});
      $('#razao_social_filial').tagsInput({width: 'auto'});
       $('#telefone_filial').tagsInput({width: 'auto'});
    $('#tags_2').tagsInput({
        width: 'auto',
        onChange: function(elem, elem_tags)
        {
            var languages = ['php', 'ruby', 'javascript'];
            $('.tag', elem_tags).each(function()
            {
                if ($(this).text().search(new RegExp('\\b(' + languages.join('|') + ')\\b')) >= 0)
                    $(this).css('background-color', 'yellow');
            });
        }
    });
});

/*===INPUT MASK==*/
jQuery(function($) {
    $("$#telefone_1").mask("99-9999-9999");
    $("#telefone_filial").mask("99-9999-9999");
    $("#telefone_2").mask("99-9999-9999");
    $("#fax").mask("99-9999-9999");
    $("#celular").mask("99-999999999");
});
/*===UI SPINNER==*/
$(function() {
    $("#spinner").spinner({
        step: 0.01,
        numberFormat: "n"
    });
});



</script>

</body>
</html>

