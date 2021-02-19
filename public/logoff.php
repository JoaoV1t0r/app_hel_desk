<?php
	
	session_start();
	//remover indices do array de sessão

	//unset($_SESSION)

	//destruir a variavel de sessão
	session_destroy();

	header('Location: index.php');
?>