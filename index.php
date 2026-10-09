<?php 

    if (isset($_POST['submit'])) 
    { 
        $usuario = $_POST['usuario']; 

        if ($usuario != "") 
        { 
            header("Location: main.php"); 
            exit; 
        } 
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
        Introduce tu nombre:<input type="text" name="nombreUser">
        <button type="submit" name="iniciar"></button>
    </form>
</body>
</html>