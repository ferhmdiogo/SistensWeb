<?php
session_start();
require_once "banco/conexao.php";
require_once "class/login.php";

if(isset($_GET['logout'])):
    
    if($_GET['logout']== 'ok'):
        $l = new Login;
        $l->deslogar();
        
    endif;
    
endif;

if(isset($_SESSION['logado'])):
   
    else:
        header("Location:index.php");

        
    
endif;


?>


<!DOCTYPE html>
<meta http-equiv="content-language" content="pt-br">
<head>
    <meta http-equiv="content-language" content="pt-br">
    <title>Menu - SistensWeb</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="recursos/css/bootstrap.min.css" rel="stylesheet">
    <link href="recursos/css/bootstrap.css" rel="stylesheet">
    <link href="recursos/css/charisma-app.css" rel="stylesheet">
    <link href="recursos/css/bootstrap-cerulean.css" rel="stylesheet">
    <link href="recursos/css/chosen.css" rel="stylesheet">
    <link href="recursos/css/datepicker.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="https://raw.github.com/digitalBush/jquery.maskedinput/1.3.1/dist/jquery.maskedinput.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="recursos/css/jquery-ui-1.8.21.custom.css" rel="stylesheet">
    
	<style type="text/css">
    .label,.glyphicon { margin-right:5px; }</style>
    
	<style type="text/css">
	  body {
		padding-bottom: 40px;
	  }
	  .sidebar-nav {
		padding: 9px 0;
	  }
	</style>
        
	
    <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="recursos/js/bootstrap.min.js"></script>
    <script src="recursos/css/bower_components/chosen/chosen.jquery.min.js"></script>
    <script>


    //Verifica tipo de Capital
    function verificaTipoCapital()
    {
        $(function() {

            var tipo_capital = $("#tipo_capital").val();
            if (tipo_capital == "Escalonado")
            {
                $("#capital").val(1);
                $('#capital').attr('readonly', true);
                $("#morte").val(1);
                $('#morte').attr('readonly', true);
            }
            else
            {
                $('#capital').attr('readonly', false);
            }


        });

    }

    //Preenche morte
    function preencheMorte()
    {
        $(function() {

            var capital = $("#capital").val();

            $("#morte").val(capital);

            $('#morte').attr('readonly', true);


        });

    }



    
    function getDadosSegurado(id_cliente)
    {
        $(function() {


            var id_segurado;
            var nome_completo;
            var data_nascimento;
            var porcentagem;
            var resultado;
            var resultado1;
            var tabela='';

            var url =       + id_cliente;
            $.get(url, function(dataReturn) {

                if (dataReturn == 0)
                    alert('N�o encontramos nenhum segurado para o estipulante ' + id_cliente)



                var res = dataReturn.split("<br>");
                  
                
                document.getElementById('result_segurado').innerHTML=('<table border=1>');
                
                
                
                
                
                
                	tabela+='<table class="table paper-tbl-theme table-bordered responsive table-paper">';

     tabela+='<thead>';
        tabela+='<tr style="background-color:#005EBA; color:#FFF; font-size:14px">';
     tabela+='<th><center>EDITAR</center></th>';       
    tabela+='<th><center>NOME DO BENEFICI�RIO</center></th>';
          tabela+='<th><center>DATA NASC.</center></th>';
           tabela+='<th><center>PORCETAGEM</center></th>';         
      tabela+='</tr>';
    tabela+='</thead>';
   tabela+='<tbody>';
                     
                for (index = 0; index < res.length; ++index) {
                    // addMarker(s[idex],'');


                    resultado = res[index];
                    
                    if(resultado!='')
                    {
                       
                    resultado1 = resultado.split("|");
                    id_segurado = resultado1[0];
                    nome_completo = resultado1[1];
                    data_nascimento = resultado1[2];
                    porcentagem = resultado1[3];
                    
                    
                   tabela+='<tr>';
                   tabela+='<td><button onclick="editarSegurado('+id_segurado+'); return false;">Editar</button></td>';
                   tabela+='<td>'+nome_completo+'</td>';
                   tabela+='<td>'+data_nascimento+'</td>';
                    tabela+='<td>'+porcentagem+'</td>';
                   tabela+='</tr>';
                    

                
                    }
                      
                }

tabela+='</tbody></tr></table>';
document.getElementById('result_segurado').innerHTML=tabela;


                //$('#enderecos').html(dataReturn);  //coloco na div o retorno da requisicao
            });



        });

    }


    function editarSegurado(id_segurado)
    {
        
          $(function() {


            var nome_completo;
            var cpf;
            var data_nascimento;
            var idade;
            var sexo;
            var tipo;
            var capital;
            var data_add;
            var tabela ='';

            var url = "" + id_segurado;
            $.get(url, function(dataReturn) {


	tabela+='<table class="table paper-tbl-theme table-bordered responsive table-paper">';

     tabela+='<thead>';
        tabela+='<tr style="background-color:#005EBA; color:#FFF; font-size:14px">';
     tabela+='<th><center>ALTERAR</center></th>';       
    tabela+='<th><center>CPF</center></th>';
          tabela+='<th><center>DATA NASC.</center></th>';
           tabela+='<th><center>IDADE</center></th>';     
            tabela+='<th><center>SEXO</center></th>';    
             tabela+='<th><center>CAPITAL</center></th>';    
             tabela+='<th><center>TIPO</center></th>';    
             tabela+='<th><center>DT. CADASTRO</center></th>'; 
      tabela+='</tr>';
    tabela+='</thead>';
   tabela+='<tbody>';
                     
                    

                var res = dataReturn.split("|");

                nome_completo = res[1];
                cpf = res[1];
                data_nascimento = res[2];
                idade = res[3];
                sexo = res[4];
                tipo = res[5];
                capital = res[6];
                data_add = res[7];
                
                
                     tabela+='<tr>';
                   tabela+='<td><button onclick="editarSegurado('+id_segurado+'); return false;">Editar</button></td>';
                   tabela+='<td>'+nome_completo+'</td>';
                   tabela+='<td>'+cpf+'</td>';
                    tabela+='<td>'+idade+'</td>';
                     tabela+='<td>'+sexo+'</td>';
                      tabela+='<td>'+capital+'</td>';
                   tabela+='<td>'+tipo+'</td>';                   
                    tabela+='<td>'+data_add+'</td>';
                   tabela+='</tr>';

              tabela+='</tbody></tr></table>';
document.getElementById('result_edit_segurado').innerHTML=tabela;

                //$('#enderecos').html(dataReturn);  //coloco na div o retorno da requisicao
            });



        });

    }


    $(function() {


        $('#inicio_vigencia_mes').datepicker({
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






</script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default" role="navigation">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-list-alt"></span>Cadastros<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="listaclientes.php">Clientes</a></li>
                        <li><a href="listacorretor.php">Corretores</a></li>
                        <li><a href="listaassistente.php">Assistentes</a></li>
                        <li><a href="listasinistro.php">Sinistros</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-barcode"></span>Faturamento<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Movimentacao</a></li>
                        <li><a href="#">Encerramento Automatico</a></li>
			<li><a href="#">Certificados</a></li>
                        <li><a href="#">Sac</a></li>
                    </ul>
                </li>
				<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-usd"></span>Financeiro<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Arquivo Remessa</a></li>
                        <li><a href="#">Recebimentos</a></li>
						<li><a href="#">Baixa do Sistema</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                    class="glyphicon glyphicon-search"></span>Buscar<b class="caret"></b></a>
                    <ul class="dropdown-menu" style="min-width: 300px;">
                        <li>
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="navbar-form navbar-left" role="search">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search" />
                                        <span class="input-group-btn">
                                            <button class="btn btn-primary" type="button">
                                                Ir!</button>
                                        </span>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                
                <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        Bem Vindo <?php echo $_SESSION['usuario'];?></span><b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        <li><a href="menu_usuarios.php?logout=ok"><span class="glyphicon glyphicon-off red"></span>Sair</a></li>
                    </ul>
                </li>
            </ul>
        </div>
		
        <!-- /.navbar-collapse -->
    </nav>
				
			<div>
				<ul class="breadcrumb">
					<li>
					    <a href="listaclientes.php"><span class="glyphicon glyphicon-folder-open "></span>Lista de Clientes</a></li><span class="divider">/</span>
					    <a href="novo.php"><span class="glyphicon glyphicon-plus-sign green"></span>Novo</a></li><span class="divider">/</span>
						<a href="coberturas.php"><span class="glyphicon glyphicon-tasks"></span>Coberturas</a></li><span class="divider">/</span>
						<a href="comissao.php"><span class="glyphicon glyphicon-usd"></span>Comissão</a></li><span class="divider">/</span>
                                                <a href="segurados.php"><span class="glyphicon glyphicon-user yellow"></span>Segurados</a></li><span class="divider">/</span>
						<a href="consultaparcelas.php"><span class="glyphicon glyphicon-list-alt"></span>Consulta de Parcelas</a></li><span class="divider">/</span>
						<a href="#"><span class="glyphicon glyphicon-tasks"></span>Relatorio</a></li>
					
					</li>
				</ul>
			</div>
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
        <script src="recursos/js/bootstrap-dropdown.js"></script>
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
        <script src='recursos/js/fullcalendar.min.js'></script>
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
