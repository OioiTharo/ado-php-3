<!DOCTYPE html>
<?php
	require 'conexao.php';
	$pdo = conectar();
	
	$musicas = [];
	$id = filter_input(INPUT_GET, "id");
	if($id){
		$sql = $pdo->prepare("SELECT * FROM musica WHERE id =:id");
		$sql->bindValue(':id',$id);
		$sql->execute();
		$musicas = $sql->fetch(PDO::FETCH_ASSOC);
		if(!$musicas){
			header("Location: index.php");
			
			exit;
		}
	}
	else{
			header("Location: index.php");
			
			exit;
	}
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>KARAOKE GTG</title>
		<link rel="icon" href="icon.gif" type="image/x-icon"/>
		<link rel="shortcut icon" href="icon.gif" type="image/x-icon"/>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
		<link href="main.css" rel="stylesheet">
	</head>
	<body>
		<div class="cabecalho">
			<img class="gif" src="icon.gif"> 
			<br>
			<img src="https://see.fontimg.com/api/renderfont4/Rpz16/eyJyIjoiZHciLCJoIjo4MSwidyI6MTI1MCwiZnMiOjY1LCJmZ2MiOiIjMDAwMDAwIiwiYmdjIjoiI0ZGRkZGRiJ9/S0FSQU9LRSBHVEcg/kakekakeitalicpersonaluse-nmi.png" alt="Fancy fonts">
		</div>
		<div class="dFor2">
			<form method="POST" action="edAcao.php" class="row">
				<h2>Editar musica</h2>
				<input type="hidden" value="<?=$musicas['id'];?>" name="id"/>
				<p class="pad"></p>
				<div class="col-3">
					<label for="Titulo" class="form-label">Titulo:</label>
					<input type="text" class="form-control" id="Titulo" value="<?=$musicas['titulo'];?>" name="titulo">
				</div>
				<div class="col-3">
					<label for="Cantor" class="form-label">Cantor:</label>
					<input type="text" class="form-control" id="Cantor" value="<?=$musicas['cantor'];?>" name="cantor">
				</div>
				<div class="col-3">
					<label for="Versao" class="form-label">Versão:</label>
					<input type="text" class="form-control" id="Versao" value="<?=$musicas['versao'];?>" name="versao">
				</div>
				<div class="col-2">
					<label for="Ano" class="form-label">Ano de lançamento:</label>
					<input type="text" class="form-control" id="Ano" value="<?=$musicas['ano_Lanc'];?>" name="ano_Lanc">
				</div>
				<p class="pad"></p>
				<div class="col-6">
					<label for="Compositores" class="form-label">Compositores:</label>
					<input type="text" class="form-control" id="Compositores" value="<?=$musicas['compositores'];?>" name="compositores">
				</div>
				<div class="col-2">
					<label for="Estilo" class="form-label">Estilo:</label>
					<input type="text" class="form-control" id="Estilo" value="<?=$musicas['estilo'];?>" name="estilo">
				</div>
				<div class="col-1">
					<label for="Restricao" class="form-label">Restrição:</label>
					<input type="text" class="form-control" id="Restricao" value="<?=$musicas['restricao'];?>" name="restricao">
				</div>
				<p class="pad"></p>
				<input class="btn btn-primary sal" type="submit" value="SALVAR"/>
			</form>
		</div>
		<a href="index.php"><img src="setaroxa.png" class="voltar"></a>
		<div class="dBot fixed-bottom">
			<p>by: ©GTG</p>
		</div>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</body>
</html>