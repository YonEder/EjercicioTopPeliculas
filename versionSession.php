<?php

require_once 'Peliculas.php';

session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: indexVersionSession.php");
    exit;
}

$usuario = $_SESSION['usuario'];

// Crear la lista de ese usuario si no existe
if (!isset($_SESSION['peliculasPorUsuario'][$usuario])) {
    $_SESSION['peliculasPorUsuario'][$usuario] = [];
}

// Trabajar directamente con su lista
$peliculas = &$_SESSION['peliculasPorUsuario'][$usuario];

$nombre = "";
$isan = "";
$year = "";
$puntuacion = "1";

//Recibir datos del formulario
if (isset($_POST['submit'])) {

    $nombre = $_POST['nombre'];
    $isan = $_POST['isan'];
    $year = $_POST['year'];
    $puntuacion = $_POST['puntuacion'];

    //Eliminar pelicula
    if ($isan != "" && $nombre == "") {

        for ($i = 0; $i < count($peliculas); $i++) {

            if ($peliculas[$i]->getIsan() == $isan) {
                unset($peliculas[$i]);
                $peliculas = array_values($peliculas);
                break;
            }
        }
    }

    //Actualizar datos o añadir pelicula
    elseif ($nombre != "" && $isan != "" && $year != "" && $puntuacion != "") {

        $encontrada = false;

        for ($i = 0; $i < count($peliculas); $i++) {

            if ($peliculas[$i]->getIsan() == $isan) {

                $peliculas[$i]->nombre = $nombre;
                $peliculas[$i]->year = $year;
                $peliculas[$i]->puntuacion = $puntuacion;

                $encontrada = true;
                break;
            }
        }

        if (!$encontrada) {

            if (preg_match('/^[0-9]{8}$/', $isan)) {

                $pelicula = new Peliculas(
                    $nombre,
                    $isan,
                    $year,
                    $puntuacion
                );

                $peliculas[] = $pelicula;
            }
        }
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

    <h1>TOP PELICULAS</h1>

    <form action="versionSession.php" method="post">

        Nombre:
        <input type="text" name="nombre">

        <br><br>

        ISAN:
        <input type="text" name="isan">

        <br><br>

        Año:
        <input type="text" name="year">

        <br><br>

        Puntuación:
        <select name="puntuacion">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>

        <br><br>

        <button type="submit" name="submit">
            Enviar
        </button>

    </form>

    <h1>Listado de Peliculas</h1>

    <?php

    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>ISAN</th>";
    echo "<th>Año</th>";
    echo "<th>Puntuación</th>";
    echo "</tr>";

    //Mostrar las peliculas si solamente se ha introducido el nombre de la pelicula
    if($isan == "" && $nombre != "")
        {
            for($i = 0; $i < count($peliculas); $i++)
                {
                    if($peliculas[$i]->getNombre() == $nombre)
                        {
                            echo "<tr>";
                            echo "<td>" . $peliculas[$i]->getNombre() . "</td>";
                            echo "<td>" . $peliculas[$i]->getIsan() . "</td>";
                            echo "<td>" . $peliculas[$i]->getYear() . "</td>";
                            echo "<td>" . $peliculas[$i]->getPuntuacion() . "</td>";
                            echo "</tr>";
                        }
                    
                }
        }
    else
        {
            for ($i = 0; $i < count($peliculas); $i++) 
            {
                echo "<tr>";
            echo "<td>" . $peliculas[$i]->getNombre() . "</td>";
            echo "<td>" . $peliculas[$i]->getIsan() . "</td>";
            echo "<td>" . $peliculas[$i]->getYear() . "</td>";
            echo "<td>" . $peliculas[$i]->getPuntuacion() . "</td>";
            echo "</tr>";
            }
        }
    

    echo "</table>";

    ?>

</body>
</html>
