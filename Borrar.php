<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="Estilos2.css">
    <title>Document</title>
</head>
<body>
<?php
    require_once("crudEstudiante.php");
    require_once("conexion.php");
    $crud = new crudEstudiante();
    $Archivo = $_GET['N'];
    if(isset($_POST["Borrado"]))
    {
        unlink($FicheroImg);
        $crud->eliminar($Archivo);
        header('Location: Formulario.php');
    }
    else
    {
        $Estudiante = $crud->obtenerEstud($Archivo);
        $FicheroImg = $Estudiante->Getfoto();
        //Diseño para mostrar el archivo a eliminar
        echo "<div class='container pt-3'>";
        echo "<fieldset>";
            echo "<div class='container'>";   
                echo "<table class='table table-bordered'>";
                echo "<tr></tr>";
                echo "<tr><th class='border border-danger warning' 
                colspan='2'><div class='alert alert-danger'>
                <strong>Esta seguro de eliminar este archivo? </strong> Pulse eliminar 
                </div>
                </th></tr>";
                echo "<tr><th class='border border-info warning'>Foto</th>
                <th class='border border-info warning'>Información</th></tr>";               
                echo "<tr>";
                echo "<td class='border border-info warning' align='center'>";
                $Img = $Estudiante->Getfoto();                       
                echo "<img src= '$Img' id='ImgView'>";
                echo "</td>";
                echo "<td class='border border-info' align='left'>";
                $Estudiante->imprimir();
                echo "Imagen: ".$Img;
                echo "</tr>";
                echo "<tr>";
                echo "</table>";
                //boton para borrar
                echo "<div class='boton col-auto text-center'><form method='post'>
                <input type='submit' class='form-control btn btn-danger' id='Borrado' value='Eliminar' name='Borrado' style= width:40%;>   
                <a href= 'Formulario.php' onclick='window.close()' type= 'button' class= 'btn btn-secondary' style= width:25%;>Pagina principal</a> 
                </form></div>";
        echo "</fieldset>";
        echo "</div>";
    }
?>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
