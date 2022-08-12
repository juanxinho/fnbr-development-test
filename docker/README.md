# BACKEND PARA EL FORMULARIO

Este proyecto fue realizado utilizando nodejs junto con express y demas dependencias para su correcto funcionamineto.

## indicaciones 
Para ejecutar el backend se puede realizar de dos formas,en un entorno local o en docker. Para cualquiera de las dos formas se precisa de configurar las variabes de entorno de los archivos .env
### pasos entorno local 
1. cree una base de datos con phpmyadmin con el nombre de funiber y corra el `init.sql` que se encuentra dendro de la carpeta `db`
2. renombrar de la raiz `.env.example` por `.env` 
3. renombrar  del directorio `/docker` el archivo `.env.example` por `.env` ,
de este archivo configurar las varibles `MAILTRAP_USER` y `MAILTRAP_PASS` 
4. dirijase al directorio `/docker` y ejecute `npm install`
5. ejecute `npm run dev`
6.  si todo esra correcto el servidor se habra levantado en el puerto 8080
7. abrir `localhost:8080/api/cliente` y listara los registros en la base de datos

### pasos entorno docker 
1. renombrar `.env.example` por `.env` de la raiz
2. renombrar `.env.example` por `.env` del directorio `docker`,
de este archivo configurar las varibles `MAILTRAP_USER` y `MAILTRAP_PASS` 
3. ejecutar `docker-compose up` y si todo salio bien el servidor estara levantado en el puerto 4000, en caso de que se presente algun error,  ejecutar `docker-compose down --rmi all` y volver a correro `docker-compose down --rmi all`
4. abrir `localhost:4000/api/cliente` y listara los registros en la base de datos

# FRONT-END  FORMULARIO
el frontend de este proyecto fue realizado en angular y se encuentra en el siguiente repositorio:
`https://github.com/cristopher003/funiberForm`
### pasos ejecucion front-end
1. clonar el repsositorio
2. intalar los modulos de node `npm install`
3. correr el servidor `ng serve -o`
4. se abrira en el navegador la ruta `http://localhost:4200/` con el formulario.
5. llene todos los campos del formulario y de clic en enviar, esto guardara los datos en la base, puede consultar si esto es correcto llamando a la ruta `localhost:8080/api/cliente` en el servidor local o en docker `localhost:4000/api/cliente`.

Gracias por considerarme en su procedo de selección.
