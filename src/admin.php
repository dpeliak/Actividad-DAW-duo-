<?php
require_once './models/db.php'; 
$db = conectar(); 
$passwordObservador = password_hash('admin', PASSWORD_DEFAULT); 
$sql = "INSERT INTO usuarios (usuario, password, rol) VALUES ('admin', :password, 'admin')"; 

$stmt = $db->prepare($sql);
$stmt->execute([':password' => $passwordObservador]);
$stmt = null; 

echo "Creado con existo";
exit;
?>
