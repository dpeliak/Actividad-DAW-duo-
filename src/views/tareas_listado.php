<html>
<head>
	<title>MVC</title>
</head>
<body>
<h1>Lista de tareas - mpilligua@institutmvm.cat</h1>
<form method="POST" action="index.php?controller=Auth&action=logout">
	<button>Logout</button>
</form>
<ul>
<?php foreach ($tareas as $t): ?>
	<li>
    	<?= htmlspecialchars($t->texto) ?>  
    	(<?= $t->estado ?> – <?= $t->tema ?>)
    	<a href="index.php?controller=Tareas&action=eliminar&id=<?= $t->id ?>"
onclick="return confirm('¿Seguro que quieres borrar esta tarea?')">
   Eliminar
</a>
<a href="index.php?controller=Tareas&action=ver&id=<?= $t->id ?>"> Ver Tarea</a>
</a>
<a href="index.php?controller=Tareas&action=editar_form&id=<?= $t->id ?>"> Editar Tarea</a>
	</li>
<?php endforeach; ?>

</ul>
<?php if (!empty($_SESSION['mensaje'])): ?>
	<p class="ok"><?= $_SESSION['mensaje'] ?></p>
	<?php unset($_SESSION['mensaje']); ?>
<?php endif; ?>

<?php if (!empty($_SESSION['error'])): ?>
	<p class="error"><?= $_SESSION['error'] ?></p>
	<?php unset($_SESSION['error']); ?>
<?php endif; ?>
<a href="index.php?controller=Tareas&action=crear">
	Crear nueva tarea
</a> <br/>
<a href="index.php?controller=Usuarios&action=create">
	Crear un usuario
</a> <br/>
<a href="index.php?controller=Tareas&action=estado">
	Cambia las tareas de iniciada a finalizada
</a> <br/>
<form>
	Filtrar: <select name="autor">
	<?php foreach ($tareas as $t): ?>
    		<a href="index.php?controller=Tareas&action=filtrar&autor=<?= $t->autor?>">
    		<option><?php echo $t->autor;?></option>  
    		</a>
    	<?php endforeach; ?>
    	</select>
    	<button>filtrar</button>
    	</form>
</body>
</html>
