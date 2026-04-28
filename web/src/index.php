<!DOCTYPE html>
<html>
<head>
<title>Persones</title>
</head>
<body>
<hi>Llistat persones</h1>
<?php
include("connection.php");

$sql = "SELECT ID,FirstName,LastName,Address,City FROM Persons;";
$stmt = $conn->prepare($sql); 
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0){
	echo "La taula està buida!";	
} else {
	echo "<ul>";
	while ($row = $result->fetch_assoc()) {
    		echo "<li>".$row['ID']." ".$row['FirstName']." ".$row['LastName']." ".$row['Address']." ".$row['City']." [ <a href='f_update_person.php?ID=".$row['ID']."'>Modificar</a> ] [ <a href='delete_person.php?ID=".$row['ID']."'>Borrar</a> ]</li><br/>";
	}
	echo "</ul>";
}


//cerramos los objetos usados:
// $stmt (statement) que se encarga de gestionar las consultas
// $conn (connection) el objeto que representa la conexión con la base de datos
$stmt->close();

$conn->close();
?>
[ <a href="f_add_person.php">Afegir persona</a> ]
  </body>
</html>
