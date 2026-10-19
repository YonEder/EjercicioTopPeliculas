<?php
session_start();

if (isset($_POST['guardar'])) {

    $usuario = trim($_POST['user'] ?? '');

    if ($usuario != "") {

        $_SESSION['usuario'] = $usuario;

        if (!isset($_SESSION['peliculasPorUsuario'][$usuario])) {
            $_SESSION['peliculasPorUsuario'][$usuario] = [];
        }

        header("Location: versionSession.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar sesión</title>
</head>
<body>

    <form action="" method="post">
        Introduce tu nombre:
        <input type="text" name="user" required>
        <button type="submit" name="guardar">Entrar</button>
    </form>

</body>
</html>