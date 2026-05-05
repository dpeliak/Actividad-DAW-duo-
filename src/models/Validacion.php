<?php

class Validacion {

    public static function validarTarea($datos) {
        $errores = [];

        if (empty($datos['texto']) || trim($datos['texto']) === '') {
            $errores[] = "El texto es obligatorio";
        }

        if (empty($datos['tema']) || trim($datos['tema']) === '') {
            $errores[] = "El tema es obligatorio";
        }

        if (!in_array($datos['estado'], ['pendiente', 'iniciada', 'finalizada'])) {
            $errores[] = "Estado no válido";
        }

        if (empty($datos['fecha_limite'])) {
            $errores[] = "La fecha límite es obligatoria";
        } else {
            $fecha = DateTime::createFromFormat('Y-m-d', $datos['fecha_limite']);
            if (!$fecha || $fecha->format('Y-m-d') !== $datos['fecha_limite']) {
                $errores[] = "El formato de fecha debe ser AAAA-MM-DD";
            }
        }
        if (empty($datos['prioridad'])){
		$errores[] = "Debe de introducir la prioridad";        
        }

        return $errores;
    }
}



