<?php
	require 'conexao.php';
	$pdo = conectar();

	$titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
	$cantor = filter_input(INPUT_POST, 'cantor', FILTER_SANITIZE_STRING);
	$compositores = filter_input(INPUT_POST, 'compositores', FILTER_SANITIZE_STRING);
	$ano_Lanc = filter_input(INPUT_POST, 'ano_Lanc', FILTER_SANITIZE_NUMBER_INT);
	$estilo = filter_input(INPUT_POST, 'estilo', FILTER_SANITIZE_STRING);
	$versao = filter_input(INPUT_POST, 'versao', FILTER_SANITIZE_STRING);
	$restricao = filter_input(INPUT_POST, 'restricao', FILTER_SANITIZE_NUMBER_INT);

	if ($titulo && $cantor && $compositores && $ano_Lanc && $estilo && $restricao && $versao) {
			$insertQuery = "INSERT INTO musica (titulo, compositores, cantor, ano_Lanc, versao, restricao, estilo) VALUES (:titulo, :compositores, :cantor, :ano_Lanc, :versao, :restricao, :estilo)";
			$sql = $pdo->prepare($insertQuery);
			$sql->bindValue(':titulo', $titulo);
			$sql->bindValue(':compositores', $compositores);
			$sql->bindValue(':cantor', $cantor);
			$sql->bindValue(':ano_Lanc', $ano_Lanc);
			$sql->bindValue(':versao', $versao);
			$sql->bindValue(':restricao', $restricao);
			$sql->bindValue(':estilo', $estilo);
			$sql->execute();
			header("Location: menu.php");
			exit;
		
	} else {
		echo "Erro: Todos os campos são obrigatórios.";
		echo $titulo . $cantor . $compositores . $ano_Lanc . $estilo . $versao . $restricao;// You can customize this error message according to your needs
		exit;
	}
?>

