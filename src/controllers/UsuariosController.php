<?php
require_once "models/UsuariosModel.php";
require_once "core/ACL.php";

class UsuariosController {

    public function create() { 
//**
      if (!ACL::puede('usuarios.usuario')) {
         $_SESSION['error'] = "No tienes permisos para crear usuarios";
       	header("Location: index.php");
         exit;
     }

        if (!empty($_POST)) {
            $usuario  = $_POST["usuario"];
            $password = $_POST["password"];
            $rol      = $_POST["rol"];
            
            $UsuariosModel = new UsuariosModel();
            $UsuariosModel->crearuser($usuario, $password, $rol);

            header("Location: index.php?controller=Usuarios&action=create");
            exit;
        }

        require "views/crear_usuario.php";
    }
}

