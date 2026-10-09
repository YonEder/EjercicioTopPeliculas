```php
<?php

require_once 'Peliculas.php';

$peliculas = [];
$nombre = "";
$isan = "";
$year = "";
$puntuacion = "1";

//Recuperar Peliculas del hidden
if (isset($_POST['peliculas']) && $_POST['peliculas'] != "") {

    $textoPeliculas = $_POST['peliculas'];
    $datosPeliculas = explode(";", $textoPeliculas);

    for ($i = 0; $i < count($datosPeliculas); $i++) {

        $datos = explode(",", $datosPeliculas[$i]);

        if (count($datos) == 4) {
            $pelicula = new Peliculas(
                $datos[0],
                $datos[1],
                $datos[2],
                $datos[3]
            );

            $peliculas[] = $pelicula;
        }
    }
}

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

//Convertir el array en texto
$textoPeliculas = "";

for ($i = 0; $i < count($peliculas); $i++) {

    if ($i > 0) {
        $textoPeliculas .= ";";
    }

    $textoPeliculas .= $peliculas[$i]->getNombre();
    $textoPeliculas .= ",";
    $textoPeliculas .= $peliculas[$i]->getIsan();
    $textoPeliculas .= ",";
    $textoPeliculas .= $peliculas[$i]->getYear();
    $textoPeliculas .= ",";
    $textoPeliculas .= $peliculas[$i]->getPuntuacion();
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

    <form action="main.php" method="post">

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

        <input type="hidden" name="peliculas" value="<?php echo htmlspecialchars($textoPeliculas, ENT_QUOTES, 'UTF-8'); ?>">

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

    for ($i = 0; $i < count($peliculas); $i++) {

        echo "<tr>";
        echo "<td>" . $peliculas[$i]->getNombre() . "</td>";
        echo "<td>" . $peliculas[$i]->getIsan() . "</td>";
        echo "<td>" . $peliculas[$i]->getYear() . "</td>";
        echo "<td>" . $peliculas[$i]->getPuntuacion() . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    ?>

</body>
</html>
