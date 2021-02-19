<?php
	
	session_start();

	//variavel que verifica a autenticação foi realizada
	$usuario_autenticado = false;
	$usuario_id = null;
	$usuario_perfil_id = null;

	$perfis = array(1 => 'administrativo', 2 => 'usuario');

	//usuarios do sistemas
	$usuarios_app = array(
		array('id' => 1 ,'email' => 'adm@teste.com', 'senha' => '1234', 'perfil_id' => 1),
		array('id' => 2 ,'email' => 'user@teste.com', 'senha' => '1234', 'perfil_id' => 2),
		array('id' => 3 ,'email' => 'user2@teste.com', 'senha' => 'abcd', 'perfil_id' => 2),
		array('id' => 4 ,'email' => 'joao.vitor.silva@gmail.com', 'senha' => '1234', 'perfil_id' => 2)
	);

	foreach ($usuarios_app as $user) {
		if($user['email'] == $_POST['email'] && $user['senha'] == $_POST['senha']) {
			$usuario_autenticado = true;
			$usuario_id = $user['id'];
			$usuario_perfil_id = $user['perfil_id'];
		}
	}
	if ($usuario_autenticado) {
		$_SESSION['autenticado'] = 'SIM';
		$_SESSION['id'] = $usuario_id;
		$_SESSION['perfil_id'] = $usuario_perfil_id;
		header('Location: home.php');
	}else{
		$_SESSION['autenticado'] = 'NAO';
		header('Location: index.php?login=erro');
	}
?>