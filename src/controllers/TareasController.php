<?php

require_once "models/TareasModel.php";
require_once "core/ACL.php";
require_once "models/Validacion.php";
class TareasController {

    public function index() {
    	if (!ACL::puede('tareas.index')) {
    		$_SESSION['error'] = "No tienes permisos para ver el listado tareas";
    		header("Location: index.php");
    	exit;
	}
        $model = new TareasModel();
        $tareas = $model->getAll();
        require "views/tareas_listado.php";
    }


	public function crear() {
	if (!ACL::puede('tareas.crear')) {
    		$_SESSION['error'] = "No tienes permisos para crear tareas";
    		header("Location: index.php");
    	exit;
	}
	if (!empty($_POST)) {
		$datos = [
    		'texto' => $_POST['texto'],
    		'estado' => $_POST['estado'],
    		'autor' => $_POST['autor'] ?: null,
    		'tema' => $_POST['tema'],
    		'fecha_limite' => $_POST['fecha_limite'] ?: null,
    		'prioridad' => $_POST['prioridad']
		];
	$errores = Validacion::validarTarea($datos);
	if(!empty($errores)){
		$_SESSION['error'] = implode(',',$errores);
		require "views/tareas_crear.php";
		return;
	}

	$model = new TareasModel();
	$tarea = new Tarea($datos);
	$model->save($tarea);
	header("Location: index.php?controller=Tareas&action=index");
	exit;
}
		require "views/tareas_crear.php";
	}

	
	public function ver() {
	if (!ACL::puede('tareas.ver')) {
    		$_SESSION['error'] = "No tienes permisos para ver tareas";
    		header("Location: index.php");
    	exit;
	}
	if (!isset($_GET['id'])) {
    		header("Location: index.php");
    		exit;
	}
	$model = new TareasModel();
	$tarea = $model->getById($_GET['id']);
	require "views/tareas_ver.php";
	}

	public function eliminar() {
	if (!ACL::puede('tareas.eliminar')) {
    		$_SESSION['error'] = "No tienes permisos para eliminar tareas";
    		header("Location: index.php");
    	exit;
	}
	$model = new TareasModel();
	$model->delete($_GET['id']);
	header("Location: index.php");
	exit;
	}
	
	public function editar_form() {
     		if (!isset($_GET['id'])) {
         		header("Location: index.php");
         		exit;
    		}
    	
    	$model = new TareasModel();
     	$tarea = $model->getById($_GET['id']);
     	require "views/tareas_editar.php";
	}
	public function editar() {
	if (!ACL::puede('tareas.editar')) {
        	$_SESSION['error'] = "No tienes permisos para editar tareas";
        	header("Location: index.php");
        	exit;
    	}

   	if (!empty($_POST)) {
        	$datos = [
            	'texto' => $_POST['texto'],
		'estado' => $_POST['estado'],
            	'autor' => $_POST['autor'] ?: null,
            	'tema' => $_POST['tema'],
            	'fecha_limite' => $_POST['fecha_limite'] ?: null,
            	'prioridad' => $_POST['prioridad']
        ];

        $errores = Validacion::validarTarea($datos);

        if (!empty($errores)) {
            	$_SESSION['error'] = implode(', ', $errores);
            	require "views/tareas_editar.php";
            	return;
        }
        $tarea = new Tarea($_POST);
        $model = new TareasModel();
        $model->update($tarea);

        header("Location: index.php?controller=Tareas&action=index");
        exit;
    }
}
	public function estado() {
	if (!ACL::puede('tareas.estado')) {
        	$_SESSION['error'] = "No tienes permisos para cambiar de estado las tareas";
        	header("Location: index.php");
        	exit;
    	}
	$model = new TareasModel();
	$tarea = new Tarea($datos);
	$model->cambiar($tarea);
	header("Location: index.php?controller=Tareas&action=index");
	exit;
	}
	
	public function autor() {
	$model = new TareasModel();
	$tarea = $model->getAutor($_GET['autor']);
	require "views/tareas_autor.php";
	}
}



