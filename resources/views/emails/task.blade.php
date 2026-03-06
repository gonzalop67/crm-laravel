<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva tarea</title>
</head>

<body>
    <h3>Tienes una nueva tarea asignada</h3>
    <p>Detalles de la tarea:</p>
    <ul>
        <li>Título: {{ $task->title }}</li>
        <li>Descripción: {{ $task->description }}</li>
        <li>Fecha de vencimiento: {{ $task->due_date }}</li>
    </ul>

    -----

    <p>CRM Lite</p>
</body>

</html>
