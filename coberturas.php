<?php

require_once"class/class_coberturas.php";
require_once"class/crud_coberturas.php";
require_once"utilidades/formatacao.php";


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
<head>
    
    <?php 
		require_once "menu_usuarios.php";
	?>
    
	

	<script language="javascript">

function MascaraMoeda(objTextBox, SeparadorMilesimo, SeparadorDecimal, e){
    var sep = 0;
    var key = '';
    var i = j = 0;
    var len = len2 = 0;
    var strCheck = '0123456789';
    var aux = aux2 = '';
    var whichCode = (window.Event) ? e.which : e.keyCode;
    if (whichCode === 13) return true;
    key = String.fromCharCode(whichCode); // Valor para o c�digo da Chave
    if (strCheck.indexOf(key) === -1) return false; // Chave inv�lida
    len = objTextBox.value.length;
    for(i = 0; i < len; i++)
        if ((objTextBox.value.charAt(i) !== '0') && (objTextBox.value.charAt(i) !== SeparadorDecimal)) break;
    aux = '';
    for(; i < len; i++)
        if (strCheck.indexOf(objTextBox.value.charAt(i))!==-1) aux += objTextBox.value.charAt(i);
    aux += key;
    len = aux.length;
    if (len === 0) objTextBox.value = '';
    if (len === 1) objTextBox.value = '0'+ SeparadorDecimal + '0' + aux;
    if (len === 2) objTextBox.value = '0'+ SeparadorDecimal + aux;
    if (len > 2) {
        aux2 = '';
        for (j = 0, i = len - 3; i >= 0; i--) {
            if (j === 3) {
                aux2 += SeparadorMilesimo;
                j = 0;
            }
            aux2 += aux.charAt(i);
            j++;
        }
        objTextBox.value = '';
        len2 = aux2.length;
        for (i = len2 - 1; i >= 0; i--)
        objTextBox.value += aux2.charAt(i);
        objTextBox.value += SeparadorDecimal + aux.substr(len - 2, len);
    }
    return false;
}


</script>

</head>
<body>

    <div class="row-fluid sortable">
    <div class="box span12">
    <div class="box-header well" data-original-title>
    <h2><i class="icon-edit"></i>Coberturas</h2>
    </div>
    <?php
    
    $cobertura = new Coberturas();
    
    if(isset($_POST['salvar'])):
        $id_cliente = $_POST['id_cliente'];
        $apolice = $_POST['apolice'];
        $inicio_vigencia = $_POST['inicio_vigencia'];
        $inicio_contrato = $_POST['inicio_contrato'];
        $tipo_proposta = $_POST['tipo_proposta'];
        $estipulante = $_POST['estipulante'];
        $tipo_capital = $_POST['tipo_capital'];
        $multiplicados_tipo_capital = $_POST['multiplicados_tipo_capital'];
        $atividade = $_POST['atividade'];
        $capital = $_POST['capital'];
        $tabela = $_POST['tabela'];
        $capital_segurado_min = $_POST['capital_segurado_min'];
        $capital_segurado_max = $_POST['capital_segurado_max'];
        $porcentagem_estipulante = $_POST['porcentagem_estipulante'];
        $porcentagem_segurado = $_POST['porcentagem_segurado'];
        $morte_campo = $_POST['morte_campo'];
        $morte = $_POST['morte'];
        $morte_acidental_c = $_POST['morte_acidental_c'];
        $morte_acidental = $_POST['morte_acidental'];
        $ipa_c = $_POST['ipa_c'];
        $ipa = $_POST['ipa'];
        $ifpd_c = $_POST['ifpd_c'];
        $ifpd = $_POST['ifpd'];
        $dmh_c = $_POST['dmh_c'];
        $dmh = $_POST['dmh'];
        $recisao_trabalhista_c = $_POST['recisao_trabalhista_c'];
        $recisao_trabalhista = $_POST['recisao_trabalhista'];
        $assistencia_funeral = $_POST['assistencia_funeral'];
        $cesta_natalina_c = $_POST['cesta_natalina_c'];
        $cesta_natalina = $_POST['cesta_natalina'];
        $cesta_basica_c = $_POST['cesta_basica_c'];
        $cesta_basica = $_POST['cesta_basica'];
        $conjugue_morte_c = $_POST['conjugue_morte_c'];
        $conjugue_morte = $_POST['conjugue_morte'];
        $conjugue_morte_acidental_c = $_POST['conjugue_morte_acidental_c'];
        $conjugue_morte_acidental = $_POST['conjugue_morte_acidental'];
        $conjugue_ipa_c = $_POST['conjugue_ipa_c'];
        $conjugue_ipa = $_POST['conjugue_ipa'];
        $conjugue_assistencia_funeral_c = $_POST['conjugue_assistencia_funeral_c'];
        $conjugue_assistencia_funeral = $_POST['conjugue_assistencia_funeral'];
        $doenca_congenita_filho_c = $_POST['doenca_congenita_filho_c'];
        $doenca_congenita_filho = $_POST['doenca_congenita_filho'];
        $morte_filho_c = $_POST['morte_filho_c'];
        $morte_filho = $_POST['morte_filho'];
        $assistencia_funeral_filho_c = $_POST['assistencia_funeral_filho_c'];
        $assistencia_funeral_filho = $_POST['assistencia_funeral_filho'];
        $assist_viagem_nacional_c = $_POST['assist_viagem_nacional_c'];
        $assist_viagem_internacional_c = $_POST['assist_viagem_internacional_c'];
        $despesa_extra = $_POST['despesa_extra'];
        $sorteio_mensal = $_POST['sorteio_mensal'];
        $inicio_vigencia_mes = $_POST['inicio_vigencia_mes'];
        $fim_vigencia_mes = $_POST['fim_vigencia_mes'];
        $data_emissao_mes = $_POST['data_emissao_mes'];
        $frequencia_emissao = $_POST['frequencia_emissao'];
        $frequencia_vencimento = $_POST['frequencia_vencimento'];
        $moeda = $_POST['moeda'];
        $inicio_renovacao = $_POST['inicio_renovacao'];
        $fim_renovacao = $_POST['fim_renovacao'];
        $cartao_proposta = $_POST['cartao_proposta'];
        $inadiplencia_apos = $_POST['inadiplencia_apos'];
        $limite_idade = $_POST['limite_idade'];
        $minimo_faturamento = $_POST['minimo_faturamento'];
        
        //Set
        
        $cobertura->setId_Cliente($id_cliente);
        $cobertura->setApolice($apolice);
        $cobertura->setInicioVigencia($inicio_vigencia);
        $cobertura->setInicioContrato($inicio_contrato);
        $cobertura->setTipoProposta($tipo_proposta);
        $cobertura->setEstipulante($estipulante);
        $cobertura->setTipoCapital($tipo_capital);
        $cobertura->setMultiplicadosTipoCapital($multiplicados_tipo_capital);
        $cobertura->setAtividade($atividade);
        $cobertura->setCapital($capital);
        $cobertura->setTabela($tabela);
        $cobertura->setCapitalSeguradoMinimo($capital_segurado_min);
        $cobertura->setCapitalSeguradoMaximo($capital_segurado_max);
        $cobertura->setPorcentagemEstipulante($porcentagem_estipulante);
        $cobertura->setPorcentagemSegurado($porcentagem_segurado);
        $cobertura->setMorteCampo($morte_campo);
        $cobertura->setMorte($morte);
        $cobertura->setMorteAcidentalC($morte_acidental_c);
        $cobertura->setMorteAcidental($morte_acidental);
        $cobertura->setIpaC($ipa_c);
        $cobertura->setIpa($ipa);
        $cobertura->setIfpdC($ifpd_c);
        $cobertura->setIfpd($ifpd);
        $cobertura->setDmhc($dmh_c);
        $cobertura->setDmh($dmh);
        $cobertura->setRecisaoTrabalhistaC($recisao_trabalhista_c);
        $cobertura->setRecisaoTrabalhista($recisao_trabalhista);
        $cobertura->setAssistenciaFuneral($assistencia_funeral);
        $cobertura->setCestaNatalinaC($cesta_natalina_c);
        $cobertura->setCestaNatalina($cesta_natalina);
        $cobertura->setCestaBasicaC($cesta_basica_c);
        $cobertura->setCestaBasica($cesta_basica);
        $cobertura->setConjugueMorteC($conjugue_morte_c);
        $cobertura->setConjugueMorte($conjugue_morte);
        $cobertura->setConjugueMorteAcidentalC($conjugue_morte_acidental_c);
        $cobertura->setConjugueMorteAcidental($conjugue_morte_acidental);
        $cobertura->setConjugueIpaC($conjugue_ipa_c);
        $cobertura->setConjugueIpa($conjugue_ipa);
        $cobertura->setConjugueAssistenciaFuneralC($conjugue_assistencia_funeral_c);
        $cobertura->setConjugueAssistenciaFuneral($conjugue_assistencia_funeral);
        $cobertura->setDoencaCongenitaFilhoC($doenca_congenita_filho_c);
        $cobertura->setDoencaCongenitaFilho($doenca_congenita_filho);
        $cobertura->setMorteFilhoC($morte_filho_c);
        $cobertura->setMorteFilho($morte_filho);
        $cobertura->setAssistenciaFuneralFilhoC($assistencia_funeral_filho_c);
        $cobertura->setAssistenciaFuneralFilho($assistencia_funeral_filho);
        $cobertura->setAssistenciaViagemNacionalC($assist_viagem_nacional_c);
        $cobertura->setAssistenciaViagemInternacionalC($assist_viagem_internacional_c);
        $cobertura->setDespesaExtra($despesa_extra);
        $cobertura->setSorteioMensal($sorteio_mensal);
        $cobertura->setInicioVigenciaMes($inicio_vigencia_mes);
        $cobertura->setFimVigenciaMes($fim_vigencia_mes);
        $cobertura->setDataEmissaoMes($data_emissao_mes);
        $cobertura->setFrequenciaEmissao($frequencia_emissao);
        $cobertura->setFrequenciaVencimento($frequencia_vencimento);
        $cobertura->setMoeda($moeda);
        $cobertura->setInicioRenovacao($inicio_renovacao);
        $cobertura->setFimRenovacao($fim_renovacao);
        $cobertura->setCartaoProposta($cartao_proposta);
        $cobertura->setInadiplenciaApos($inadiplencia_apos);
        $cobertura->setLimiteIdade($limite_idade);
        $cobertura->setMinimoFaturamento($minimo_faturamento);
        
        //Insert
        
        $cobertura->insert();
        
        echo "<script>alert(\"Cadastro efetuado com sucesso!\")</script>";
        echo "<script>window.location = \"coberturas.php\"</script>";
        
        
                
        
    endif;
    
    
    ?>
 
     
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
                <select id="id_cliente" name="id_cliente" data-rel="chosen" class="input-small">
<?php foreach ($results as $row) { ?>
        <option value="<?php echo $row['id_cliente']; ?>"><?php echo $row['id_cliente']; ?> </option>
<?php } ?>
</select>
<?php } ?>
        </td>
        </br>
        <td>


<label for="apolice" class="control-label">Apolice</label><br>
<input type="text" name="apolice" value="" id="apolice" class="input-medium"  />

        </td>
        <td>


<label for="inicio_vigencia" class="control-label">Inicio da Vigência:</label>            <br>
            <div class="input-group">
                
<input type="text" name="inicio_vigencia" id="inicio_vigencia" class="input-medium"/></div>
        </td>


        <td>	

<label for="inicio_contrato" class="control-label">Inicio de Contrato:</label>            <br>
            <div class="input-group">
                
           <input type="text" name="inicio_contrato" value="" id="inicio_contrato" class="input-medium"  />            </div>
        </td>


        <td>

            <div class="control-group">
<label for="tipo_proposta_label" class="control-label">Tipo de Proposta</label>                <br>
<select name="tipo_proposta" id="tipo_proposta" class="input-medium" data-rel="chosen">
<option value="" selected="selected">Escolha o tipo</option>
<option value="VG">VG</option>
<option value="INDIVIDUAL">INDIVIDUAL</option>
</select>                      


            </div>
        </td>
    </tr>
        <tr>
            <td colspan="5">	
        <div class="control-group">
            <label for="estipulante" class="control-label">Estipulante: </label><br>
            <div class="controls">
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
    </div>
    </div>
</table>




        <table class="form-group has-warning" >

            <tr>
                <td>	
                  <div class="control-group">
                    <label for="tipo_capital" class="control-label">Tipo de Capital</label>                    <br>
                    <select name="tipo_capital" id="tipo_capital" class="input-large"data-rel="chz">
<option value="Escolha">Escolha</option>
<option value="Escalonado">Escalonado</option>
<option value="Uniforme">Uniforme</option>
<option value="Múltiplo Salarial">Múltiplo Salarial</option>
</select>                </td>


                <td>	

                    <label for="multiplicados_tipo_capital" class="control-label">Multiplicador</label>                    <br>
                    <input type="text" name="multiplicados_tipo_capital" value="" id="multiplicados_tipo_capital" class="input-medium"  />
                </td>

                <td>	
                     <div class="control-group">
                    <label for="custeio" class="control-label">Custeio</label>                    <br>
                    <select name="custeio" id="custeio" class="input-medium"data-rel="chosen">
<option value="0">Escolha</option>
<option value="Contribut�rio">Contributário</option>
<option value="N�o Contribut�rio">Não Contributário</option>
</select>
                </td>


                <td colspan="3">	
                    <div class="control-group">
                    <label for="atividade" class="control-label">Atividade</label>                    <br>
                    <select name="atividade" id="atividade" class="input-xlarge"data-rel="chosen">
<option value="0">Escolha a atividade</option>
<option value="772"></option>
<option value="421">Acompanhante</option>
<option value="422">Açougueiro</option>
<option value="423">Acupunturista</option>
<option value="424">Adestrador de animais</option>
<option value="425">Administrador</option>
<option value="426">Administrador de banco de dados DBA</option>
<option value="427">Administrador de redes</option>
<option value="428">Administrador p�blico</option>
<option value="429">Advogado</option>
<option value="430">Aeromo�a</option>
<option value="431">Aeronauta</option>
<option value="432">Aerovi�rio</option>
<option value="433">Afiador de ferramentas</option>
<option value="434">Agente comunit�rio de sa�de</option>
<option value="435">Agente de combate � endemias</option>
<option value="436">Agente de defesa sanit�ria</option>
<option value="437">Agente de defesa sanit�ria animal</option>
<option value="438">Agente de viagens</option>
<option value="439">Agente funer�rio</option>
<option value="440">Agente penitenci�rio</option>
<option value="441">Agricultor</option>
<option value="442">Agrimensor</option>
<option value="443">Agr�nomo</option>
<option value="444">Ajudante de produ��o</option>
<option value="445">Alergologista</option>
<option value="446">Alfaiate</option>
<option value="447">Almirante</option>
<option value="448">Almoxarife</option>
<option value="449">Alpinista</option>
<option value="450">Ambientalista</option>
<option value="451">Ambulante</option>
<option value="452">Amolador de ferramentas</option>
<option value="453">Analista de sistemas</option>
<option value="454">Anestesiologista</option>
<option value="455">Angiologista</option>
<option value="456">Antrop�logo</option>
<option value="457">Apicultor</option>
<option value="458">Apontador de m�o-de-obra</option>
<option value="459">Apresentador</option>
<option value="460">�rbitro e mediador</option>
<option value="461">Argumentista</option>
<option value="462">Armador</option>
<option value="463">Armeiro</option>
<option value="464">Arque�logo</option>
<option value="465">Arquiteto</option>
<option value="466">Arquivista</option>
<option value="467">Arranjador musical</option>
<option value="468">Arrumadeira</option>
<option value="469">Artes�o</option>
<option value="470">Artista de circo</option>
<option value="471">Artista pl�stico</option>
<option value="472">Artista/T�cnico em espet�culos de divers�es</option>
<option value="473">Ascensorista</option>
<option value="474">Assessor de imprensa</option>
<option value="475">Assessor parlamentar</option>
<option value="476">Assistente administrativo</option>
<option value="477">Assistente de c�mera</option>
<option value="478">Assistente de dire��o</option>
<option value="479">Assistente de produ��o</option>
<option value="480">Assistente social</option>
<option value="481">Astrof�sico</option>
<option value="482">Astr�logo</option>
<option value="483">Astronauta</option>
<option value="484">Astr�nomo</option>
<option value="485">Atendente</option>
<option value="486">Atleta de arremesso de peso</option>
<option value="487">Atleta de canoagem</option>
<option value="488">Atleta de nado sincronizado</option>
<option value="489">Atleta de tiro com arco</option>
<option value="490">Ator</option>
<option value="491">Atu�rio</option>
<option value="492">Auditor</option>
<option value="493">Auxiliar administrativo</option>
<option value="494">Auxiliar de reprografia</option>
<option value="495">Auxiliar de servi�os gerais</option>
<option value="496">Avalista</option>
<option value="497">Aviador</option>
<option value="498">Bab�</option>
<option value="499">Babysitter</option>
<option value="500">Bailarina</option>
<option value="501">Baixista</option>
<option value="502">Balconista</option>
<option value="503">Banc�rio</option>
<option value="504">Barbeiro</option>
<option value="505">Barman</option>
<option value="506">Bartender</option>
<option value="507">Baterista</option>
<option value="508">Bedel</option>
<option value="509">Ber�arista</option>
<option value="510">Bibliotec�rio</option>
<option value="511">Biblioteconomista</option>
<option value="512">Bi�logo</option>
<option value="513">Biom�dico</option>
<option value="514">Bioqu�mico</option>
<option value="515">Biotecn�logo</option>
<option value="516">B�ia-fria</option>
<option value="517">Bombeiro</option>
<option value="518">Borracheiro</option>
<option value="519">Botic�rio</option>
<option value="520">Boxeador</option>
<option value="521">Brigadeiro</option>
<option value="522">Broker/Corretor da bolsa de valores</option>
<option value="523">Cabeleireiro</option>
<option value="524">Cabo</option>
<option value="525">Ca�a-talentos/Olheiro</option>
<option value="526">Cadeirinha</option>
<option value="527">Cadista</option>
<option value="528">Caixa</option>
<option value="529">Caldeireiro</option>
<option value="530">Cambista</option>
<option value="531">Camel�</option>
<option value="532">Cameraman</option>
<option value="533">Caminhoneiro</option>
<option value="534">Cancerologista ou Oncologista</option>
<option value="535">Cantor</option>
<option value="536">Capataz</option>
<option value="537">Capel�o</option>
<option value="538">Capit�o</option>
<option value="539">Capoeirista</option>
<option value="540">Cardiologista</option>
<option value="541">Carnavalesco</option>
<option value="542">Carpinteiro</option>
<option value="543">Cartazeiro</option>
<option value="544">Carteiro</option>
<option value="545">Cart�grafo</option>
<option value="546">Cartunista</option>
<option value="547">Catador de carangueijos</option>
<option value="548">Catador de material recicl�vel</option>
<option value="549">Cen�grafo</option>
<option value="550">Cenot�cnico</option>
<option value="551">Ceramista</option>
<option value="552">Cerimonialista</option>
<option value="553">Chapeiro</option>
<option value="554">Chargista</option>
<option value="555">Chaveiro</option>
<option value="556">Chefe de cozinha</option>
<option value="557">Ciclista</option>
<option value="558">Cientista</option>
<option value="559">Cientista da informa��o e documenta��o</option>
<option value="560">Cientista de alimentos</option>
<option value="561">Cientista pol�tico</option>
<option value="562">Cientista social</option>
<option value="563">Cineasta</option>
<option value="564">Cinegrafista</option>
<option value="565">Cinematogr�fo</option>
<option value="566">Cirurgi�o bucal</option>
<option value="567">Cirurgi�o dentista</option>
<option value="568">Clap loader</option>
<option value="569">Clarinetista</option>
<option value="570">Classificador cont�bil</option>
<option value="571">Cl�nico geral</option>
<option value="572">Co-piloto</option>
<option value="573">Coach</option>
<option value="574">Cobaia M�dica</option>
<option value="575">Cobrador de �nibus</option>
<option value="576">Cobrador de ped�gio</option>
<option value="577">Coloproctologista</option>
<option value="578">Comandante</option>
<option value="579">Comerciante</option>
<option value="580">Comiss�rio de bordo</option>
<option value="581">Compositor</option>
<option value="582">Comprador</option>
<option value="583">Confeiteiro</option>
<option value="584">Conferente de carga e descarga</option>
<option value="585">Conferente de expedi��o</option>
<option value="586">Conferente de recebimento</option>
<option value="587">Construtor</option>
<option value="588">Consultor</option>
<option value="589">Consultor de moda</option>
<option value="590">Consultor de radiestesia</option>
<option value="591">Cont�bil</option>
<option value="592">Contabilista</option>
<option value="593">Contador</option>
<option value="594">Contat�logo</option>
<option value="595">Continuista</option>
<option value="596">Contra regra</option>
<option value="597">Contramestre em transporte mar�timo</option>
<option value="598">Controlador de v�o</option>
<option value="599">Controller</option>
<option value="600">Coordenador</option>
<option value="601">Copeiro</option>
<option value="602">Core�grafo</option>
<option value="603">Coronel</option>
<option value="604">Corredor de atletismo</option>
<option value="605">Corregedor de justi�a</option>
<option value="606">Corretor da bolsa de valores</option>
<option value="607">Corretor de im�veis</option>
<option value="608">Corretor de seguros</option>
<option value="609">Cortador de cana-de-a�ucar</option>
<option value="610">Costureira</option>
<option value="611">Coveiro/Sepultador</option>
<option value="612">Cozinheira</option>
<option value="613">Cr�tico</option>
<option value="614">Cumim</option>
<option value="615">Dan�arino</option>
<option value="616">Datil�grafo</option>
<option value="617">Dedetizador</option>
<option value="618">Defensor P�blico</option>
<option value="619">Degustador</option>
<option value="620">Delegado</option>
<option value="621">Dentista</option>
<option value="622">Deputado</option>
<option value="623">Dermatologista</option>
<option value="624">Desembargador de justi�a</option>
<option value="625">Desenhista</option>
<option value="626">Designer de interiores</option>
<option value="627">Designer de j�ia</option>
<option value="628">Designer de moda</option>
<option value="629">Designer de produto ou desenhista industrial</option>
<option value="630">Designer gr�fico</option>
<option value="631">Despachante</option>
<option value="632">Diagramador</option>
<option value="633">Dialoguista</option>
<option value="634">Diarista</option>
<option value="635">Digitador</option>
<option value="636">Diplomata</option>
<option value="637">Diretor de cinema</option>
<option value="638">Diretor de fotografia</option>
<option value="639">Diretor de produ��o</option>
<option value="640">DJ</option>
<option value="641">Dogueiro</option>
<option value="642">Dublador</option>
<option value="643">Dubl�</option>
<option value="644">Ec�logo</option>
<option value="645">Economista</option>
<option value="646">Economista dom�stico</option>
<option value="647">Editor</option>
<option value="648">Editor de mesa de corte</option>
<option value="649">Educador</option>
<option value="650">Educador integrado � sa�de p�blica</option>
<option value="651">Eletricista</option>
<option value="652">Eletricista de autom�veis</option>
<option value="653">Embaixador</option>
<option value="654">Embalador</option>
<option value="655">Embalsamador</option>
<option value="656">Empacotador</option>
<option value="657">Empregado dom�stico</option>
<option value="658">Empres�rio</option>
<option value="659">Encanador</option>
<option value="660">Encarregado de manuten��o predial</option>
<option value="661">Endocrinologista</option>
<option value="662">Endodontista</option>
<option value="663">Enfermeiro</option>
<option value="664">Engenheiro ac�stico</option>
<option value="665">Engenheiro aeron�utico</option>
<option value="666">Engenheiro agr�cola</option>
<option value="667">Engenheiro agrimensor</option>
<option value="771">Engenheiro agr�nomo</option>
<option value="669">Engenheiro ambiental</option>
<option value="670">Engenheiro cartogr�fico</option>
<option value="671">Engenheiro civil</option>
<option value="672">Engenheiro de alimentos</option>
<option value="673">Engenheiro de aquicultura</option>
<option value="674">Engenheiro de computa��o</option>
<option value="675">Engenheiro de controle e automa��o</option>
<option value="676">Engenheiro de energia</option>
<option value="677">Engenheiro de ergonomia</option>
<option value="678">Engenheiro de horticultura</option>
<option value="679">Engenheiro de ilumina��o</option>
<option value="680">Engenheiro de manufatura</option>
<option value="681">Engenheiro de materiais</option>
<option value="682">Engenheiro de minas</option>
<option value="683">Engenheiro de petr�leo</option>
<option value="684">Engenheiro de processos</option>
<option value="685">Engenheiro de produ��o agroindustrial</option>
<option value="686">Engenheiro de produto ou produ��o</option>
<option value="687">Engenheiro de projetos</option>
<option value="688">Engenheiro de seguran�a do trabalho</option>
<option value="689">Engenheiro de som</option>
<option value="690">Engenheiro de supply chain ou log�stica</option>
<option value="691">Engenheiro de telecomunica��es</option>
<option value="692">Engenheiro de transportes</option>
<option value="693">Engenheiro el�trico</option>
<option value="694">Engenheiro f�sico</option>
<option value="695">Engenheiro florestal</option>
<option value="696">Engenheiro industrial</option>
<option value="697">Engenheiro mec�nico</option>
<option value="698">Engenheiro mecatr�nico</option>
<option value="699">Engenheiro metal�rgico</option>
<option value="700">Engenheiro naval</option>
<option value="701">Engenheiro petroqu�mico</option>
<option value="702">Engenheiro qu�mico</option>
<option value="703">Engenheiro sanitarista</option>
<option value="704">Engenheiro t�xtil</option>
<option value="705">Engraxate</option>
<option value="706">En�logo</option>
<option value="707">Entalhador</option>
<option value="708">Epidemi�logo</option>
<option value="709">Escoteiro</option>
<option value="710">Escritor</option>
<option value="711">Escritur�rio</option>
<option value="712">Escriv�o</option>
<option value="713">Escultor</option>
<option value="714">Esgrimista</option>
<option value="715">Especialista em agroneg�cios</option>
<option value="716">Espeleologista</option>
<option value="717">Estampador de tecidos</option>
<option value="718">Estat�stico</option>
<option value="719">Esteticista</option>
<option value="720">Estilista</option>
<option value="721">Estivador</option>
<option value="722">Estofador</option>
<option value="723">Estoquista</option>
<option value="724">Farmac�utico</option>
<option value="725">Faturista</option>
<option value="726">Faxineiro</option>
<option value="727">Feirante</option>
<option value="728">Ferramenteiro</option>
<option value="729">Ferreiro</option>
<option value="730">Ferrovi�rio</option>
<option value="731">Figurante</option>
<option value="732">Figurinista</option>
<option value="733">Fil�sofo</option>
<option value="734">Fiscal</option>
<option value="735">F�sico</option>
<option value="736">F�sico nuclear</option>
<option value="737">Fisiculturista</option>
<option value="738">Fisioterapeuta</option>
<option value="739">Flanelinha</option>
<option value="740">Flautista</option>
<option value="741">Florista</option>
<option value="742">Fonoaudi�logo</option>
<option value="743">Forneiro</option>
<option value="744">Fot�grafo</option>
<option value="745">Frentista</option>
<option value="746">Fresador</option>
<option value="747">Fundidor</option>
<option value="748">Fundidor de placa de gesso</option>
<option value="749">Funileiro</option>
<option value="750">Gagsman</option>
<option value="751">Gandula</option>
<option value="752">Gar�om</option>
<option value="753">Gari</option>
<option value="754">Garimpeiro</option>
<option value="755">Gastroenterologista</option>
<option value="756">Gastr�nomo</option>
<option value="757">General</option>
<option value="758">Geof�sico</option>
<option value="759">Ge�grafo</option>
<option value="760">Ge�logo</option>
<option value="761">Geradorista</option>
<option value="762">Gerente de banco</option>
<option value="763">Gerente de inova��es ou novos neg�cios</option>
<option value="764">Gerente de riscos em seguros</option>
<option value="765">Gerente de vendas</option>
<option value="766">Geriatra</option>
<option value="767">Gestor ambiental</option>
<option value="768">Gestor de qualidade</option>
<option value="769">Gestor de recursos humanos</option>
<option value="770">Gestor de tecnologia da informa��o</option>
<option value="3">Gestor p�blico</option>
<option value="4">Ginasta art�stica</option>
<option value="5">Ginasta r�tmica</option>
<option value="6">Ginecologista</option>
<option value="7">Gourmet</option>
<option value="8">Governador</option>
<option value="9">Governanta</option>
<option value="10">Grafologista</option>
<option value="11">Gravurista</option>
<option value="12">Guarda ou policial rodovi�rio</option>
<option value="13">Guarda roupeiro</option>
<option value="14">Guardador de ve�culos</option>
<option value="15">Guia turistico</option>
<option value="16">Guincheiro</option>
<option value="17">Guitarrista</option>
<option value="18">Harpista</option>
<option value="19">Headhunter</option>
<option value="20">Hematologista</option>
<option value="21">Historiador</option>
<option value="22">Homeopata</option>
<option value="23">Hostess</option>
<option value="24">Ilustrador</option>
<option value="25">Implantodontista</option>
<option value="26">Impressor</option>
<option value="27">Imunologista</option>
<option value="28">Infectologista</option>
<option value="29">Inspetor</option>
<option value="30">Instalador de linha telef�nica</option>
<option value="31">Instalador de pain�is</option>
<option value="32">Instrumentador cir�rgico</option>
<option value="33">Instrumentista musical</option>
<option value="34">Instrutor</option>
<option value="35">Int�rprete</option>
<option value="36">Int�rprete de B�blias</option>
<option value="37">Int�rprete e tradutor de l�ngua de sinais</option>
<option value="38">Investigador de Pol�cia</option>
<option value="39">Investigador particular</option>
<option value="40">Jangadeiro</option>
<option value="41">Jardineiro</option>
<option value="42">Jogador de badminton</option>
<option value="43">Jogador de basquete</option>
<option value="44">Jogador de bocha</option>
<option value="45">Jogador de boliche</option>
<option value="46">Jogador de futebol</option>
<option value="47">Jogador de golfe</option>
<option value="48">Jogador de handebol</option>
<option value="49">Jogador de h�quei</option>
<option value="50">Jogador de t�nis de mesa</option>
<option value="51">Jogador de v�lei</option>
<option value="52">J�quei</option>
<option value="53">Jornaleiro</option>
<option value="54">Jornalista</option>
<option value="55">Judoca</option>
<option value="56">Juiz de direito</option>
<option value="57">Juiz de futebol</option>
<option value="58">Juiz ou �rbitro de futebol</option>
<option value="59">Karateca</option>
<option value="60">Kite-surfer</option>
<option value="61">Laboratorista</option>
<option value="62">Lactarista hospitalar</option>
<option value="63">Lamboteiro</option>
<option value="64">Lancheiro</option>
<option value="65">Lanterneiro</option>
<option value="66">Lapid�rio</option>
<option value="67">Lavador</option>
<option value="68">Lavador de ve�culos</option>
<option value="69">Le�o de ch�cara</option>
<option value="70">Leiloeiro</option>
<option value="71">Leiteiro</option>
<option value="72">Lenhador</option>
<option value="73">Letrista</option>
<option value="74">Levantador de peso</option>
<option value="75">L�der comunit�rio</option>
<option value="76">Limpador de vidros</option>
<option value="77">Lixeiro/Coletor de lixo</option>
<option value="78">Locutor</option>
<option value="79">Lubrificador de m�quinas</option>
<option value="80">Lutador de jiu-jitsu</option>
<option value="81">Lutador de karat�</option>
<option value="82">Lutador de kung fu</option>
<option value="83">Lutador de luta livre</option>
<option value="84">Lutador de taekwondo</option>
<option value="85">Luthier</option>
<option value="86">M�e social</option>
<option value="87">Maestro</option>
<option value="88">M�gico</option>
<option value="89">Maitre</option>
<option value="90">Major</option>
<option value="91">Manicure</option>
<option value="92">Manobrista</option>
<option value="93">Maquiador</option>
<option value="94">Maquinista</option>
<option value="95">Marcador de luz</option>
<option value="96">Marceneiro</option>
<option value="97">Marechal</option>
<option value="98">Marinheiro</option>
<option value="99">Marketeiro</option>
<option value="100">Massagista</option>
<option value="101">Massoterapeuta</option>
<option value="102">Matem�tico</option>
<option value="103">Mec�nico</option>
<option value="104">Mec�nico de v�o</option>
<option value="105">Mecan�grafo</option>
<option value="106">M�dico</option>
<option value="111">M�dico cardiologista</option>
<option value="107">M�dico cirurgi�o</option>
<option value="113">M�dico clinico</option>
<option value="115">M�dico do trabalho</option>
<option value="108">M�dico geneticista</option>
<option value="109">M�dico legista</option>
<option value="110">M�dico nuclear</option>
<option value="114">M�dico oftalmologista</option>
<option value="112">M�dico pediatra</option>
<option value="116">Meeiro</option>
<option value="117">Mensageiro</option>
<option value="118">Meredeira</option>
<option value="119">Mergulhador</option>
<option value="120">Mestre cervejeiro</option>
<option value="121">Mestre-de-obras</option>
<option value="122">Metal�rgico</option>
<option value="123">Meteorologista</option>
<option value="124">Microfonista</option>
<option value="125">Militar da Aeron�utica</option>
<option value="126">Militar da Marinha</option>
<option value="127">Militar do Ex�rcito</option>
<option value="128">Ministro</option>
<option value="129">Modelista</option>
<option value="130">Modelo</option>
<option value="131">Moldador</option>
<option value="132">Moldureiro</option>
<option value="133">Moleiro</option>
<option value="134">Montador</option>
<option value="135">Montador de negativos</option>
<option value="136">Motofrete</option>
<option value="137">Motorista</option>
<option value="138">Mototaxista</option>
<option value="139">Muse�logo</option>
<option value="140">M�sico</option>
<option value="141">Musicoterapeuta</option>
<option value="142">Nadador</option>
<option value="143">Natur�logo</option>
<option value="144">Navegador</option>
<option value="145">Necromaquiador</option>
<option value="146">Nefrologista</option>
<option value="147">Neonatologista</option>
<option value="148">Neurocirurgi�o</option>
<option value="149">Neurologista</option>
<option value="150">Not�rio</option>
<option value="151">Numer�logo</option>
<option value="152">Nutricionista</option>
<option value="153">Nutrologista</option>
<option value="154">Obstetra</option>
<option value="155">Ocean�grafo</option>
<option value="156">Oculista</option>
<option value="157">Odontologista est�tico</option>
<option value="158">Odontologista legal</option>
<option value="159">Odontologista preventivo e social</option>
<option value="160">Odontopediatra</option>
<option value="161">Office-boy</option>
<option value="162">Oficial de justi�a</option>
<option value="163">Oftalmologista</option>
<option value="164">Ombudsman</option>
<option value="165">Operador de bombas</option>
<option value="166">Operador de telemarketing</option>
<option value="167">Operador de v�deo</option>
<option value="168">Optometrista</option>
<option value="169">Or�amentista</option>
<option value="170">Orientador educacional</option>
<option value="171">Ortesista</option>
<option value="172">Ortodontista</option>
<option value="173">Ortopedista</option>
<option value="174">Ortoptista</option>
<option value="175">Otorrinolaringologista</option>
<option value="176">Ourives</option>
<option value="177">Paginador</option>
<option value="178">Paisagista</option>
<option value="179">Panfleteiro</option>
<option value="180">Panificador/Padeiro</option>
<option value="181">Paparazzo</option>
<option value="182">Papiloscopista</option>
<option value="183">P�ra-quedista</option>
<option value="184">Param�dico</option>
<option value="185">Parteira tradicional</option>
<option value="186">Passador</option>
<option value="187">Pastilheiro</option>
<option value="188">Patinador</option>
<option value="189">Patologista</option>
<option value="190">Patologista oral</option>
<option value="191">Pe�o de rodeiro</option>
<option value="192">Pecuarista</option>
<option value="193">Pedagogo</option>
<option value="194">Pediatra</option>
<option value="195">Pedicure</option>
<option value="196">Pedreiro</option>
<option value="197">Peixeiro</option>
<option value="198">Penhorista</option>
<option value="199">Percursionista</option>
<option value="200">Perfumista</option>
<option value="201">Perfusionista</option>
<option value="202">Perito criminal</option>
<option value="203">Perito judicial</option>
<option value="204">Personal stylist</option>
<option value="205">Personal trainer</option>
<option value="206">Pescador</option>
<option value="207">Pesquisador</option>
<option value="208">Petroleiro</option>
<option value="209">Pianista</option>
<option value="210">Piloto automobil�stico</option>
<option value="211">Piloto de avi�o</option>
<option value="212">Pintor</option>
<option value="213">Pizzaiolo</option>
<option value="214">Plastimodelista</option>
<option value="215">Pneumologista</option>
<option value="216">Pod�logo</option>
<option value="217">Policial civil</option>
<option value="218">Policial federal</option>
<option value="219">Policial militar</option>
<option value="220">Polidor de produ��o</option>
<option value="221">Pol�tico</option>
<option value="222">Porteiro</option>
<option value="223">Portu�rio</option>
<option value="224">Pr�tico</option>
<option value="225">Prefeito</option>
<option value="226">Prensista</option>
<option value="227">Preparador de m�quinas</option>
<option value="228">Presidente da Rep�blica</option>
<option value="229">Procurador de justi�a</option>
<option value="230">Produtor de audio visual</option>
<option value="231">Produtor de eventos</option>
<option value="232">Produtor de multim�dia</option>
<option value="233">Produtor editorial</option>
<option value="234">Produtor fonogr�fico</option>
<option value="235">Produtor musical</option>
<option value="236">Professor</option>
<option value="237">Profissional de �udio</option>
<option value="238">Profissional de cinema</option>
<option value="239">Profissional de com�rcio exterior</option>
<option value="240">Profissional de educa��o f�sica</option>
<option value="241">Profissional de efeitos especiais</option>
<option value="242">Profissional de hotelaria</option>
<option value="243">Profissional de inform�tica</option>
<option value="244">Profissional de lingu�stica</option>
<option value="245">Profissional de log�stica</option>
<option value="246">Profissional de manuten��o industrial</option>
<option value="247">Profissional de marketing</option>
<option value="248">Profissional de r�dio e tv</option>
<option value="249">Profissional de reciclagem</option>
<option value="250">Profissional de recursos humanos</option>
<option value="251">Profissional de relacionamento com investidores RI</option>
<option value="252">Profissional de rela��es internacionais</option>
<option value="253">Profissional de rela��es p�blicas</option>
<option value="254">Profissional de tecnologia de latic�nios</option>
<option value="255">Programador</option>
<option value="260">Programador .NET</option>
<option value="261">Programador ASP</option>
<option value="259">Programador C#</option>
<option value="267">Programador C++</option>
<option value="266">Programador Cobol</option>
<option value="256">Programador de Computador</option>
<option value="265">Programador HTML 5</option>
<option value="258">Programador Java</option>
<option value="263">Programador Pascal - Delphi</option>
<option value="262">Programador VB</option>
<option value="264">ProgramadorJavascript</option>
<option value="257">ProgramadorPHP</option>
<option value="268">Projetista mec�nico</option>
<option value="269">Promotor de eventos</option>
<option value="270">Promotor de vendas</option>
<option value="271">Promotor p�blico/de justi�a</option>
<option value="272">Protesista</option>
<option value="273">Prot�tico dent�rio</option>
<option value="274">Psic�logo</option>
<option value="275">Psicomotricista</option>
<option value="276">Psicopedagogo</option>
<option value="277">Psiquiatra</option>
<option value="278">Publicit�rio</option>
<option value="279">Quadrinista</option>
<option value="280">Qu�mico</option>
<option value="281">Qu�mico farmac�utico</option>
<option value="282">Quiropraxista</option>
<option value="283">Quitandeiro</option>
<option value="284">Radialista</option>
<option value="285">Radialista programador</option>
<option value="286">Radiologista</option>
<option value="287">Radiooperador de v�o</option>
<option value="288">Radioterap�utico</option>
<option value="289">Rebarbador de metal</option>
<option value="290">Recepcionista</option>
<option value="291">Recreador</option>
<option value="292">Redator</option>
<option value="293">Regente</option>
<option value="294">Rela��es p�blicas</option>
<option value="295">Remador</option>
<option value="296">Rep�rter</option>
<option value="297">Repositor</option>
<option value="298">Representante comercial</option>
<option value="299">Restaurador</option>
<option value="300">Retificador</option>
<option value="301">Reumatologista</option>
<option value="302">Revendedor</option>
<option value="303">Revisor</option>
<option value="304">Roteirista</option>
<option value="305">Sacoleira</option>
<option value="306">Salgadeira</option>
<option value="307">Salva-vidas</option>
<option value="308">Sapateiro</option>
<option value="309">Sargento</option>
<option value="310">Saxofonista</option>
<option value="311">Secret�ria</option>
<option value="312">Seguidor de compras</option>
<option value="313">Seguran�a particular</option>
<option value="314">Selecionador de pessoal</option>
<option value="315">Senador</option>
<option value="316">Separador</option>
<option value="317">Seringueiro</option>
<option value="318">Serralheiro</option>
<option value="319">Servente-de-obras</option>
<option value="320">Serventu�rio</option>
<option value="321">Sex�logo</option>
<option value="322">S�ndico</option>
<option value="323">Skatista</option>
<option value="324">Soci�logo</option>
<option value="325">Soldado</option>
<option value="326">Soldador</option>
<option value="327">Somelier</option>
<option value="328">Sonoplasta</option>
<option value="329">Subprefeito</option>
<option value="330">Supervisor</option>
<option value="331">Surfista</option>
<option value="332">Sushiman</option>
<option value="333">Tabeli�o</option>
<option value="334">Taifeiro</option>
<option value="335">Tapeceiro</option>
<option value="336">Tatuador</option>
<option value="337">Taxidermista/Embalsamador</option>
<option value="338">Taxista</option>
<option value="339">Tecel�o</option>
<option value="340">T�cnico de gesso</option>
<option value="341">T�cnico de som</option>
<option value="342">T�cnico em agropecu�ria</option>
<option value="343">T�cnico em arquivo</option>
<option value="344">T�cnico em avia��o</option>
<option value="345">T�cnico em desporto</option>
<option value="346">T�cnico em documenta��o</option>
<option value="347">T�cnico em edifica��es</option>
<option value="348">T�cnico em hardware</option>
<option value="349">T�cnico em higiene dent�ria</option>
<option value="350">T�cnico em �ptica</option>
<option value="351">T�cnico em radiologia</option>
<option value="352">T�cnico em rede</option>
<option value="353">T�cnico em seguran�a do trabalho</option>
<option value="354">T�cnico em taquigrafia</option>
<option value="355">T�cnico em tratamento de �gua</option>
<option value="356">T�cnico tributarista</option>
<option value="357">Tecn�logo em automa��o industrial</option>
<option value="358">Tecn�logo em Ci�ncias das plantas medicinais</option>
<option value="359">Tecn�logo em desenvolvimento social</option>
<option value="360">Tecn�logo em esporte e lazer</option>
<option value="361">Tecn�logo em geoprocessamento</option>
<option value="362">Tecn�logo em irriga��o e drenagem</option>
<option value="363">Tecn�logo em jogos digitais</option>
<option value="364">Tecn�logo em navega��o fluvial</option>
<option value="365">Tecn�logo em neg�cios imobili�rios</option>
<option value="366">Tecn�logo em papel e celulose</option>
<option value="367">Tecn�logo em processos qu�micos</option>
<option value="368">Tecn�logo em produ��o de bebidas</option>
<option value="369">Tecn�logo em produ��o moveleira</option>
<option value="370">Tecn�logo em produ��o Sucroalcooleira</option>
<option value="371">Tecn�logo em recursos pesqueiros</option>
<option value="372">Tecn�logo em rochas ornamentais</option>
<option value="375">Tecn�logo em silvicultura</option>
<option value="373">Tecn�logo em sistemas da informa��o</option>
<option value="374">Tecn�logo em sistemas para internet</option>
<option value="376">Tecn�logo em tecnologia da madeira</option>
<option value="377">Telefonista</option>
<option value="378">Telegrafista</option>
<option value="379">Tenente</option>
<option value="380">Tenista</option>
<option value="381">Teólogo</option>
<option value="382">Terapeuta floral</option>
<option value="383">Terapeuta Holóstico</option>
<option value="384">Terapeuta ocupacional</option>
<option value="385">Tesoureiro</option>
<option value="386">Timoneiro</option>
<option value="387">Tintureiro</option>
<option value="388">Topógrafo</option>
<option value="389">Torneiro mec�nico</option>
<option value="390">Torreiro/Torrista</option>
<option value="391">Tosador</option>
<option value="392">Toxicologista</option>
<option value="393">Tradutor</option>
<option value="394">Transcritor</option>
<option value="395">Transportador</option>
<option value="396">Traumatologista</option>
<option value="397">Treinador</option>
<option value="398">Triatleta</option>
<option value="399">Trilheiro ou músico de cinema</option>
<option value="400">Trompetista</option>
<option value="401">Turismólogo</option>
<option value="402">Ufólogo</option>
<option value="403">Urbanista</option>
<option value="404">Urologista</option>
<option value="405">Velejador</option>
<option value="406">Vendedor</option>
<option value="407">Ventríloquo</option>
<option value="408">Vereador</option>
<option value="409">Veterinário</option>
<option value="410">Vigia parlamentar</option>
<option value="411">Vigilante noturno/diurno</option>
<option value="412">Violonista</option>
<option value="413">Vistoriador de sinistros</option>
<option value="414">Viveirista</option>
<option value="415">Webdesigner</option>
<option value="416">Webmaster</option>
<option value="417">Windsurfer</option>
<option value="418">Xilógrafo</option>
<option value="419">Zelador</option>
<option value="420">Zootecnista</option>
</select>                </td>
            </tr>


            <tr>
                <td>	
                    <div class="control-group">
                    <label for="capital" class="control-label">Capital</label>                    <br>
                    <input type="text" name="capital" value="" id="capital" onblur="multiplica()" class="input-large" onKeyPress="return(MascaraMoeda(this,'.',',',event))" />
					</td>


                <td>	
                 <div class="control-group">
                    <label for="multiplicador_capital" class="control-label">Tabela</label>                    <br>
                    <select name="tabela" id="tabela" class="input-medium"data-rel="chosen">
<option value="0">Escolha</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
</select>
                </td>

                <td>	
<div class="control-group">
                    <label for="capital_segurado_min" class="control-label">Capital Min</label>                    <br>
                    <input class="input-medium" id="capital_segurado_min" name="capital_segurado_min" type="text" onKeyPress="return(MascaraMoeda(this,'.',',',event))">
                </td>

                <td>	
<div class="control-group">
                    <label for="apolice" class="control-label">Capital Máx</label>                    <br>
                    <input class="input-medium" id="capital_segurado_max" name="capital_segurado_max" type="text" onKeyPress="return(MascaraMoeda(this,'.',',',event))">
                </td>
                <td>	
<div class="control-group">
                    <label for="porcentagem_estipulante" class="control-label">% Estipulante:</label>                    <br>
                    <select name="porcentagem_estipulante" id="porcentagem_estipulante" class="input-small"data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>
                </td>
                <td>	
<div class="control-group">
                    <label for="porcentagem_segurado" class="control-label">% Segurado:</label>                    <br>
                    <select name="porcentagem_segurado" id="porcentagem_segurado" class="input-small"data-rel="chz">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>
                </td>
            </tr>
            <hr>
        </table>
           
	    <table class="form-group has-warning" style='width:100%' >


            <tr>
                <td valign='top'> 
                    <div class="box span12">
    <div class="box-header well" data-original-title>
    <h2><i class="icon-edit"></i>Coberturas e Capitais</h2>
    </div>
                    <table class="form-group has-warning" >

                        <tr>
                            <td>
                                <label for="apolice" class="control-label">&nbsp;</label>                        
                            </td>
                            <td> 
                                <label for="apolice" class="control-label">&nbsp;</label>         
                            </td>
                            <td> 
                                %
                            </td>	
                        </tr>


                        <tr>
                            <td>
                                <label for="morte" class="control-label">Morte</label>                        
                            </td>
                            <td> 
							
                                <input type="text" name="morte_campo" value="" id="morte_campo" class="input-medium" onKeyPress="return(MascaraMoeda(this,'.',',',event))"  /> 
								</td>
                            <td> 
                                <select name="morte" value="" id="morte" class="input-small" data-rel="chosen"  /> 
                                <option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>              
								</td>	
                        </tr>
                        <tr>
                            <td>

                                <label for="morte_acidental" class="control-label">Morte Acidental</label>                        
                            </td>
                            <td> 
                                <input type="text" name="morte_acidental_c" value="" id="morte_acidental_c" class="input-medium" onKeyPress="return(MascaraMoeda(this,'.',',',event))"  />                            </td>
                            <td> 
                                <select name= "morte_acidental" id="morte_acidental" class="input-small" data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>                            </td>	
                        </tr>

                        <tr>
                            <td>
                                <label for="ipa" class="control-label">IPA</label>                        
                            </td>
                            <td> 
                                <input type="text" name="ipa_c" value="" id="ipa_c" class="input-medium" onKeyPress="return(MascaraMoeda(this,'.',',',event))"/>                            </td>
                            <td> 
                                <select name="ipa" id="ipa" class="input-small" data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>                            </td>	
                        </tr>

                        <tr>
                            <td>
                                <label for="ifpd" class="control-label">IFPD</label>                        
                            </td>
                            <td> 
                                <input type="text" name="ifpd_c" value="" id="ifpd_c" class="input-medium" onKeyPress="return(MascaraMoeda(this,'.',',',event))" />                            </td>
                            <td> 
                                <select name="ifpd" id="ifpd" class="input-small" data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>                            </td>	
                        </tr>

                        <tr>
                            <td>
                                <label for="dmh" class="control-label">DMH</label>                        
                            </td>
                            <td> 
                                <input type="text" name="dmh_c" value="" id="dmh_c" class="input-medium" onKeyPress="return(MascaraMoeda(this,'.',',',event))" />                            </td>
                            <td> 
                                <select name="dmh" id="dmh" class="input-small" data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>                            </td>	
                        </tr>

                        <tr>
                            <td>
                                <label for="recisao_trabalhista" class="control-label">Recisão Trabalhista</label>                        
                            </td>
                            <td> 
                                <input type="text" name="recisao_trabalhista_c" value="" id="recisao_trabalhista_c" class="input-medium" onKeyPress="return(MascaraMoeda(this,'.',',',event))"  />                            </td>
                            <td> 
                                <select name="recisao_trabalhista" id="recisao_trabalhista" class=" input-small" data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>                            </td>	
                        </tr>

                        <tr>
                            <td>
                                <label for="assistencia_funeral" class="control-label">Assistência funeral</label>                        
                            </td>
                            <td> 
                                <select name="assistencia_funeral" id="assistencia_funeral" class="input-medium" data-rel="chosen">
<option value="0">Escolha</option>
<option value="1000">1000</option>
<option value="1500">1500</option>
<option value="2000">2000</option>
<option value="2500">2500</option>
<option value="3000">3000</option>
<option value="3500">3500</option>
<option value="4000">4000</option>
<option value="4500">4500</option>
<option value="5000">5000</option>
</select>                            </td>
                            <td> 
                                Quantidade de Meses
                            </td>	
                        </tr>

                        <tr>
                            <td>
                                <label for="cesta_natalina" class="control-label">Cesta Natalina</label>                        
                            </td>
                            <td> 
                                <input type="text" name="cesta_natalina_c" value="" id="cesta_natalina_c" class="input-medium" onKeyPress="return(MascaraMoeda(this,'.',',',event))"  />                            </td>
                            <td> 
                                <select name="cesta_natalina" id="cesta_natalina" class=" input-small" data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>                            </td>	
                        </tr>

                        <tr>
                            <td>
                                <label for="cesta_basica" class="control-label">Cesta básica</label>                        
                            </td>
                            <td> 
                                <input type="text" name="cesta_basica_c" value="" id="cesta_basica_c" class="input-medium" onKeyPress="return(MascaraMoeda(this,'.',',',event))"  />                            </td>
                            <td> 
                                <select name="cesta_basica" id="cesta_basica" class="input-small" data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>                            </td>	
                        </tr>
                    </table>

                </td>
             
                <td valign='top'>
                    <div class="box span12">
                    <div class="box-header well" data-original-title>
                    <h2><i class="icon-edit"></i>Coberturas - Conjugue</h2>
                    </div>
                <table class="control-group has-warning" >


                        <tr>
                            <td>
                                &nbsp;              
                            </td>
                            <td> 
                                &nbsp; 
                            <td> 
                                %
                            </td>	
                        </tr>

                        <tr>
			<div class="checkbox">			
                                                       
                            <td> 
                                
                                <label for="conjugue_morte_c" class="control-label" ><input type="checkbox" value="1" name="conjugue_morte_c" id="conjugue_morte_c" style="width:20px; height:20px;" class="chz">Conjugue Morte</label>         
                            </td>
                            
                            <td> 
                                <select name="conjugue_morte" id="conjugue_morte" class="input-small" data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>                            </td>	
                        </tr>

                        <tr>
                            
                            <td> 
                                <label for="conjugue_morte_acidental_c" class="control-label" ><input type="checkbox" value="1" name="conjugue_morte_acidental_c" id="conjugue_morte_acidental_c" style="width:20px; height:20px;" class="chz">Conjugue Morte Acidental</label>                  
                            </td>
                            <td> 
                                <select name="conjugue_morte_acidental" id="conjugue_morte_acidental" class="input-small" data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>                            </td>	
                        </tr>

                        <tr>
                            
                            <td> 
                                <label for="conjugue_ipa_c" class="control-label" ><input type="checkbox" value="1" name="conjugue_ipa_c" id="conjugue_ipa_c" style="width:20px; height:20px;" class="chz">Conjugue IPA</label>                  
                            </td>
                            <td> 
                                <select name="conjugue_ipa" id="conjugue_ipa" class="input-small" data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>                            </td>	
                        </tr>

                        <tr>
                            
                            <td> 
                                <label for="conjugue_assistencia_funeral_c" class="control-label" ><input type="checkbox" value="1" name="conjugue_assistencia_funeral_c" id="conjugue_assistencia_funeral_c" style="width:20px; height:20px;" class="chz">Conjugue Assistência Funeral</label>                                     </td>
                            <td> 
                                <select name="conjugue_assistencia_funeral" id="conjugue_assistencia_funeral" class="input-small"data-rel="chosen">
<option value="0">Escolha</option>
<option value="1000">1000</option>
<option value="1500">1500</option>
<option value="2000">2000</option>
<option value="2500">2500</option>
<option value="3000">3000</option>
<option value="3500">3500</option>
<option value="4000">4000</option>
<option value="4500">4500</option>
<option value="5000">5000</option>
</select>     
                       </td>	
                        </tr>

                    </table>
<tr>
                <div class="control-group">
                <td valign='top'>

                    <div class="box span12">
                    <div class="box-header well" data-original-title>
                    <h2><i class="icon-edit"></i>Coberturas - Filhos</h2>
                    </div>
                    <table class="form-group has-warning" >

                        <tr>
                            <td>
                                &nbsp;              
                            </td>
                            <td> 
                                &nbsp; 
                            <td> 
                                %
                            </td>	
                        </tr>

                        <tr>
                            
                            <td> 
                                <label for="doenca_congenita_filho" class="control-label" ><input type="checkbox" value="1" name="doenca_congenita_filho_c" id="doenca_congenita_filho_c" style="width:20px; height:20px;" class="chz">Doença Congênita de Filhos</label>                 
                            </td>
                            <td> 
                                <select name="doenca_congenita_filho" id="doenca_congenita_filho" class="input-small"data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>                            </td>	
                        </tr>

                        <tr>
                            
                            <td> 
                                <label for="morte_filho_c" class="control-label" ><input type="checkbox" value="1" name="morte_filho_c" id="morte_filho_c" style="width:20px; height:20px;" class="chz">Filhos - Morte</label>                  
                            </td>
                            <td> 
                                <select name="morte_filho" id="morte_filho" class="input-small"data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>                            </td>	
                        </tr>

                        <tr>
                            
                            <td> 
                                <label for="assistencia_funeral_filho_c" class="control-label" ><input type="checkbox" value="1" name="assistencia_funeral_filho_c" id="assistencia_funeral_filho_c" style="width:20px; height:20px;" class="chz">Filhos - Assistência Funeral</label>                  
                            </td>
                            <td> 
                                <select name="assistencia_funeral_filho" id="assistencia_funeral_filho" class="input-small"data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>                            </td>	
                        </tr>



                    </table>

                </td>

                <td valign='top'>

                    <div class="box span12">
                    <div class="box-header well" data-original-title>
                    <h2><i class="icon-edit"></i>Assistência Viagem</h2>
                    </div>

                    <table class="form-group has-warning" >
                        <tr>
                            
                            <td> 
                                <label for="assist_viagem_nacional_c" class="control-label" ><input type="radio" value="opcao1" name="assist_viagem_nacional_c" id="assist_viagem_nacional_c" style="width:20px; height:20px;" class="chz">Nacional</label>                  
                            </td>

                        </tr>
                        <tr>
                            
                            <td> 
                                <label for="assist_viagem_internacional_c" class="control-label" ><input type="radio" value="opcao2" name="assist_viagem_internacional_c" id="assist_viagem_internacional_c" style="width:20px; height:20px;" class="chz">Internacional</label>                  
                            </td>



                        </tr>


                        <tr>
                            <td> 
                                <label for="despesa_extra" class="control-label">Despesa extra</label>         
                            </td>
                            <td> 
                                <select name="despesa_extra" id="despesa_extra" class="input-small"data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select>  
    </td>	
    </tr>
        <tr>
        <td> 
        <label for="despesa_mensal" class="control-label">Despesa Mensal</label>         
        </td>
        <td> 
<select name="sorteio_mensal" id="sorteio_mensal" class="input-small"data-rel="chosen">
<option value="0">Escolha</option>
<option value="5">5%</option>
<option value="10">10%</option>
<option value="15">15%</option>
<option value="20">20%</option>
<option value="25">25%</option>
<option value="30">30%</option>
<option value="35">35%</option>
<option value="40">40%</option>
<option value="45">45%</option>
<option value="50">50%</option>
<option value="55">55%</option>
<option value="60">60%</option>
<option value="65">65%</option>
<option value="70">70%</option>
<option value="75">75%</option>
<option value="80">80%</option>
<option value="85">85%</option>
<option value="90">90%</option>
<option value="95">95%</option>
<option value="100">100%</option>
</select> 
    </td>	
    </tr>
    </table>
					 

                    
<input type='hidden' name='id_cliente' value=''><input type='hidden' name='apolice' value=''><input type='hidden' name='inicio_vigencia' value=''><input type='hidden' name='inicio_contrato' value=''><input type='hidden' name='tipo_proposta' value=''><input type='hidden' name='estipulante' value=''><input type='hidden' name='cnpj_cpf' value=''><input type='hidden' name='matriz_filial' value='0'><input type='hidden' name='razao_social_filial' value=''><input type='hidden' name='cnpj_cpf_filial' value=''><input type='hidden' name='telefone_filial' value=''><input type='hidden' name='cep' value=''><input type='hidden' name='endereco' value=''><input type='hidden' name='numero' value=''><input type='hidden' name='complemento' value=''><input type='hidden' name='bairro' value=''><input type='hidden' name='cidade' value=''><input type='hidden' name='estado' value='0'><input type='hidden' name='telefone_1' value=''><input type='hidden' name='telefone_2' value=''><input type='hidden' name='fax' value=''><input type='hidden' name='celular' value=''><input type='hidden' name='email' value=''><input type='hidden' name='midias_sociais' value=''><input type='hidden' name='pessoa_contato' value=''><input type='hidden' name='cargo' value=''><input type='hidden' name='id_corretor' value='0'><input type='hidden' name='id_assistente' value='0'>
<!--                  <input type='hidden' name='id_assistente' value='0'>
<input type='hidden' name='id_corretor' value='0'>
<input type='hidden' name='cargo' value=''>
<input type='hidden' name='pessoa_contato' value=''>
<input type='hidden' name='midias_sociais' value=''>
<input type='hidden' name='email_principal' value=''>
<input type='hidden' name='celular' value=''>
<input type='hidden' name='fax' value=''>
<input type='hidden' name='telefone_2' value=''>
<input type='hidden' name='telefone_1' value=''>
<input type='hidden' name='estado' value='0'>
<input type='hidden' name='cidade' value=''>
<input type='hidden' name='bairro' value=''>
<input type='hidden' name='complemento' value=''>
<input type='hidden' name='numero' value=''>
<input type='hidden' name='endereco' value=''>
<input type='hidden' name='endereco' value=''>
<input type='hidden' name='telefone_filial' value=''>
<input type='hidden' name='razao_social_filial' value=''>
<input type='hidden' name='matriz_filial' value='0'>
<input type='hidden' name='cnpj_cpf' value=''>

                    -->

                </td>
            </tr>
        </table>


        <div class="row-fluid sortable">
    <div class="box span12">
    <div class="box-header well" data-original-title>
    <h2><i class="icon-edit"></i>Coberturas Complemento</h2>
    </div>
        <table class="has-warning" >
            <tr>
                <td>

<label for="inicio_vigencia_mes" class="control-label">Inicio Vigência do Mês</label>                   
<br><input type="text" name="inicio_vigencia_mes" id="inicio_vigencia_mes" readonly="1" class="input-medium datepicker" placeholder="Campo automático" <?php echo date('d/m/Y - H:i',time()-0);?>  />
                </td>
                <td>
<label for="fim_vigencia_mes" class="control-label">Fim Vigência do Mês</label>                    
<br><input type="text" name="fim_vigencia_mes" value="" id="fim_vigencia_mes" class="input-medium datepicker"  />

                </td>
                <td>
<label for="data_emissao_mes" class="control-label">Data de Emissão Mensal</label>
<br><input type="text" name="data_emissao_mes" value="" id="data_emissao_mes" class="input-medium"  />

                </td>

            </tr>
            <tr>

                <td>	

<label for="frequencia_emissao" class="control-label">Frequência de Emissão:</label>
<br><select name="frequencia_emissao" id="frequencia_emissao" class="input-medium" data-rel="chosen">
<option value="dia">Dia</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>

<td>	

<label for="frequencia_vencimento" class="control-label">Frequência de Vencimento:</label>  
<br><select name="frequencia_vencimento" id="frequencia_vencimento" class="input-medium" data-rel="chosen">
<option value="dia">Dia</option>
<option value="01">01</option>
<option value="02">02</option>
<option value="03">03</option>
<option value="04">04</option>
<option value="05">05</option>
<option value="06">06</option>
<option value="07">07</option>
<option value="08">08</option>
<option value="09">09</option>
<option value="10">10</option>
<option value="11">11</option>
<option value="12">12</option>
<option value="13">13</option>
<option value="14">14</option>
<option value="15">15</option>
<option value="16">16</option>
<option value="17">17</option>
<option value="18">18</option>
<option value="19">19</option>
<option value="20">20</option>
<option value="21">21</option>
<option value="22">22</option>
<option value="23">23</option>
<option value="24">24</option>
<option value="25">25</option>
<option value="26">26</option>
<option value="27">27</option>
<option value="28">28</option>
<option value="29">29</option>
<option value="30">30</option>
<option value="31">31</option>
</select>
</td>
<td>	
<label for="moeda" class="control-label">Moeda:</label> 
<br><select name="moeda" id="moeda" class="input-medium" data-rel="chosen">
<option value="Escolha">Escolha</option>
<option value="Real">Real</option>
<option value="Ipc">Ipc</option>
<option value="Ipca">Ipca</option>
</select>
</td>
</tr>
<tr>
<td>
<label for="inicio_renovacao" class="control-label">Inicio de Renovação:</label>
<br><input type="text" name="inicio_renovacao" value="" id="inicio_renovacao" class="input-medium datepicker" />
</td>
<td>
<label for="fim_renovacao" class="control-label">Fim de Renovação:</label>
<br><input type="text" name="fim_renovacao" value="" id="fim_renovacao" class="input-medium datepicker"  />                
</td>
<td>
<label for="cartao_proposta" class="control-label">Obrigatório Cartão Proposta para novas inclusões:</label>                    <br>
<select name="cartao_proposta" id="cartao_proposta" class="input-medium" data-rel="chosen">
<option value="0">Escolha</option>
<option value="SIM">SIM</option>
<option value="NAO">NAO</option>
</select> 
</td>
</tr>
</table>
            <table class="has-warning">
            <tr>
            <td>
<label for="inadiplencia_apos" class="control-label">Inadimplência após:</label> 
<br><input type="text" name="inadiplencia_apos" value="" id="inadiplencia_apos" class="input-medium"  /> 
</td>
<td>
<label for="limite_idade" class="control-label">Limite de idade:</label>
<br><input type="text" name="limite_idade" value="" id="limite_idade" class="input-medium"  /> 
</td>
<td>
<label for="minimo_faturamento" class="control-label">Minimo de faturamento:</label>
<br><input type="text" name="minimo_faturamento" value="" id="minimo_faturamento" class="input-medium"  />

              </td>
            </tr>
        </table>
   </fieldset>
<div class="modal fade" id="confirmacao">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">CONFIRMAÇÃO</h4>
            </div>
            <div class="modal-body">
                <p>Valor errado de faturamento favor verificar</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">NÃO</button>
                <button type="button" class="btn btn-primary">SIM</button> 
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="form-actions">
<button type="submit" class="btn btn-primary" name="salvar" value="Submit request">Cadastrar Nova Cobertura</button>
    <button class="btn btn-danger">Cancelar</button>
</div>
</fieldset>
</form>
</div>
</div><!--/span-->
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

		
		
	</div><!--/.fluid-container-->
	<!-- jQuery -->
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
