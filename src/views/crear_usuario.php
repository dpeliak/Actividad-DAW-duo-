<html>
<head> 
	<title>Crear un usuario</title>
</head>
<body>
<form action="index.php?controller=Usuarios&action=create" method="POST">
	Nombre del usuario: <input type="text" name="usuario"/> <br/>
	Contrasela del usuario: <input type="password" name="password"/> <br/>
	Rol:	<select name="rol">
			<option value="admin">admin</option>
			<option value="user">user</option>
			<option value="observador">observador</option>
			<option value="supervisor">supervisor</option>
		</select> <br/> <br/>
	<button>Crear Usuario</button>
</form>
</body>
</html>
