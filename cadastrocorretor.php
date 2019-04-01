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
<link href="recursos/css/charisma-app.css" rel="stylesheet">
<link href="recursos/css/bootstrap.css" rel="stylesheet">
<link href="recursos/css/bootstrap-dropdown.css" rel="stylesheet">
<link href="recursos/css/bootstrap.min.css" rel="stylesheet">


<script type="text/javascript" src="recursos/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="recursos/js/jquery-ui-1.8.21.custom.min.js"></script>
<link href="recursos/css/datepicker.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="https://raw.github.com/digitalBush/jquery.maskedinput/1.3.1/dist/jquery.maskedinput.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="recursos/recursos/bower_components/chosen/chosen.jquery.min.js"></script>

<head>
    
    
    <?php 
    require_once "menu_corretor.php";
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
        $('#data_cadastro').datepicker({
            format: 'dd/mm/yyyy',
        });
        $('#ultima_alteracao').datepicker({
            format: 'dd/mm/yyyy',
        });

        var checkin = $('#data_cadastro').datepicker({
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
            $('#ultima_alteracao')[0].focus();
        }).data('datepicker');
        var checkout = $('#ultima_alteracao').datepicker({
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
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="glyphicon glyphicon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="glyphicon glyphicon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="glyphicon glyphicon-remove"></i></a>
						</div>
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
    echo "<script>window.location = \"cadastrocorretor.php\"</script>";        
    
endif;
    
    ?>
        

    <div class="box-content">
    <form class="form-horizontal" method="post" action="">
    <fieldset>
    <div class="control-group">
    <label class="control-label" for="id_corretor">Código do Corretor</label>
        <div class="controls">
        <input class="input-medium focused" id="id_corretor" type="text" name="id_corretor" placeholder="Campo automático" >
        <select id="status" name="status" data-rel="chosen" class="input-large">
            <option>AGUARDANDO APROVAÇÃO</option>
            <option>ATIVO</option>
            <option>SETOR TÉCNICO</option>
            <option>CANCELADO</option>
       </select>
        </div>
    
        </div>
        
    <div class="control-group">
        <label class="control-label" for="estipulante">Nome Razão Social</label>
    <div class="controls">
        <input class="input-xxlarge focused" id="nome_razaosocial" type="text" name="nome_razaosocial"   placeholder="Nome Razão Social" required>
    </div>
    </div>
    <div class="control-group">
       <label class="control-label" for="pessoa">Pessoa:</label>
    <div class="controls">
        <select id="pessoa" name="pessoa" data-rel="chosen" class="input-large">
            <option>FISÍCA</option>
            <option>JURÍDICA</option>
            
       </select>
    </div>
    </div>    
    <div class="control-group">
        <label class="control-label" for="cpf_cnpj">Cpf/Cnpj</label>
    <div class="controls">
        <input class="input-large focused" id="cpf_cnpj" type="text" name="cpf_cnpj" onBlur="validaDocumento(this.value)" placeholder="Cpf/Cnpj" required>
    </div>
    </div>

    <div class="control-group">
       <label class="control-label" for="inicio_vigencia" >Susep:</label>
    <div class="controls">
        
       <input type="text" class="input-medium" name="susep" id="susep">
    </div>
    </div>
    
    <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-th"></i>Corretor - Endereço/Contatos</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="glyphicon glyphicon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="glyphicon glyphicon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="glyphicon glyphicon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                  	<div class="row-fluid">
                        <div class="control-group">
								<label class="control-label" for="cep">Cep</label>
								<div class="controls">
								  <input class="input-large focused" id="cep" type="text" onblur="getEndereco();" placeholder="Cep" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="endereco">Endereço</label>
								<div class="controls">
								  <input class="input-xxlarge focused" id="endereco" type="text" placeholder="Endereço" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="numero">Número</label>
								<div class="controls">
								  <input class="input-mini focused" id="numero" type="text" placeholder="Número" required>
								</div>
							  </div>
							  
							  <div class="control-group">
								<label class="control-label" for="complemento">Complemento</label>
								<div class="controls">
								  <input class="input-large focused" id="complemento" type="text" placeholder="Complemento" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="bairro">Bairro</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="bairro" type="text" placeholder="Bairro" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="cidade">Cidade</label>
								<div class="controls">
								  <input class="input-xlarge focused" id="cidade" type="text" placeholder="Cidade" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="uf">Uf:</label>
								<div class="controls">
								  <select id="uf" data-rel="chosen">
									<option value="0">Escolha o estado</option>
<option value="AC">Acre</option>
<option value="AL">Alagoas</option>
<option value="AM">Amazonas</option>
<option value="AP">Amapá</option>
<option value="BA">Bahia</option>
<option value="CE">Ceará</option>
<option value="DF">Distrito Federal</option>
<option value="ES">Espírito Santo</option>
<option value="GO">Goiás</option>
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
</select>                
						            
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="telefone1">Telefone:1</label>
								<div class="controls">
								  <input class="input-large focused" id="telefone_1"  type="text" placeholder="Telefone 1" required >
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="telefone2">Telefone:2</label>
								<div class="controls">
								  <input class="input-large focused" id="telefone_2" type="text" >
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="fax">Fax:</label>
								<div class="controls">
								  <input class="input-large focused" id="fax" type="text" >
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="celular">Celular:</label>
								<div class="controls">
								  <input class="input-large focused" id="celular" type="text" >
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="email">E-Mail:</label>
								<div class="controls">
								  <input class="input-large focused" id="email" type="text" placeholder="E-Mail" required onBlur="ValidaEmail();">
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="midias_sociais">Midias Sociais:</label>
								<div class="controls">
								  <input class="input-large focused" id="midias_sociais" type="text" >
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="contato_corretor">Contato</label>
								<div class="controls">
								  <input class="input-large focused" id="contato_corretor" type="text" placeholder="Contato" required>
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="cargo">Cargo</label>
								<div class="controls">
								  <input class="input-large focused" id="cargo" type="text" placeholder="Cargo" required>
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
							  
                  </div>
				</div><!--/span-->
			</div><!--/row-->
                    </div>                   
                <div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-th"></i>Corretor - Dados Bancários</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="glyphicon glyphicon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="glyphicon glyphicon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="glyphicon glyphicon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
                  	<div class="row-fluid">
                        <div class="control-group">
								<label class="control-label" for="banco_debito">Banco para Débito:</label>
								<div class="controls">
								  <select id="banco_debito" data-rel="chosen" class="input-medium">
								  <option value="0">Escolha o Banco</option>
									<option>Paulo Mourão</option>
									<option>Marcio Costa</option>
						            </select>
									
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="codigo_banco">Código do Banco</label>
								<div class="controls">
								  <select id="codigo_banco" data-rel="chosen" class="input-small">
								  <option value="0">Código</option>
									<option>Paulo Mourão</option>
									<option>Marcio Costa</option>
						            </select>
									
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="nome_banco">Nome do Banco</label>
								<div class="controls">
								  <input class="input-xlarge" id="nome_banco" type="text" >
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="agencia">Agencia</label>
								<div class="controls">
								  <input class="input-medium" id="agencia" type="text" >
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="conta_corrente">Conta Corrente</label>
								<div class="controls">
								  <input class="input-medium" id="conta_corrente" type="text" >
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="contato">Contato</label>
								<div class="controls">
								  <input class="input-medium" id="contato" type="text" >
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="saldo_real">Saldo Real</label>
								<div class="controls">
								  <input class="input-medium" id="saldo_real" type="text" >
								</div>
							  </div>
							  <div class="control-group">
								<label class="control-label" for="saldo_estimado">Saldo Estimado</label>
								<div class="controls">
								  <input class="input-medium" id="saldo_estimado" type="text" >
								</div>
							  </div>
							  <div class="control-group">
							  <label class="control-label" for="data_cadastro" >Data do Cadastro</label>
							  <div class="controls">
								<input type="text" class="input-medium datepicker" value="" id="data_cadastro"<?php echo date('d/m/Y - H:i',time()-0);?>
							  </div>
							  </div>
                        </div>
							  <div class="control-group">
							  <label class="control-label" for="ultima_alteracao" >Última Alteração</label>
							  <div class="controls">
								<input type="text" class="input-medium datepicker" value="" id="ultima_alteracao"<?php echo date('d/m/Y - H:i',time()-0);?>
							  </div>
							  </div>
                                            
							  <div class="box-content">
                  	<div class="row-fluid">
                        <div class="control-group">
								<label class="control-label" for="impostos_incidentes">Impostos Incidentes</label>
								<div class="controls">
								  <select id="impostos_incidentes" data-rel="chosen" class="input-medium">
								  <option value="0">Escolha</option>
								    <option>I.R-1</option>
									<option>I.R-5</option>
									<option>I.R-10</option>
									<option>I.R-20</option>
									<option>I.R-30</option>
									<option>I.R-40</option>
									<option>I.R-50</option>
									<option>I.R-60</option>
									<option>I.R-70</option>
									<option>I.R-80</option>
									<option>I.R-90</option>
									<option>I.R-100</option>
									<option>I.S.S-1</option>
									<option>I.S.S-5</option>
									<option>I.S.S-10</option>
									<option>I.S.S-20</option>
									<option>I.S.S-30</option>
									<option>I.S.S-40</option>
									<option>I.S.S-50</option>
									<option>I.S.S-60</option>
									<option>I.S.S-70</option>
									<option>I.S.S-80</option>
									<option>I.S.S-90</option>
									<option>I.S.S-100</option>
						            </select>
									
								</div>
							  </div>
							  
                    </div>                   
                  </div>
				</div><!--/span-->
			</div><!--/row-->

					            
							  
							    <div class="form-actions">
								<button type="submit" class="btn btn-primary">Salvar</button>
								<button class="btn">Cancelar</button>
							   </div>
							</fieldset>
						  </form>
					
					</div>
				</div><!--/span-->
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
    
<script>

    ajax = new ajax;
    function gravarFilial()
    {

        var cnpj_cpf_filial = $('#cnpj_cpf_filial ').val();
        var telefone_filial = $('#telefone_filial').val();
        var razao_social_filial = encodeURIComponent($('#razao_social_filial').val());

        ajax.open("POST", "http://www.siedunivida.com.br/clientes/cadastrarFilial/", true);
        ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=iso-8859-1");
        ajax.send('cnpj_cpf_filial=' + cnpj_cpf_filial + '&razao_social_filial=' + razao_social_filial + '&telefone_filial=' + telefone_filial);
        ajax.onreadystatechange = function() {
            if (ajax.readyState == 4) {
                document.getElementById("result").innerHTML = ajax.responseText;
            } else {
                document.getElementById("result").innerHTML = "Aguarde...";
            }
        }

        return false;

    }

    $(document).ready(function() {

        $("#cadastro_filial").hide();


        $('#cadastro_filial_sim').click(function() {
            $("#cadastro_filial").show("slow");
        });
        $('#cadastro_filial_nao').click(function() {
            $("#cadastro_filial").hide("slow");
        });


        $('.icheck-box,.icheck-radio').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red',
            increaseArea: '20%' // optional
        });
        $('.icheck-box-flat,.icheck-radio-flat').iCheck({
            checkboxClass: 'icheckbox_flat-red',
            radioClass: 'iradio_flat-red'
        });
        $('.icheck-box-futurico,.icheck-radio-futurico').iCheck({
            checkboxClass: 'icheckbox_futurico',
            radioClass: 'iradio_futurico',
            increaseArea: '20%' // optional
        });
        $('.icheck-box-polaris,.icheck-radio-polaris').iCheck({
            checkboxClass: 'icheckbox_polaris',
            radioClass: 'iradio_polaris',
            increaseArea: '-10' // optional
        });
        $('.icheck-box-square,.icheck-radio-square').iCheck({
            checkboxClass: 'icheckbox_square',
            radioClass: 'iradio_square',
            increaseArea: '20%' // optional
        });
        $('.icheck-box-line,.icheck-radio-line').each(function() {
            var self = $(this),
                    label = self.next(),
                    label_text = label.text();
            label.remove();
            self.iCheck({
                checkboxClass: 'icheckbox_line-red',
                radioClass: 'iradio_line-red',
                insert: '<div class="icheck_line-icon"></div>' + label_text
            });
        });
    });
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
<script language="text/javascript">
        function chngcolor()
        {
            var x=document.getElemetById('status')[0].value;
            if(x=='Accept')
            {
                x.style.color = '#00FF00';

            }

        }
</script>

</body>
</html>


