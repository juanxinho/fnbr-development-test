La resolución se encuentra en la branch master
Prueba FUNIBER realizada (Kevin Andrade)

Esta prueba se realizo, para el backend, se utilizó Node.js con la base de datos MongoDB
Para el frontend se utilizó React.js

Para ejecutar el programa por Docker Compose se debe realizar lo siguiente

1. Clonar este repositorio

2. Crear un archivo llamado .env en la raíz de la carpeta backend con las siguientes variables:
  #Conexión a la Base de Datos

    MONGODB_URI= (Pueden utilizar la mia la cual se las dejare debajo o pueden crean una en mongoDB Atlas)
    "mongodb+srv://kevin-dev:MongoDB2550@cluster0.bvvohhj
                      +
    .mongodb.net/mailDB?retryWrites=true&w=majority"
    (por razones de seguridad divido la URI en 2, para usarla en el proyecto solo borren el signo +, unan ambas partes en una sola linea y sin espacios
    PORT=4000

    #Email Settings
    EMAIL_HOST = "smtp.sendgrid.net"
    EMAIL_PORT = 587
    
    API_KEY = (Deben hacer lo mismo en esta caso para poder enviar el formulario via email aun email de verdad, unir ambas partes de key dejadas abajo; 
    borrar el signo +, en una solo linea y sin espacios y colocar aquí)
    "SG.LRJ2Pk-8T7a8Yk12oDhlfQ.OscFH-
                  +
    c9cZpbx48yXgUXAsVXpNraIGeYr3AD8UcgGsM"
    SENDER_EMAIL = 'kd.andrade25@gmail.com'
    

3. En la raiz del proyecto ejecutar el comando docker-compose up, cual deberá correr los dockerfile, instalar dependencias y ejecutar el programa

-------------------------------------------------------------------------------------------------------------------------------------------------

Para ejecuta el programa sin docker-compose

1. Clonar el repositorio

2. Realizar el paso 2 anterior sobre las variables de entorno

3. Abrir dos terminales una situada en la raiz de la carpeta backend y otra en la raíz de la carpeta frontend.

4. En ambos terminales escribir el comando npm install

5. En el terminal de backend escribir el comando npm start

6. En el terminal de frontend escribir el comando npm run start


Gracias por su consideración
