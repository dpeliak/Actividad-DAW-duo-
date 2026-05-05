<html>
<head>
</head>
<body>
<h1>Crear tarea - mpilligua@institutmvm.cat</h1>

<form action="index.php?controller=Tareas&action=crear" method="POST">
	
	<input type="text" name="texto" placeholder="Descripción">

	<select name="estado">
    	<option value="pendiente">Pendiente</option>
    	<option value="iniciada">Iniciada</option>
    	<option value="finalizada">Finalizada</option>
	</select>

	<input type="text" name="autor" placeholder="Autor (opcional)">
	<input type="text" name="tema" placeholder="Tema">

	<input type="date" name="fecha_limite">
	<input type="number" name="prioridad" placeholder="Prioridad">
	
	<button>Guardar</button>
</form>
<?php
	if(isset($_SESSION['error'])){
		echo $_SESSION['error'];
	}
?>
</body>
</html>
