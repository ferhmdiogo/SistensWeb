<?php

require_once "class/crud_cliente.php";
require_once "class/cliente.php";
require_once "utilidades/formatacao.php";

if(isset($_SESSION['logado'])):
   
    else:
        header("");

        
    
endif;

?>

<!DOCTYPE html>
<meta http-equiv="content-language" content="pt-br">
<link href="recursos/css/chosen.css" rel="stylesheet">

<script type="text/javascript" src="recursos/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="recursos/js/jquery-ui-1.8.21.custom.min.js"></script>
<link href="recursos/css/datepicker.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="https://raw.github.com/digitalBush/jquery.maskedinput/1.3.1/dist/jquery.maskedinput.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="recursos/recursos/bower_components/chosen/chosen.jquery.min.js"></script>

<head>
    
    
    <?php 
    require_once "menu_usuarios.php";
    ?>

</style>
<script>
  

    
    function validaDocumento(doc)
    {
        
        var num_caracteres =  doc.length;
      
     if(num_caracteres==11)
     {    
       if(!isCpf(doc))
           alert('CPF invalido');
       
     }else if(num_caracteres==14)
     {
          if(!isCnpj(doc))
           alert('CNPJ invalido');        
     }else
     {
         alert('Numero do documento é inválido');
         
     }
        
    }

function formaNumeroDoc(pNum)
{
    return String(pNum).replace(/\D/g, "").replace(/^0+/, "");
}
function isCpf(cpf) {
var soma;
var resto;
var i;
 
 if ( (cpf.length != 11) ||
 (cpf == "00000000000") || (cpf == "11111111111") ||
 (cpf == "22222222222") || (cpf == "33333333333") ||
 (cpf == "44444444444") || (cpf == "55555555555") ||
 (cpf == "66666666666") || (cpf == "77777777777") ||
 (cpf == "88888888888") || (cpf == "99999999999") ) {
 return false;
 }
 
 soma = 0;
 
 for (i = 1; i <= 9; i++) {
 soma += Math.floor(cpf.charAt(i-1)) * (11 - i);
 }
 
 resto = 11 - (soma - (Math.floor(soma / 11) * 11));
 
 if ( (resto == 10) || (resto == 11) ) {
 resto = 0;
 }
 
 if ( resto != Math.floor(cpf.charAt(9)) ) {
 return false;
 }
 
 soma = 0;
 
 for (i = 1; i<=10; i++) {
 soma += cpf.charAt(i-1) * (12 - i);
 }
 
 resto = 11 - (soma - (Math.floor(soma / 11) * 11));
 
 if ( (resto == 10) || (resto == 11) ) {
 resto = 0;
 }
 
 if (resto != Math.floor(cpf.charAt(10)) ) {
 return false;
 }
 
 return true;
}
 
function isCnpj(s){
var i;
var c = s.substr(0,12);
var dv = s.substr(12,2);
var d1 = 0;
 
 for (i = 0; i < 12; i++){
 d1 += c.charAt(11-i)*(2+(i % 8));
 }
 
 if (d1 == 0) return false;
 
 d1 = 11 - (d1 % 11);
 
 if (d1 > 9) d1 = 0;
 if (dv.charAt(0) != d1){
 return false;
 }
 
 d1 *= 2;
 
 for (i = 0; i < 12; i++){
 d1 += c.charAt(11-i)*(2+((i+1) % 8));
 }
 
 d1 = 11 - (d1 % 11);
 
 if (d1 > 9) d1 = 0;
 if (dv.charAt(1) != d1){
 return false;
 }
 
 return true;
}
 
function isCpfCnpj(valor) {
 var retorno = false;
 var numero  = valor;
 
 numero = unformatNumber(numero);
 if (numero.length > 11){
 if (isCnpj(numero)) {
 retorno = true;
 }
 } else {
 if (isCpf(numero)) {
 retorno = true;
 }
 }
 
 return retorno;
}
 
 


</script>  

<script>
function getEndereco() {
                    
                    
              
                // Se o campo CEP n�o estiver vazio
                if($.trim($("#cep").val()) != ""){
        
   
                    /*
                                       Para conectar no servi�o e executar o json, precisamos usar a fun��o
                                       getScript do jQuery, o getScript e o dataType:"jsonp" conseguem fazer o cross-domain, os outros
                                       dataTypes n�o possibilitam esta intera��o entre dom�nios diferentes
                                       Estou chamando a url do servi�o passando o par�metro "formato=javascript" e o CEP digitado no formul�rio
                                       http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val()
                     */
                    $.getScript("http://cep.republicavirtual.com.br/web_cep.php?formato=javascript&cep="+$("#cep").val(), function(){
                        // o getScript d� um eval no script, ent�o � s� ler!
                        //Se o resultado for igual a 1
                        if(resultadoCEP["resultado"] && resultadoCEP["resultado"] == "1"){
                            // troca o valor dos elementos
                            $("#alert").css("color","green");
                            $("#alert").html("Numero Válido. Obrigado!");
                            $("#endereco").val(unescape(resultadoCEP["tipo_logradouro"])+"  "+unescape(resultadoCEP["logradouro"]));
                            $("#bairro").val(unescape(resultadoCEP["bairro"]));
                            $("#cidade").val(unescape(resultadoCEP["cidade"]));
                            $("#estado").val(unescape(resultadoCEP["uf"]));
                            $("#cep").val(unescape($("#cep").val()));
                            $("#numero").focus();
                        }

                        if(!resultadoCEP)
                        {
                            $("#alert").css("color","red");
                            $("#alert").html("CEP não encontrado. Verifique, por favor.");
                        }
                                        
                    });
                }
            }
            
            $(function() {


        $('#inicio_vigencia').datepicker({
            format: 'dd/mm/yyyy',
        });
        $('#data_emissao_mes').datepicker({
            format: 'dd/mm/yyyy',
        });

        $('#inicio_renovacao').datepicker({
            format: 'dd/mm/yyyy',
        });

        $('#fim_renovacao').datepicker({
            format: 'dd/mm/yyyy',
        });
        $('#fim_vigencia_mes').datepicker({
            format: 'dd/mm/yyyy',
        });



        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
        $('#inicio_vigencia').datepicker({
            format: 'dd/mm/yyyy',
        });
        $('#inicio_contrato').datepicker({
            format: 'dd/mm/yyyy',
        });

        var checkin = $('#inicio_vigencia').datepicker({
            onRender: function(date) {
                return date.valueOf() < now.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
            if (ev.date.valueOf() > checkout.date.valueOf()) {
                var newDate = new Date(ev.date)
                newDate.setDate(newDate.getDate() + 1);
                checkout.setValue(newDate);
            }
            checkin.hide();
            $('#inicio_contrato')[0].focus();
        }).data('datepicker');
        var checkout = $('#inicio_contrato').datepicker({
            onRender: function(date) {
                return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
            }
        }).on('changeDate', function(ev) {
            checkout.hide();
        }).data('datepicker');
    });


    /*===INPUT MASK==*/
    jQuery(function($) {
        $("#telefone_1").mask("99-9999-9999");
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

</head>
<body>

			
  <div class="row-fluid sortable">
    <div class="box span12">
    <div class="box-header well" data-original-title>
    <h2><i class="icon-edit"></i>Novo Cadastro</h2>
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
    echo "<script>alert(\"Cadastro efetuado com sucesso!\")</script>";
    echo "<script>window.location = \"novo.php\"</script>";        
    
endif;
    
    ?>
        

    <div class="box-content">
    <form class="form-horizontal" method="post" action="">
    <fieldset>
    <div class="control-group">
    <label class="control-label" for="id_cliente">Class</label>
        <div class="controls">
        <input class="input-medium focused" id="id_cliente" type="text" name="id_cliente" placeholder="Campo automático" >
        <select id="status" name="status" data-rel="chosen" class="input-large">
            <option>AGUARDANDO APROVAÇÃO</option>
            <option>ATIVO</option>
            <option>SETOR TÉCNICO</option>
            <option>CANCELADO</option>
       </select>
        </div>
    
        </div>
        
    <div class="control-group">
        <label class="control-label" for="estipulante">Estipulante</label>
    <div class="controls">
        <input class="input-xxlarge focused" id="estipulante" type="text" name="estipulante"   placeholder="Estipulante" required>
    </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="cpf_cnpj">Cpf/Cnpj</label>
    <div class="controls">
        <input class="input-large focused" id="cpf_cnpj" type="text" name="cpf_cnpj" onBlur="validaDocumento(this.value)" placeholder="Cpf/Cnpj" required>
    </div>
    </div>

    <div class="control-group">
       <label class="control-label" for="inicio_vigencia" >Inicio da Vigencia:</label>
    <div class="controls">
        
       <input type="text" class="input-medium datepicker" name="inicio_vigencia" id="inicio_vigencia" <?php echo date('d/m/Y - H:i',time()-0);?>>
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="inicio_contrato">Inicio de Contrato: </label>
    <div class="controls">
       <input type="text" class="input-medium datepicker" name="inicio_contrato" id="inicio_contrato" <?php echo date('d/m/Y - H:i',time()-0);?>>
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="tipo_proposta">Tipo de Proposta:</label>
    <div class="controls">
        <select id="tipo_proposta" name="tipo_proposta" data-rel="chosen" class="input-large">
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
       <input class="input-large focused" id="cep" type="text" name="cep" onBlur="getEndereco();">
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="endereco">Endereço</label>
    <div class="controls">
       <input class="input-xxlarge focused" id="endereco" type="text" name="endereco" placeholder="Endereço" required>
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="numero">Número</label>
    <div class="controls">
       <input class="input-mini focused" id="numero" type="text" name="numero" placeholder="Número" required>
    </div>
    </div>

    <div class="control-group">
       <label class="control-label" for="complemento">Complemento</label>
    <div class="controls">
       <input class="input-large focused" id="complemento" type="text" name="complemento">
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="bairro">Bairro</label>
    <div class="controls">
       <input class="input-xlarge focused" id="bairro" type="text" name="bairro" placeholder="Bairro" required>
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="cidade">Cidade</label>
    <div class="controls">
       <input class="input-xlarge focused" id="cidade" type="text" name="cidade" placeholder="Cidade" required>
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="uf">Uf:</label>
    <div class="controls">
       <select id="uf" name="uf" data-rel="chosen">
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
       <input class="input-large focused" id="telefone_1"  type="text" name="telefone_1" placeholder="Telefone 1" required >
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="telefone2">Telefone:2</label>
    <div class="controls">
       <input class="input-large focused" id="telefone_2" type="text" name="telefone_2" data-mask="(999) 999-9999 x9999" >
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="fax">Fax:</label>
    <div class="controls">
       <input class="input-large focused" id="fax" type="text" name="fax" >
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="celular">Celular:</label>
    <div class="controls">
       <input class="input-large focused" id="celular" type="text" name="celular" >
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="email">E-Mail:</label>
    <div class="controls">
       <input class="input-large focused" id="email" type="text" name="email" placeholder="E-Mail" required onBlur="ValidaEmail();">
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="midias_sociais">Midias Sociais:</label>
    <div class="controls">
       <input class="input-large focused" id="midias_sociais" type="text" name="midias_sociais" >
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="contato">Contato</label>
    <div class="controls">
       <input class="input-large focused" id="contato" type="text" name="contato" placeholder="Contato" required>
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="cargo">Cargo</label>
    <div class="controls">
       <input class="input-large focused" id="cargo" type="text" name="cargo" placeholder="Cargo" required>
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="corretor">Corretor:</label>
    <div class="controls">
<?php
        $pdo = new PDO('mysql:host=localhost;dbname=sistensweb', 'root', '123@mudar');
        $sql = "SELECT id_corretor, nome_razaosocial FROM corretor";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) { ?>
<select id="corretor" name="corretor" data-rel="chosen">
<?php foreach ($results as $row) { ?>
        <option value="<?php echo $row['id_corretor']; ?>"><?php echo $row['nome_razaosocial']; ?></option>
<?php } ?>
</select>
<?php } ?>


        </select>
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="assistente">Assistente:</label>
    <div class="controls">
       <?php
        $pdo = new PDO('mysql:host=localhost;dbname=sistensweb', 'root', '123@mudar');
        $sql = "SELECT id_assistente, nome_assistente FROM assistente";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($stmt->rowCount() > 0) { ?>
<select id="assistente" name="assistente" data-rel="chosen">
<?php foreach ($results as $row) { ?>
        <option value="<?php echo $row['id_assistente']; ?>"><?php echo $row['nome_assistente']; ?></option>
<?php } ?>
</select>
<?php } ?>
    </div>
    </div>
    <div class="form-actions">
       <button type="submit" class="btn btn-primary" name="salvar" value="Submit request" >Salvar</button>
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
    <script src="recursos/js/bootstrap-dropdown.js"></script>
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
    


</body>
</html>
