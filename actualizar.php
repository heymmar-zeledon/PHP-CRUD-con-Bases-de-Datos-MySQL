<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="Estilos.css">
    <title>Actualizar</title>
</head>
<body>
<?php
    require_once("crudEstudiante.php");
    require_once("ClaseEstudiante.php");
    require_once("conexion.php");

    $crud = new crudEstudiante();
    $Estudiante = new Alumno();
    $Est = $_POST["indice"];
    $Estudent = $crud->obtenerEstud ($Est);
    $LocImg = $Estudent->Getfoto();

    $correo = $_POST["correo"];
    $nombre = $_POST["nombre"];
    $carnet = $_POST["CodeCarnet"];
    $Edad = $_POST["Age"];
    $Curso = $_POST["Curse"];
    $foto = $_FILES["photo"];

    $NombreArchivo = $foto["name"];
    $rutaTemp = $_FILES["photo"]["tmp_name"];
    $rutaServidor = "Imagenes/";
    $extension = pathinfo($NombreArchivo,PATHINFO_EXTENSION);
    $nombreImagen = $_FILES["photo"]["name"] = $nombre.".".$extension;
    $rutaDest = $rutaServidor.$nombreImagen;

    $db = Db::conectar();
    $consultNombres = $db->query("SELECT nombre FROM estudiantes");
    $validar = false;

    foreach($consultNombres as $nombres)
    {
        
        if($nombre == $nombres['nombre'])
        {
            $validar = true;
            break;
        }
        else
        {
            $validar = false;
        }
    }

    if($validar == true)
    {
        //Alerta de que otro alumno existe con el nombre ingresado
        echo "<div class='alert alert-danger'>";
        echo "<strong>Warning!</strong>El nombre del alumno ya existe elija otro nombre diferente.</div>";
        echo "<div class='container-fluid text-center' ><img src= 'tenor.gif' id='GifError'></div>";
        echo "<div class='boton col-auto text-center'>
        <a href= 'editar.php?Edit=$Est' onclick='window.close()' 
        type= 'button' class= 'btn btn-danger' style= width:50%;>Cambiar nombre</a></div>";
    }
    else if($validar == false)
    {
        $crud->eliminar($Est);
        //Cambio de foto
        unlink($LocImg);
        move_uploaded_file($rutaTemp,$rutaDest);

        //actualizando
        $Estudiante->Setcorreo($correo);
        $Estudiante->Setnombre($nombre);
        $Estudiante->Setcarnet($carnet);
        $Estudiante->Setedad($Edad);
        $Estudiante->Setcurso($Curso);
        $Estudiante->Setfoto($rutaDest);
        $crud->insertar($Estudiante);

        //Diseño de la info actualizada del archivo
        echo "<table class='table'>";
        echo "<tr></tr>";
        echo "<tr><th colspan='2'>
            <div class='alert alert-success'>
                <strong>Success!</strong> Archivo Actualizado.</div>
                </th></tr>";
                echo "<tr><th>Foto</th><th>Informacion</th>";
                echo "<tr>";
                echo "<td class='border border-info warning' align='center'>";
                $Img = $Estudiante->Getfoto();
                echo "<img src= '$Img' id='ImagenPreview'>";
                echo "</td>";
                echo "<td class='border border-info' align='left'>";
                $Estudiante->imprimir();
                echo "</tr>";
                echo "</table>";
            echo "</fieldset>";
        echo "</div>";

        //Boton de pagina principal
        echo "<br>";
        echo "<div class='boton col-auto text-center'>";
        echo "<a href= 'Formulario.php' type= 'button' class= 'btn btn-secondary' style= width:25%; >Pagina principal</a>";
        echo "</div>";
    }        
?>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
