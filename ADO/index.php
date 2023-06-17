<?php
	require 'conexao.php';
	$pdo = conectar();
	
	if(isset($_POST['login']) || isset($_POST['senha'])){
		if(strlen($_POST['login']) == 0 ){
			echo "Preencha seu login";
		}else if (strlen($_POST['senha']) == 0 ) {
			echo "Preencha sua senha";
		} else{
			
			$login = $_POST['login'];
			$senha = $_POST['senha'];
			
			$sql_code = "SELECT * FROM administrador WHERE login = :login AND senha = :senha"; 
			$sql_query = $pdo->query($sql_code) or die("Falha no sql". $pdo->error);
			$sql_query->bindValue(':login', $login);
			$sql_query->bindValue(':senha', $senha);
			$sql_query->execute();
			
			if ($sql_query->rowCount() == 0){
				
				$usuario = $sql_query->fetch(PDO::FETCH_ASSOC);
				if(!isset($_SESSION)){
					session_start();
				}
				$_SESSION['id'] = $usuario['id'];
				$_SESSION['nome'] = $usuario['nome'];
				
				header("Location: menu.php");
				
			}else{
				echo "Falha ao logar, Login ou senha incorretos";
			}
		}
	}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>KARAOKE GTG</title>
		<link rel="icon" href="icon.gif" type="image/x-icon"/>
		<link rel="shortcut icon" href="icon.gif" type="image/x-icon"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<link href="estilo.css" rel="stylesheet">
	</head>
	<body>
		<section class="ok">
			<h2>Acessar conta</h2>
			<br>
			<form action="" method="POST">
				<p>
					<input name="login" type="text" class="form-control" placeholder="Login" autofocus="">
				</p>
				<p>
					<input name="senha" type="password" class="form-control" placeholder="Senha" autofocus="">
				</p>
				<button type="submit" class="logar btn btn-primary">Entrar</button>
			</form>
							
		</section>
	
		<!--<div class="dBot fixed-bottom">
			<a href="cadastro.php"><input type="button" class="btn btn-primary prin" value="Cadastrar Musica"></a>
			<p>by: ©GTG</p> 
		-->
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</body>
</html>