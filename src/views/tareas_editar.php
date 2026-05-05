<html>
<head>
	<title>Tareas Editar</title>
</head>
<body>
	<h1>Editar tarea</h1>

	<form method="post" action="index.php?controller=Tareas&action=editar">
	<input type="hidden" name="id" value="<?= $tarea->id ?>">
	Texto: <input type="text" name="texto" value="<?= htmlspecialchars($tarea->texto) ?>"><br><br>
	Estado: <select name="estado" value="<?= $tarea->estado ?>">
		<option value="pendiente">Pendiente</option>
    		<option value="iniciada">Iniciada</option>
    		<option value="finalizada">Finalizada</option>
	</select><br/> <br/>
	Autor: <input type="text" name="autor" value="<?= $tarea->autor ?>"><br><br>
	Tema: <input type="text" name="tema" value="<?= $tarea->tema ?>"><br><br>
	Fecha límite: <input type="date" name="fecha_limite" value="<?= $tarea->fecha_limite ?>"><br><br>
	Prioridad: <input type="text" name="prioridad" value="<?= $tarea->prioridad ?>"><br><br>
	<button type="submit">Guardar cambios</button>
	</form>
	<a href="index.php">Cancelar cambios</a>
<?php
	if(isset($_SESSION['error'])){
		echo $_SESSION['error'];
	}
?>
</body>
</html>
