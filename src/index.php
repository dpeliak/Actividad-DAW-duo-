<?php
session_start();
$controller = $_GET['controller'] ?? 'Tareas';
$action     = $_GET['action'] ?? 'index';
$controllerName = $controller . "Controller";

require_once "controllers/" . $controllerName . ".php";

$publicActions = ['login', 'loginProcess'];

if (!isset($_SESSION['usuario']) && !in_array($action, $publicActions)) {
	header("Location: index.php?controller=Auth&action=login");
	exit;
}

$controllerObj = new $controllerName();
$controllerObj->$action();
?>
