<?php
class ACL {

	private static $permisos = [
    	'admin' => [
        	'tareas.index',
        	'tareas.ver',
        	'tareas.crear',
        	'tareas.editar',
        	'tareas.eliminar',
        	'usuarios.usuario',
        	'tareas.estado'
    	],
    	'user' => [
        	'tareas.index',
        	'tareas.ver',
        	'tareas.crear',
        	'tareas.editar'
    	],
    	'observador' => [
    		'tareas.index',
    		'tareas.ver'
    	],
    	'supervisor' => [
    		'tareas.index',
    		'tareas.ver',
    		'tareas.editar',
    		'tareas.estado'
    	]
	];

	public static function puede($accion) {

    	if (!isset($_SESSION['rol'])) {
        	return false;
    	}

    	$rol = $_SESSION['rol'];

    	return in_array($accion, self::$permisos[$rol]);
	}
}
?>
