<?php

require_once 'Peliculas.php';

$peliculas = [];

//Recuperar Peliculas del hidden
if(isset($_POST['peliculas']) && isset($_POST['peliculas']) != "")
{
    $textoPeliculas = $_POST['peliculas'];
    $datosPeliculas = explode(";", $textoPeliculas);

    for($i = 0; $i < count($datosPeliculas); $i++)
        {
            $datos = explode(",", $datosPeliculas[$i]);
            
            $pelicula = new Peliculas(
                $datos[0],
                $datos[1],
                $datos[2],
                $datos[3]
            );

            $peliculas[] = $pelicula;
        }
}

//Recivir datos del formulario
if(isset($_POST['submit']))
    {
        $nombre = $_POST['nombre'];
        $isan = $_POST['isan'];
        $year = $_POST['year'];
        $puntuacion = $_POST['puntuacion'];

        $pelicula = new Peliculas($nombre, $isan, $year, $puntuacion);

        $peliculas[] = $pelicula;
    }
    else
        {
            echo "Todavia no hay ninguna pelicula";
        }

//Convertir el array en texto
    $textoPeliculas = "";

    for($i = 0; $i< count($peliculas); $i++)
        {
            if($i > 0)
            {
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

    <input type="hidden" name="peliculas" value="<?php echo $textoPeliculas; ?>">

</form>
</body>
</html>