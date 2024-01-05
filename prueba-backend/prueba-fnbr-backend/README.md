# fnbr-backend

## Notas para el correcto funcionamiento
```
Primero correr las migraciones: 
    - docker exec -it candidate_evaluation bash
    - php artisan migrate
```

```
Segundo correr el seeder: 
    - docker exec -it candidate_evaluation bash
    - php artisan db:seed
```

```
Tercero importar los registros de las tablas countries, states y cities: 
    - phpmyadmin-> usuario: root --- password: root
    - archivo de registros de la tabla countries -> countries.sql
    - archivo de registros de la tabla states -> states.sql
    - archivo de registros de la tabla cities -> cities.sql / Desactivar la opcion Habilite la revision de las claves foraneas
```
