# config spring boot y angular en local

Para ejectuar el proyecto de manera local es necesario las siguientes variables de entorno.
para angular hay que ingresar usar npm install, add @angular/materil y npm install sweetalert2

Para que spring boot funcione correctamente con la base de datos local hay que cambiar la contraseña en la siguiente linea spring.datasource.password= 2311 que esta en el properties por la contraseña de la base local y ejecutar el init.script en la base de datos, contienen la información de los paises-estados-ciudades  

pueden ver la documentacion del backend con la ruta http://localhost:8080/swagger-ui/index.html#

# config docker:
Para usar postgres, angular y spring boot con docker hay que usar el dockerfile y docker-compose.yml que se encuentra en los archivos 

# spring boot y postgres
  
  DATABASE_URL=jdbc:postgresql://java_db:5432/postgres
  DATABASE_USERNAME=postgres
  DATABASE_PASSWORD=postgres

Se reemplaza la configuracion local en el application.properties por la de docker

# angular
las variables de entorno de angular se encuentran dentro del proyecto, estas variables dependen de que spring boot se inicie 

# mail
si se desea cambiar el correo que envia la informacion los cambios se hacen en el application.properties de spring boot