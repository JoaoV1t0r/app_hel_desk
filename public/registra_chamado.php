<?php

	session_start();

	$titulo = str_replace('#', '-', $_POST['titulo']);
	$categoria = str_replace('#', '-', $_POST['categoria']);
	$descricao = str_replace('#', '-', $_POST['descricao']);

	if ($titulo == '' || $categoria == 'Criação Usuário' || $descricao == '') {
		header('Location: abrir_chamado.php?campo=vazio');
	}else{

		$texto = $_SESSION['id'] . '#' . $titulo. '#'. $categoria. '#'. $descricao . PHP_EOL;

		$arquivo = fopen('../app_help_desk/arquivo.hd', 'a');

		fwrite($arquivo, $texto);

		fclose($arquivo);
		header('Location: abrir_chamado.php');
	}


?>