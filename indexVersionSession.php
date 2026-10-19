<?php

    session_start();

    if(isset($_POST['guardar']))
        {
            $_SESSION = $_POST['user'];
            header("Location: versionSession.php");
            exit;
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
    <form action="" method="post">
        Introduce tu nombre <input type="text" name="user">
        <button type="submit" name="guardar">Enter</button>
    </form>    
</body>
</html>