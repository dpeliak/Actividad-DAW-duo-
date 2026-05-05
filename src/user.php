<?php
require_once './models/db.php'; 
$db = conectar(); 
$passwordObservador = password_hash('observador123', PASSWORD_DEFAULT); 
$sql = "INSERT INTO usuarios (usuario, password, rol) VALUES ('observador', :password, 'observador')"; 

$stmt = $db->prepare($sql);
$stmt->execute([':password' => $passwordObservador]);
$stmt = null; 

echo "Creado con existo";
exit;
?>

