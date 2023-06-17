<?php
	
	require 'protect.php';
	require 'conexao.php';
	$pdo = conectar();
	
	$listaa=[];
	$sql = "SELECT * FROM MUSICA";
	$resultado = $pdo->query($sql);
	while ($linha = $resultado->fetch(PDO::FETCH_ASSOC)) {
		$listaa[] = $linha;
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
		<link href="estilo.css" rel="stylesheet">
	</head>
	<body>
		<section class="pin">
			<div class="cabecalho">
				<h2> Bem vindo(a) ao </h2>
				<img class="cb" src="https://see.fontimg.com/api/renderfont4/Rpz16/eyJyIjoiZHciLCJoIjo4MSwidyI6MTI1MCwiZnMiOjY1LCJmZ2MiOiIjMDAwMDAwIiwiYmdjIjoiI0ZGRkZGRiJ9/S0FSQU9LRSBHVEcg/kakekakeitalicpersonaluse-nmi.png" alt="Fancy fonts">
				<p> <?php echo $_SESSION['nome']; ?></p>
			</div>
			<h4> Nossa lista de musicas:</h4>
			<table class="table table-hover tMus">
				<tr>
					<th>ID</th>
					<th>Titulo</th>
					<th>Cantor</th>
					<th>Compositores</th>
					<th>Ano de lançamento</th>
					<th>Versao</th>
					<th>Estilo</th>
					<th>Restrição</th>
					<th></th>
				</tr>
				<tr>
				<?php foreach($listaa as $lista): ?>
				<tr>
					<td><?=$lista['id'];?></td>
					<td><?=$lista['titulo'];?></td>
					<td><?=$lista['cantor'];?></td>
					<td><?=$lista['compositores'];?></td>
					<td><?=$lista['ano_Lanc'];?></td>
					<td><?=$lista['versao'];?></td>
					<td><?=$lista['estilo'];?></td>
					<td><?=$lista['restricao'];?></td>
					<td>
						<a href="excluir.php?id=<?=$lista['id'];?>"><input type="button" class="btn" value="Deletar"></a> 
						<a href="editar.php?id=<?=$lista['id'];?>"><input type="button" class=" btn" value="Editar"></a>
					</td>
				</tr>
				<?php endforeach ; ?>
			</table>
			
			<div class="dBot fixed-bottom">
				<a href="cadastro.php"><input type="button" class="btn btn-primary prin" value="Cadastrar Musica"></a>
				<a href="logout.php"><input type="button" class="btn btn-primary prin" value="Sair"></a>
				<p>by: ©GTG</p> 
			</div>
		</section>
	
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</body>
</html>