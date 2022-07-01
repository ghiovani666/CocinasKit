  
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tu Cocina Kit</title>
</head>
<body>
    <h2>Informacion del correo</h2>
    <ul>
        <li>{{ $info["txt_nombre"] }}</li>
        <li>{{ $info["txt_email"] }}</li>
        <li>{{ $info["txt_telefono"] }}</li>
        <li>{{ $info["txt_asunto"] }}</li>
        <li>{{ $info["txt_descripcion"] }}</li>
    </ul>
</body>
</html>