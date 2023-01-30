<?php
//INSERT INTO `courses` (`id`, `coursename`) VALUES (NULL, '');
include_once '../configuraciones/bbdd.php';
$conexionBD=BD::crearInstancia();

$id=isset($_POST ['id'])?$_POST['id']:'';
$coursename=isset($_POST['coursename'])?$_POST['coursename']:'';
$action=isset($_POST['action'])?$_POST['action']:'';

//print_r($_POST);

if($action!=''){
    switch($action){

        case 'create':
            $sql="INSERT INTO courses (id, coursename) VALUES (NULL, :coursename)";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':coursename', $coursename);
            $consulta->execute();
        
        break;
        case 'update':
            $sql="UPDATE courses SET coursename=:coursename WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->bindParam(':coursename', $coursename);
            $consulta->execute();

            //echo $sql;
        break;
        case 'delete':
            $sql="DELETE FROM courses WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
        break;
        case "Select":
            $sql="SELECT * FROM courses WHERE id=:id";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':id', $id);
            $consulta->execute();
            $course=$consulta->fetch(PDO::FETCH_ASSOC);
            $coursename=$course['coursename'];
        break;
}
}

echo $coursename;

$consulta=$conexionBD->prepare("SELECT * FROM courses");
$consulta->execute();
$listcourses=$consulta->fetchAll();


?>