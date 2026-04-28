<!DOCTYPE html>
<html>
<head>
<title>Persones</title>
</head>
<body>
<hi>Actualitzar persona</h1>
<?php
include("connection.php");

//recuperamos parámetros del formulario
$id =  $_POST['ID'];
$firstname = $_POST['nom'];
$lastname = $_POST['cognom'];
$address = $_POST['adreca'];
$city = $_POST['ciutat'];

// Preparamos la consulta y declaramos enlace con las variables
echo "Preparando statement...";
try {
$stmt = $conn->prepare("UPDATE Persons SET FirstName = ? , LastName = ? , Address = ? , City = ?  WHERE ID = ?;");
} catch(Exception $e) {
  echo $e->getMessage();
}

echo "Enlazando statement...";
$stmt->bind_param("ssssi", $firstname, $lastname, $address, $city, $id);

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
