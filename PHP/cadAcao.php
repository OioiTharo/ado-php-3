<?php
	require 'conexao.php';
	$pdo = conectar();
	
	$titulo = filter_input(INPUT_POST, 'titulo');
	$cantor = filter_input(INPUT_POST, 'cantor');
	$compositores = filter_input(INPUT_POST, 'compositores');
	$ano_Lanc = filter_input(INPUT_POST, 'ano_Lanc');
	$estilo = filter_input(INPUT_POST, 'estilo');
	$versao = filter_input(INPUT_POST, 'versao');
	$restricao = filter_input(INPUT_POST, 'restricao');

	
	if($titulo && $cantor && $compositores && $ano_Lanc && $estilo && $restricao && $versao){
		$sql = $pdo-> prepare("SELECT * FROM musica WHERE titulo = :titulo");
		$sql-> bindValue(':titulo', $titulo);
		$sql->execute();
		
		
		if($sql->rowCount() === 0){
			$sql = $pdo-> prepare("INSERT INTO musica (titulo,compositores,cantor,ano_Lanc,versao,restricao,estilo) VALUES (:titulo, :compositores, :cantor, :ano_Lanc, :versao, :restricao, :estilo)");
			$sql->bindValue(':titulo', $titulo);
			$sql->bindValue(':compositores', $compositores);
			$sql->bindValue(':cantor', $cantor);
			$sql->bindValue(':ano_Lanc', $ano_Lanc);
			$sql->bindValue(':versao', $versao);
			$sql->bindValue(':restricao', $restricao);
			$sql->bindValue(':estilo', $estilo);
			$sql->execute();
			header("Location: index.php");
			exit;
		}
		else{
			header("Location: cadastro.php");
			exit;
		}
	}
	else{
		header("Location: cadastro.php");
		exit;
	}
	
?>