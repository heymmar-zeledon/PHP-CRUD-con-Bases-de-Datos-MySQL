<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="Estilos.css">
    <title>Procesando Archivos</title>
</head>
<body>
<?php
    //Validacion del formulario
    echo "<div class='alert alert-success'>";
    echo "<strong>Success!</strong> !Formulario Validado correctamente .</div>";

    require_once("crudEstudiante.php");
    require_once("ClaseEstudiante.php");
    require_once("conexion.php");

    $crud = new crudEstudiante();
    $Estudiante = new Alumno();
    
    //obteniendo los datos del formulario
    $Estudiante->Setcorreo($_POST["correo"]);
    $Estudiante->Setnombre($_POST["nombre"]);
    $Estudiante->Setcarnet($_POST["CodeCarnet"]);
    $Estudiante->Setedad($_POST["Age"]);
    $Estudiante->Setcurso($_POST["Curse"]);
    $foto = $_FILES["photo"];
    $nombre = $_POST["nombre"];

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
    if($validar == false)
    {
        $Estudiante->Setfoto($rutaDest);
        $crud->Insertar($Estudiante);
    
        //Registrar la foto
        move_uploaded_file($rutaTemp,$rutaDest);

        //Guardado correcto
        echo "<div class='alert alert-success'>";
        echo "<strong>Success!</strong> Guardado Correctamente.</div>";
        echo "<div class='container pt-3'>";
        echo "<fieldset>";
            echo "<div class='container text-center' style='padding-top: 25px'>";   
                echo "<table class='table'>";
                echo "<tr></tr>";
                echo "<tr><th colspan='2'>Archivo Guardado</th></tr>";
                echo "<tr><th>Foto</th><th>Informacion</th>";
                echo "<tr>";
                echo "<td class='border border-info warning' align='center'>";
                echo "<img src= '$rutaDest' id='ImagenPreview'>";
                echo "</td>";
                echo "<td class='border border-info' align='left'>";
                $Estudiante->imprimir();
                echo "</tr>";
                echo "</table>";
                echo "</div>";
                echo "</fieldset>";
            echo "</div>";
        echo "<div class='boton col-auto text-center'><a href= 'Formulario.php' onclick='window.close ()' type= 'button' class= 'btn btn-info' style= width:50%;>Regresar</a></div>";
    }
    if($validar == true)
    {
        echo "<div class='alert alert-danger'>";
        echo "<strong>Warning!</strong>El nombre del alumno ya existe introduzca otro nombre.</div>";
        echo "<div class='container-fluid text-center' ><img src= 'tenor.gif' id='GifError'></div>";
        echo "<div class='boton col-auto text-center'>
        <a href= 'Formulario.php' onclick='window.close()' 
        type= 'button' class= 'btn btn-danger' style= width:50%;>Cambiar nombre</a></div>";
    }
?>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
