<?php
session_start();
function __autoload($class_name){
require_once "class/" .$class_name . ".php";
}
if(isset($_SESSION['logado'])):
   
    else:
        header("Location:index.php");

        
    
endif;

?>


<!DOCTYPE HTML>
<html land="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
   <title>Cadastro Usuários</title>
   <link rel="stylesheet" href="recursos/css/bootstrap.min.css" />
   <link rel="stylesheet" href="recursos/css/bootstrap.css" />
  <link rel="stylesheet" />
  <!--[if lt IE 9]>
      <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
   <![endif]-->
</head>
<body>
    <?php
    
    $usuario = new Usuarios();
    
    if(isset($_POST['cadastrar'])):
        $nome = $_POST['nome'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        
        $usuario->setNome($nome);
        $usuario->setLogin($login);
        $usuario->setPassword($password);
        $usuario->setEmail($email);
        
        #Insert
        
        $usuario->insert();
        
        
    endif;
    
    ?>
    
    
    
	<div class="container">

		
		<header class="masthead">
			<h1 class="muted">Usuários</h1>
			<nav class="navbar">
				<div class="navbar-inner">
					<div class="container">
						<ul class="nav">
                                                    <li class="active"><a href="menu.php">Página inicial</a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>
            <?php
            if(isset($_POST['atualizar'])):
                $id_usuario = $_POST['id_usuario'];
                $nome = $_POST['nome'];
                $login = $_POST['login'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                
                $usuario->setNome($nome);
                $usuario->setLogin($login);
                $usuario->setPassword($password);
                $usuario->setEmail($email);
                
                if($usuario->update($id_usuario)){
                    echo "Atualizado com sucesso";
                }
        
            endif;
            ?>
<?php
    if(isset($_GET['acao']) && $_GET['acao'] == 'deletar'):
    
        $id_usuario = (int)$_GET['id_usuario'];
        $usuario->delete($id_usuario);
        endif;
    ?>
            
        <?php
        if(isset($_GET['acao']) && $_GET['acao'] == 'editar'){
            $id_usuario = (int)$_GET['id_usuario'];
            $resultado = $usuario->find($id_usuario);
        

         ?>
        <form class="form-inline" method="post" action="">
                            <div class="input-group col-md-15">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                                    <input type="text" class="form-control" name="nome" value="<?php echo $resultado['nome']; ?>" placeholder="Nome:"/>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i></span>
                                    <input type="text" class="form-control" name="login" value="<?php echo $resultado['login']; ?>" placeholder="Login:" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="text" class="form-control" name="password" value="<?php echo $resultado['password']; ?>" placeholder="Senha:" />
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="text" class="form-control" name="email" value="<?php echo $resultado['email']; ?>" placeholder="E-mail:" />
                                    <input type="hidden" name="id_usuario" value="<?php echo $resultado['id_usuario'];?>">
                            </div>
                        </br>
                            <input type="submit" name="atualizar" class="btn btn-primary" value="Atualizar">					
                    </form>
    <?php }  else {
    
?>
            </br>
            <form class="form-inline" method="post" action="">
			<div class="input-group col-md-15">
				<span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
				<input type="text" class="form-control" name="nome" placeholder="Nome:"/>
                                <span class="input-group-addon"><i class="glyphicon glyphicon-log-in"></i></span>
                                <input type="text" class="form-control" name="login" placeholder="Login:" />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
				<input type="text" class="form-control" name="password" placeholder="Senha:" />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
				<input type="text" class="form-control" name="email" placeholder="E-mail:" />
			</div>
                    </br>
			<input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar dados">					
		</form>

    <?php } ?>
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
					<th>#</th>
					<th>Nome:</th>
					<th>Login:</th>
					<th>Senha:</th>
                                        <th>E-Mail:</th>
                                        <th>Ações:</th>
				</tr>
			</thead>
			
			<?php foreach($usuario->findAll() as $key => $value): ?>

			<tbody>
				<tr>
                                    <td><?php echo $value['id_usuario'];?></td>
					<td><?php echo $value['nome'];?></td>
					<td><?php echo $value['login'];?></td>
                                        <td><?php echo $value['password'];?></td>
					<td><?php echo $value['email'];?></td>
					<td>
                                        <?php echo '<a class="btn btn-success" href="cadastro_usuario.php?acao=editar&id_usuario='.$value['id_usuario'].'">Editar</a>'; ?>
                                        <?php echo '<a class="btn btn-danger" href="cadastro_usuario.php?acao=deletar&id_usuario='.$value['id_usuario'].'">Deletar</a>'; ?>    
					</td>
				</tr>
			</tbody>

		<?php endforeach; ?>	

		</table>

	</div>

    <script src="recursos/js/jQuery.js"></script>
    <script src="recursos/js/bootstrap.js"></script>
</body>
</html>

