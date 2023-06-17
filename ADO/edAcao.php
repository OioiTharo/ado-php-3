<?php
	require 'conexao.php';
	$pdo = conectar();
	
	$id = filter_input(INPUT_POST, 'id');	
	$titulo = filter_input(INPUT_POST, 'titulo');
	$cantor = filter_input(INPUT_POST, 'cantor');
	$compositores = filter_input(INPUT_POST, 'compositores');
	$ano_Lanc = filter_input(INPUT_POST, 'ano_Lanc');
	$estilo = filter_input(INPUT_POST, 'estilo');
	$versao = filter_input(INPUT_POST, 'versao');
	$restricao = filter_input(INPUT_POST, 'restricao');

	if($id && $titulo && $cantor && $compositores && $ano_Lanc && $estilo && $versao && $restricao){
		$sql = $pdo->prepare("UPDATE musica SET titulo = :titulo, cantor = :cantor, compositores = :compositores, ano_Lanc = :ano_Lanc, estilo = :estilo, versao = :versao, restricao = :restricao WHERE id = :id");
		$sql->bindValue(':titulo', $titulo);
		$sql->bindValue(':cantor', $cantor);
		$sql->bindValue(':compositores', $compositores);
		$sql->bindValue(':ano_Lanc', $ano_Lanc);
		$sql->bindValue(':estilo', $estilo);
		$sql->bindValue(':versao', $versao);
		$sql->bindValue(':restricao', $restricao);
		$sql->bindValue(':id', $id);
		$sql->execute();
		header("Location: menu.php");
		exit;
	}
	else{
		header("Location: editar.php"); 
		exit;
	}
?>