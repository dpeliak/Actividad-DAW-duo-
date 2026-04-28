<!DOCTYPE html>
<html>
<head>
<title>Persones</title>
</head>
<body>
<hi>Modificar persona</h1>

<?php
include("connection.php");

//recuperem l'id passat per url
$id = $_GET['ID'];

//preparem consulta per mostrar al formulari les dades guardades a la BD
$sql = "SELECT ID,FirstName,LastName,Address,City FROM Persons WHERE ID = ? ;";
$stmt = $conn->prepare($sql); 
echo "Enlazando statement...";
//el parámetro issss indica que añadimos 5 variables, el primero es entero (i), 
//y los otros 4 son strings (s)
$stmt->bind_param("i", $id);

// Inicializamos variables y ejecutamos
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
	echo "La persona no existeix!";	
} else {
	//llegim la linia de la consulta
	$row = $result->fetch_assoc(); 
	//la pintem al formulari
	?>
	<form action="update_person.php" method="POST">
	  id : <?=$row['ID']?>
	  <input type="hidden" name="ID" value="<?=$row['ID']?>"/><br/>
	  Nom<input type="text" name="nom" value="<?=$row['FirstName']?>"/><br/>
	  Cognom<input type="text" name="cognom" value="<?=$row['LastName']?>"/><br/>
	  Address<input type="text" name="adreca" value="<?=$row['Address']?>"/><br/>
	  Ciutat<input type="text" name="ciutat" value="<?=$row['City']?>"/><br/>
	  <input type="submit" value="modificar" name="updateperson">
	</form>
	<?php		
}
//cerramos los objetos usados:
// $stmt (statement) que se encarga de gestionar las consultas
// $conn (connection) el objeto que representa la conexión con la base de datos
$stmt->close();

$conn->close();
?>
[ <a href="index.php">Inici</a> ]
  </body>
</html>
