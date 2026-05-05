<?php
require_once "db.php";
require_once "Tarea.php";

class TareasModel {

	public function getAll() {
    	$db = conectar();
    	$stmt = $db->query("SELECT * FROM tareas ORDER BY id DESC");
    	$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
    	$tareas = [];
    	foreach ($resultado as $fila) {
        	// cada fila de BD → objeto Tarea
        	$tareas[] = new Tarea($fila);
    	}
    	return $tareas;
    	}

	public function getById($id) {
    	$db = conectar();
    	$stmt = $db->prepare("SELECT * FROM tareas WHERE id = :id");
    	$stmt->execute([':id' => $id]);
    	$fila = $stmt->fetch(PDO::FETCH_ASSOC);

    	return new Tarea($fila);
	}

	public function save(Tarea $tarea) {
    	$db = conectar();
    	$stmt = $db->prepare("
        	INSERT INTO tareas (texto, estado, autor, tema, fecha_limite, prioridad)
        	VALUES (:texto, :estado, :autor, :tema, :fecha_limite, :prioridad)
    	");
    	$stmt->execute([
        	':texto'    	=> $tarea->texto,
        	':estado'   	=> $tarea->estado,
        	':autor'    	=> $tarea->autor,
        	':tema'     	=> $tarea->tema,
        	':fecha_limite' => $tarea->fecha_limite,
        	':prioridad'    => $tarea->prioridad
    	]);
	}

	public function delete($id) {
	// Revisar y modificar si es necesario
	 	$db = conectar();
		$stmt = $db->prepare("DELETE FROM tareas WHERE id = :id");
     		$stmt->execute([':id' => $id]);
	}
	public function update(Tarea $tarea) {
		$db = conectar();

     		$stmt = $db->prepare("UPDATE tareas SET texto = :texto, estado = :estado, autor = :autor, tema = :tema, fecha_limite = :fecha_limite, prioridad = :prioridad WHERE id = :id");
     		$stmt->execute([
		 ':id' => $tarea->id,
		 ':texto' => $tarea->texto,
		 ':estado' => $tarea->estado,
		 ':autor' => $tarea->autor,
		 ':tema' => $tarea->tema,
		 ':fecha_limite' => $tarea->fecha_limite,
		 ':prioridad' => $tarea->prioridad
	     ]);
	}
	public function eliminar() {

	if ($_SESSION['rol'] !== 'admin') {
    	$_SESSION['error'] = "No tienes permisos para eliminar tareas";
    	header("Location: index.php");
    	exit;
	}

	$model = new TareasModel();
	$model->delete($_GET['id']);

	$_SESSION['mensaje'] = "Tarea eliminada";
	header("Location: index.php");
	exit;
	}
	public function cambiar(){
		$db = conectar();
		$stmt = $db ->prepare("UPDATE tareas SET estado = 'finalizada' where estado = 'iniciada'");
		$stmt->execute();	
	}
	public function filtro($autor) {
		$db = conectar();
		$stmt = $db->prepare("SELECT * FROM tareas where autor = ':autor'");
		$stmt->execute([':autor' =>$autor]);
    		$fila = $stmt->fetch(PDO::FETCH_ASSOC);
    		return new Tarea();
	}
	public function getAutor($autor) {
    	$db = conectar();
    	$stmt = $db->prepare("SELECT * FROM tareas WHERE autor = :autor");
    	$stmt->execute([':autor' => $autor]);
    	$fila = $stmt->fetch(PDO::FETCH_ASSOC);

    	return new Tarea($fila);
	}
}

