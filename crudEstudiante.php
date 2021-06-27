<?php
    require_once("conexion.php");
    require_once("ClaseEstudiante.php");

    class crudEstudiante
    {
        public function __construct(){}

        //Insertar
        public function Insertar($Estudiante)
        {
            $db = Db::conectar();
            $Correo = $Estudiante->Getcorreo();
            $Nombre = $Estudiante->Getnombre();
            $carnet = $Estudiante->Getcarnet();
            $Edad = $Estudiante->Getedad();
            $Curso = $Estudiante->Getcurso();
            $Foto = $Estudiante->Getfoto();
            $insert = $db->prepare("INSERT INTO estudiantes(correo,nombre,carnet,edad,curso,foto)
            values(:correo,:nombre,:carnet,:edad,:curso,:foto)");
            $insert->bindparam(':correo',$Correo,PDO::PARAM_STR);
            $insert->bindparam(':nombre',$Nombre,PDO::PARAM_STR);
            $insert->bindparam(':carnet',$carnet,PDO::PARAM_STR);
            $insert->bindparam(':edad',$Edad,PDO::PARAM_INT);
            $insert->bindparam(':curso',$Curso,PDO::PARAM_INT);
            $insert->bindparam(':foto',$Foto,PDO::PARAM_STR);
            $insert->execute();
        }
        public function Mostrar()
        {
            $db = Db::conectar();
            $ListarEstudiantes=[];
            $select = $db->query('SELECT * FROM estudiantes');

            foreach($select->fetchAll() as $Estudent)
            {
                $myestudent = new Alumno();
                $myestudent->Setcorreo($Estudent['correo']);
                $myestudent->Setnombre($Estudent['nombre']);
                $myestudent->Setcarnet($Estudent['carnet']);
                $myestudent->Setedad($Estudent['edad']);
                $myestudent->Setcurso($Estudent['curso']);
                $myestudent->Setfoto($Estudent['foto']);
                $ListarEstudiantes[]=$myestudent;
            }
            return $ListarEstudiantes;
        }

        public function obtenerEstud($nombre)
        {
            $db = Db::conectar();
            $select = $db->prepare('SELECT * FROM estudiantes WHERE NOMBRE=:nombre');
            $select->bindValue('nombre',$nombre);
            $select->execute();
            $Estudent = $select->fetch();
            $myestudentt = new Alumno();
            $myestudentt->Setcorreo($Estudent['correo']);
            $myestudentt->Setnombre($Estudent['nombre']);
            $myestudentt->Setcarnet($Estudent['carnet']);          
            $myestudentt->Setedad($Estudent['edad']);
            $myestudentt->Setcurso($Estudent['curso']);
            $myestudentt->Setfoto($Estudent['foto']);
            return $myestudentt;
        }

        public function eliminar($nombre)
        {
            $db = Db::conectar();
            $eliminar = $db->prepare('DELETE FROM estudiantes WHERE NOMBRE=:nombre');
            $eliminar->bindValue('nombre',$nombre);
            $eliminar->execute(); 
        }
        

        /*public function actualizar($Estudiante)
        {
            $db = Db::conectar();
            $Correo = $Estudiante->Getcorreo();
            $Nombre = $Estudiante->Getnombre();
            $carnet = $Estudiante->Getcarnet();
            $Edad = $Estudiante->Getedad();
            $Curso = $Estudiante->Getcurso();
            $Foto = $Estudiante->Getfoto();
            $actualizar = $db->prepare('UPDATE estudiantes SET correo=:correo,carnet=:carnet,edad=:edad,
            curso=:curso,foto=:foto WHERE Nombre=:nombre');
            $actualizar->bindValue(':correo',$Correo,PDO::PARAM_STR);
            $actualizar->bindValue(':nombre',$Nombre,PDO::PARAM_STR);
            $actualizar->bindValue(':carnet',$carnet,PDO::PARAM_STR);
            $actualizar->bindValue(':edad',$Edad,PDO::PARAM_INT);
            $actualizar->bindValue(':curso',$Curso,PDO::PARAM_INT);
            $actualizar->bindValue(':foto',$Foto,PDO::PARAM_STR);
            $actualizar->execute();
        }*/
    }
?>