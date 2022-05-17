<?php
    $txtId = (isset($_POST['txtId'])) ? $_POST['txtId'] : "";
    $txtNombre = (isset($_POST['txtNombre'])) ? $_POST['txtNombre'] : "";
    $txtDescripcion = (isset($_POST['txtDescripcion'])) ? $_POST['txtDescripcion'] : "";
    $txtLugar = (isset($_POST['txtLugar'])) ? $_POST['txtLugar'] : "";
    $txtFecha = (isset($_POST['txtFecha'])) ? $_POST['txtFecha'] : "";
    $txtFoto = (isset($_FILES["txtFoto"]["name"])) ? $_FILES["txtFoto"]["name"] : "";

    $accion = (isset($_POST['accion'])) ? $_POST['accion'] : "";

    $error = array();

    $accionAgregar = "";
    
    $accionModificar = $accionEliminar = $accionCancelar = "disabled";
    $mostrarModal = false;

    include("bd/conexion.php");

    switch($accion){
        case "btnAgregar":

            if($txtNombre==""){
                $error['Nombre']="Escribe el nombre.";
            }
            if($txtDescripcion==""){
                $error['Descripcion'] = "Escriba la descripción del evento.";
            }
            if($txtLugar==""){
                $error['Lugar'] = "Escriba el lugar del evento.";
            }
            if($txtFecha==""){
                $error['Fecha'] = "Escriba la fecha del evento.";
            }

            if(count($error)>0){
                $mostrarModal = true;
                break;
            }

            $sentencia = $pdo->prepare("INSERT INTO empleados(Nombre,Descripcion,Lugar,Fecha,Foto) VALUES (:Nombre, :Descripcion, :Lugar, :Fecha, :Foto)");
            $sentencia->bindParam(':Nombre', $txtNombre);
            $sentencia->bindParam(':Descripcion', $txtDescripcion);
            $sentencia->bindParam(':Lugar', $txtLugar);
            $sentencia->bindParam(':Fecha', $txtFecha);
            $fecha = new DateTime();
            $nombreArchivo = ($txtFoto!="")?$fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"imagen.png";
            $tmpFoto = $_FILES["txtFoto"]["tmp_name"];
            if($tmpFoto!=""){
                move_uploaded_file($tmpFoto, "./Imagenes/" .$nombreArchivo);
            }
            $sentencia->bindParam(':Foto', $nombreArchivo);
            $sentencia->execute();
            header('Location: index.php');
        break;

        case "btnModificar":
            $sentencia = $pdo->prepare("UPDATE empleados SET Nombre=:Nombre, Descripcion=:Descripcion , Lugar=:Lugar ,Fecha=:Fecha WHERE Id=:id");
            $sentencia->bindParam(':Nombre', $txtNombre);
            $sentencia->bindParam(':Descripcion', $txtDescripcion);
            $sentencia->bindParam(':Lugar', $txtLugar);
            $sentencia->bindParam(':Fecha', $txtFecha);
            $sentencia->bindParam(':id', $txtId);
            $sentencia->execute();

            $fecha = new DateTime();
            $nombreArchivo = ($txtFoto!="")?$fecha->getTimestamp()."_".$_FILES["txtFoto"]["name"]:"imagen.png";
            $tmpFoto = $_FILES["txtFoto"]["tmp_name"];
            if($tmpFoto!=""){
                // subimos la foto al servidor
                move_uploaded_file($tmpFoto, "./Imagenes/" .$nombreArchivo);
                // eliminamos la fotografia actual
                $sentencia = $pdo->prepare("SELECT Foto FROM empleados WHERE Id=:id");
                $sentencia->bindParam(':id', $txtId);
                $sentencia->execute();
                $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

                if(isset($empleado["Foto"])){
                    if(file_exists("./Imagenes/".$empleado["Foto"])){
                        if($empleado['Foto'] != "imagen.png"){
                            unlink("./Imagenes/".$empleado["Foto"]);
                        }
                    }
                }
                // actualizamos el link de la foto subida
                $sentencia = $pdo->prepare("UPDATE empleados SET Foto=:Foto  WHERE Id=:id");
                $sentencia->bindParam(':Foto', $nombreArchivo);
                $sentencia->bindParam(':id', $txtId);
                $sentencia->execute();
                header('Location: index.php');
            }

            
        break;

        case "btnEliminar":
            $sentencia = $pdo->prepare("SELECT Foto FROM empleados WHERE Id=:id");
            $sentencia->bindParam(':id', $txtId);
            $sentencia->execute();
            $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

            if(isset($empleado["Foto"])&&($empleado["Foto"]!="imagen.png")){
                if(file_exists("./Imagenes/".$empleado["Foto"])){
                    unlink("./Imagenes/".$empleado["Foto"]);
                }
            }

            $sentencia = $pdo->prepare("DELETE FROM empleados WHERE Id=:id");
            $sentencia->bindParam(':id', $txtId);
            $sentencia->execute();
            header('Location: index.php');
        break;

        case "btnCancelar":
            header('Location: index.php');
        break;
        case "Seleccionar":
            $accionAgregar = "disabled";
            $accionModificar = $accionEliminar = $accionCancelar = "";
            $mostrarModal = true;

            $sentencia = $pdo->prepare("SELECT * FROM empleados WHERE Id=:id");
            $sentencia->bindParam(':id', $txtId);
            $sentencia->execute();
            $empleado = $sentencia->fetch(PDO::FETCH_LAZY);

            $txtNombre = $empleado['Nombre'];
            $txtDescripcion = $empleado['Descripcion'];
            $txtLugar = $empleado['Lugar'];
            $txtFecha= $empleado['Fecha'];
            $txtFoto = $empleado['Foto'];

        break;
    }

    $sentencia = $pdo->prepare("SELECT * FROM empleados");
    $sentencia->execute();
    $listaEmpleados = $sentencia->fetchAll(PDO::FETCH_ASSOC);
?>