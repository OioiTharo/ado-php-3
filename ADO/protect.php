<?php

	if(!isset($_SESSION)){
		session_start();
	}
	if(!isset($_SESSION['id'])){
		die("Você não pode entrar nessa pagina sem logar. <p><a href=\"index.php\">Logar!</a></p>");
	}
	
?>