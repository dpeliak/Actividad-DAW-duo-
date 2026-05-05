# Aplicación de Tarea

<img width="704" height="418" alt="image" src="https://github.com/user-attachments/assets/d21f2d76-94ad-4019-9dfe-aae873834204" />

## Descripción

Esta aplicación gestiona tareas, permisos y usuarios. En nuestra aplicacion tendran varios valores como si esta en proceso, comenzada o finalizada, cada tarea tiene una fecha y esta asignada a un usuario.
Por otra parte en los permisos podremos decidir que cosas puede hacer dependiendo de su rol, por ejemplo un usuario con rol admin puede eliminar tareas, crear usuarios mientras un usuario con el rol observador no lo podra hacer.

### Guia de instalación
Para poder ejecutrar esta aplicación primero deberas copiar este repositorio a una carpeta, una vez copiado tendremos que ejecutar el siguiente comando:
```
  $ docker-compose up -d --build
```

<img width="1470" height="118" alt="image" src="https://github.com/user-attachments/assets/6f193a06-94ab-4868-9ce4-3b68cf921d95" />

### Scripts Usuarios

Una vez ejecutado este comando podremos observar en nuestra terminal como se construyen los contenedores atraves del docker-compose. Cuando se finalize la instalación abriremos una página web y pondremos esta dirección en la 
URL: [localhost:9999](url), para poder entrar a la aplicación deberemos de ejecturar un script para crear el primer usuario, pondremos en el navegador la siguiente web: [localhost:9999/admin.php](url)
Cuando hayamos ejecutado el script podremos entrar a aplicación con el cual tendremos todos los permisos y podremos crear otros usuarios si así lo queremos:
 - Usuario: admin
 - Contreaseña: admin
