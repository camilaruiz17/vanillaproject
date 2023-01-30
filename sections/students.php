<?php

include_once '../configuraciones/bbdd.php';
$conexionBD=BD::crearInstancia();

$id=isset($_POST ['id'])?$_POST['id']:'';
$name=isset($_POST ['name'])?$_POST['name']:'';
$lastname=isset($_POST ['lastname'])?$_POST['lastname']:'';
$email=isset($_POST ['email'])?$_POST['email']:'';
$image=isset($_POST ['image'])?$_POST['image']:'';

$courses=isset($_POST ['courses'])?$_POST['courses']:'';
$action=isset($_POST['action'])?$_POST['action']:'';

if($action!=""){
    switch ($action){
        case 'create':
            $sql="INSERT INTO students (id, name, lastname, email, image) VALUES (NULL, :name, :lastname, :email, :image)";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':name', $name);
            $consulta->bindParam(':lastname', $lastname);
            $consulta->bindParam(':email', $email);
            $consulta->bindParam(':image', $image);
            $consulta->execute();

            $idStudent=$conexionBD->lastInsertId();

        foreach($courses as $course){
            $sql="INSERT INTO courses_students (id, idcourse, idstudent,) VALUES (NULL, :courses_students, :idcourse)";
            $consulta=$conexionBD->prepare($sql);
            $consulta->bindParam(':idstudent', $idstudent);
            $consulta->bindParam(':idcourse', $course);
            $consulta->execute();
                }
        break;
            }
        
                }

$sql="SELECT * FROM students";
$listStudents=$conexionBD->query($sql);
$students=$listStudents->fetchAll();

foreach($students as $clave => $student){
    $sql="SELECT * FROM courses WHERE id IN(SELECT idcourse FROM courses_students WHERE idstudent=:idstudent)";
    
    $consulta=$conexionBD->prepare($sql);
    $consulta->bindParam(':idstudent', $student['id']);
    $consulta->execute();
    $studentcourses=$consulta->fetchAll();
    $students[$clave]['courses']=$studentcourses;
}

$sql="SELECT * FROM courses";
$listCourses=$conexionBD->query($sql);
$courses=$listCourses->fetchAll();

print_r($courses);


?>