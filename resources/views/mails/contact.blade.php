<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Información acerca de Funiber</title>
</head>
<body>
    <p>Estimado usuario {{ $info->names }} {{ $info->lastnames }} con nacionalidad {{ $info->country }} del estado de {{ $info->state }} en la ciudad {{ $info->city }}. Es un gusto para nosotros saludarlo y darle la bienvenida a ser parte del programa {{ $program->program_name }}. A penas tengamos respuesta a su solicitud nos comunicaremos con usted al número {{ $info->phone }}</p>
    <p>Muchas Gracias, ya eres parte de Funiber.</p>
    <span>{{date('Y-m-d')}}</span>
</body>
</html>
