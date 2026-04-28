<!DOCTYPE html>
<html>
<head>
<title>Persones</title>
</head>
<body>
<hi>Borrar persona</h1>

<?php
include("connection.php");

//recuperem l'id passat per url
$id = $_GET['ID'];

//preparem consulta per mostrar al formulari les dades guardades a la BD
$sql = "DELETE FROM Persons WHERE ID = ? ;";
$stmt = $conn->prepare($sql); 
echo "Enlazando statement...";
//el parámetro i indica que añadimos 1 variable de tipo entero

$stmt->bind_param("i", $id);

// Inicializamos variables y ejecutamos
$stmt->execute();

echo "Parece que todo fue bien ;-)";

//cerramos los objetos usados:
// $stmt (statement) que se encarga de gestionar las consultas
// $conn (connection) el objeto que representa la conexión con la base de datos
$stmt->close();

$conn->close();
?> 
</form>
[ <a href="index.php">Inici</a> ]
  </body>
</html>
