<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
</head>
<body>
    <h1>Information</h1>
    <h4>Name: </h4><p>{{ $e->name }}</p>
    <h4>Lastname: </h4><p>{{ $e->lastname }}</p>
    <h4>Email: </h4><p>{{ $e->email }}</p>
    <h4>Phone: </h4><p>{{ $e->phone }}</p>
    <h4>Comments: </h4><p>{{ $e->comments }}</p>
    <h4>Country of residence: </h4><p>{{ $e->country->name }}</p>
    <h4>State: </h4><p>{{ $e->state->name }}</p>
    <h4>City: </h4><p>{{ $e->city->name }}</p>
    <h4>Knowledge Areas: </h4><p>{{ $e->area->name }}</p>
    <h4>Program: </h4><p>{{ $e->program->name }}</p>
</body>
</html>