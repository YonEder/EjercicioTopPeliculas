<?php

if(isset($_POST['name']) && $_POST['name'] != "")
    {
        setcookie("usuario", $_POST['name'], time() + 86400, "/");
        header("Location: versionCookies.php");
        exit;
    }

    $nombre_guardado = isset($_COOKIE['usuario']) ? $_COOKIE['usuario'] : "";

    if($nombre_guardado)
        {
            echo "<p>Bienvenido $nombre_guardado</p>";
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        Introduce tu nombre <input type="text" name="name" value="">
        <button type="submit" name="submit">Enter</button>
    </form>
</body>
</html>
