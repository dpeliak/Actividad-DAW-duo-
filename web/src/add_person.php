<!DOCTYPE html>
<html>
<head>
<title>Persones</title>
</head>
<body>
<hi>Afegir nova persona</h1>
<?php
include("connection.php");

//recuperamos parámetros del formulario
$id = $_POST['id'];
$firstname = $_POST['nom'];
$lastname = $_POST['cognom'];
$address = $_POST['adreca'];
$city = $_POST['ciutat'];

// Preparamos la consulta y declaramos enlace con las variables
echo "Preparando statement...";
try {
$stmt = $conn->prepare("INSERT INTO Persons (ID, FirstName, LastName, Address, City) VALUES (?, ?, ?, ?, ?)");
} catch(Exception $e) {
  echo $e->getMessage();
}

echo "Enlazando statement...";
//el parámetro issss indica que añadimos 5 variables, el primero es entero (i), 
//y los otros 4 son strings (s)
$stmt->bind_param("issss", $id, $firstname, $lastname, $address, $ciutat);

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
