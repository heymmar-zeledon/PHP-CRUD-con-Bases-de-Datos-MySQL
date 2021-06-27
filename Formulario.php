<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="Estilos.css">
    <title>Registro</title>
</head>
<body>
    <div class="container text-center bg-info text-white">
        <p><h3>Práctica</h3></p>
        <p><h3>Procesamiento de formularios</h3></p>
    </div>
    <div class="row" id="F">
        <div class ="col-md-6 bg-info">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-header" id="headingOne">
                        <h2 class="mb-0" id="div1">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Formulario Alumnos
                            </button>
                        </h2>
                    </div>
                    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                        <div class="card-body" id=FormEstudiante>
                            <h5>Alumnos</h5><span id="SpanAlumnos">Llene el formulario con los datos del estudiante:</span></p>
                            <form action="procesar.php" method="post" enctype="multipart/form-data" target="_blank">
                            <div class= form-group id="SpanAlumnos">
                                <label for="email">Correo Electronico</label>
                                <input type="email" class="form-control" name="correo" id="email" autocomplete="off" placeholder="Ingresa el correo electronico" required>
                            </div>
                            <div class= "form-group">
                                <label for="name1">Nombre Completo</label>
                                <input type="text" class="form-control" maxlength="200" name="nombre" id="name1" autocomplete="off" placeholder="Ingrese su nombre" required>
                            </div>
                            <div class= "form-group">
                                <label for="Codigo">N°Carnet</label>
                                <input type="text" class="form-control" maxlength="10" name="CodeCarnet" id="Codigo" autocomplete="off" placeholder="Ingrese su numero de carnet" required>
                            </div>
                            <div class= "form-group">
                                <label for="Edad">Edad</label>
                                <input type="number" min="15" max="50" class="form-control" id="Edad" name="Age" autocomplete="off" placeholder="Ingrese su edad" required>
                            </div>
                            <div class= "form-group">
                                <label for="Curso">Curso</label>
                                <input type="number" min="1" max="5" class="form-control" id="Curso" autocomplete="off" placeholder="N°" name="Curse" required>
                            </div>
                            <div class= "form-group">
                                <label for="Foto">Foto</label>
                                <input type="file" class="form-control-file" id="Foto" name="photo" require accept="image/*" required>
                            </div>
                            <br>
                            <div class= "form-group" id="GroupButton">
                                <input type="submit" class="form-control btn btn-success" id="Button" name="Enviar">
                                <br>
                                <br>
                                <input type="reset" class="btn btn-danger">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header" id="headingTwo">
                        <h2 class="mb-0">
                            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Listado de Alumnos
                            </button>
                        </h2>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class='boton col-auto text-center'>
                                <a href= 'Listar.php' type= 'button' class= 'btn btn-info' style= width:50%;>Listar Alumnos</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>