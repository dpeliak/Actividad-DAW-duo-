<?php
require_once "db.php";

class UsuariosModel{
	public function crearuser($usuario, $password, $rol) {
		$db = conectar();
		$contra = password_hash($password, PASSWORD_DEFAULT);
	
		$sql = "INSERT INTO usuarios (usuario, password, rol) VALUES (:usuario, :password, :rol);";
		$stmt = $db->prepare($sql);
		$stmt->execute([
			':usuario'	=>	$usuario,
			':password'	=>	$contra,
			':rol'		=>	$rol
		]);
		header ("Location: index.php");
		exit;
	}
}
	
