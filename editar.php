<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="Estilos2.css">
    <link rel="stylesheet" href="Estilos.css">
    <title>Editar</title>
</head>
<body>
    <?php
        require_once "ClaseEstudiante.php";
        require_once "crudEstudiante.php";
        $crud = new crudEstudiante();
        $Estudent = new Alumno();
        $Estudent = $crud->obtenerEstud ($_GET['Edit']);
    ?>
    <div class="container" id="div1">
        <div class="row">
            <div class="col-md-12">
                <div class="card" id="Dcard1">
                <h5 id="H5x">Editar</h5>
                    <div class="col-md-12">
                        <div class="card" id="divfinal">
                            <p id="Pcard">
                                <h4>Alumnos</h4>
                                <span style="font-size: 0.9em">Actualice los datos del estudiante:</span>
                            </p>
                            <form action="actualizar.php" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="indice"  value=<?php echo $Estudent->Getnombre();?> >
                                <div class= form-group id="SpanAlumnos">
                                    <label for="email">Correo Electronico</label>
                                    <input type="email" class="form-control" name="correo" id="email" autocomplete="off" placeholder="Ingresa el correo electronico" Value=<?php echo $Estudent->Getcorreo(); ?> required>
                                </div>
                                <div class= "form-group">
                                    <label for="name1">Nombre Completo</label>
                                    <input type="text" class="form-control" maxlength="200" name="nombre" id="name1" autocomplete="off" placeholder="Ingrese su nombre" Value=<?php echo $Estudent->Getnombre();?> required>
                                </div>
                                <div class= "form-group">
                                    <label for="Codigo">N°Carnet</label>
                                    <input type="text" class="form-control" maxlength="10" name="CodeCarnet" id="Codigo" autocomplete="off" placeholder="Ingrese su numero de carnet" Value=<?php echo $Estudent->Getcarnet();?> required>
                                </div>
                                <div class= "form-group">
                                    <label for="Edad">Edad</label>
                                    <input type="number" min="15" max="50" class="form-control" id="Edad" name="Age" autocomplete="off" placeholder="Ingrese su edad" Value=<?php echo $Estudent->Getedad();?> required>
                                </div>
                                    <div class= "form-group">
                                    <label for="Curso">Curso</label>
                                    <input type="number" min="1" max="5" class="form-control" id="Curso" autocomplete="off" placeholder="N°" name="Curse" Value=<?php echo $Estudent->Getcurso();?> required>
                                </div>
                                <div class= "form-group">
                                    <label for="Foto">Foto</label>
                                    <br>
                                    <img src= <?php echo $Estudent->Getfoto(); ?> id='ImgView'>
                                    <br>
                                    <br>
                                    <input type="file" class="form-control-file" id="Foto" name="photo" require accept="image/*" required>
                                </div>
                                <br>
                                <div class= "form-group" id="GroupButton">
                                    <input type="submit" class="form-control btn btn-info" id="Button" name="Actualizar" value="Actualizar">
                                </div>
                            </form>
                        </div>
                    </div>
                    <a href="Formulario.php" id="LinkPagPrincipal">Ir a la página de Inicio</a>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>