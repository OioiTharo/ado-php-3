<?php
	require 'protect.php';
	require 'conexao.php';
	$pdo = conectar();
	
	$estilos=[];
	$sql2 = "SELECT * FROM ESTILO_MUSICA";
	$resultado = $pdo->query($sql2);
	while ($est = $resultado->fetch(PDO::FETCH_ASSOC)) {
		$estilos[] = $est;
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
		<section class="pin">
			<div class="cabecalho">
				<h2> Bem vindo(a) ao </h2>
				<img class="cb" src="https://see.fontimg.com/api/renderfont4/Rpz16/eyJyIjoiZHciLCJoIjo4MSwidyI6MTI1MCwiZnMiOjY1LCJmZ2MiOiIjMDAwMDAwIiwiYmdjIjoiI0ZGRkZGRiJ9/S0FSQU9LRSBHVEcg/kakekakeitalicpersonaluse-nmi.png" alt="Fancy fonts">
				<p> <?php echo $_SESSION['nome']; ?></p>
			</div>

			<div class="dFor">
				<form method="POST" action="cadAcao.php" class="row">
					<h2>Cadastrar musica</h2>
					<div class="col-3">
						<label for="titulo" class="form-label">Titulo:</label>
						<input type="text" class="form-control" id="titulo" name="titulo">
					</div>
					<div class="col-3">
						<label for="Cantor" class="form-label">Cantor:</label>
						<input type="text" class="form-control" id="Cantor" name="cantor">
					</div>
					<div class="col-2">
						<label for="Ano_Lanc" class="form-label">Ano de lançamento:</label>
						<input type="number" class="form-control" id="Ano_Lanc" name="ano_Lanc">
					</div>
					<div class="col-6">
						<label for="Compositores" class="form-label">Compositores:</label>
						<input type="text" class="form-control" id="Compositores" name="compositores">
					</div>
					<div class="col-1">
						<label for="Versao" class="form-label">Versão:</label>
						<select name="versao">
							<option class="form-select form-select-sm" id="Versao" value="Oficial">Oficial</option>
							<option class="form-select form-select-sm" id="Versao" value="Acustica">Acustica</option>
							<option class="form-select form-select-sm" id="Versao" value="Ao vivo">Ao vivo</option>
						</select>
					</div>
					<div class="col-1"></div>
					<div class="col-1">
						<label for="Estilo" class="form-label">Estilo:</label>
						<select name="estilo">
							<?php foreach($estilos as $est): ?><option class="form-select form-select-sm" id="Estilo" value="<?=$est['nome'];?>"><?=$est['nome'];?></option><?php endforeach ; ?>
						</select>	
					</div>
					<div class="col-1"></div>
					<div class="col-1">
						<label for="Restricao" class="form-label">Restrição:</label>
						<select name="restricao">
							<option class="form-select form-select-sm" id="Restricao" value="0">Não</option>
							<option class="form-select form-select-sm" id="Restricao" value="1">Sim</option>
						</select>
					</div>
					<p class="pad"></p>
					<input class="btn btn-primary cad" type="submit" value="CADASTRAR"/>
				</form>
			</div>
			<a href="menu.php"><img src="setaazul.png" class="voltar"></a>
			<div class="dBot">
				<p>by: ©GTG</p>
			</div>
		
		</section>
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</body>
</html>
