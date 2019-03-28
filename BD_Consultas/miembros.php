<?php

function deactivate($id){
  require('Conexion.php');
  if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
  }else{
    $query = "UPDATE usuario SET estado='Inactivo' WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $conn->close();
    header("Location: ..\adminMiembros.php"); /* Redirect browser */
  exit();
}
}

function activate($id){
  require('Conexion.php');
  if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
  }else{
    $query = "UPDATE usuario SET estado='Activo' WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $conn->close();
    header("Location: ..\adminMiembros.php"); /* Redirect browser */
  exit();
}
}

function accept($id){
  require('Conexion.php');
  if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
  }else{
    $query = "UPDATE usuario SET estado='Activo' WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $conn->close();
    header("Location: ..\adminSolicitudes.php"); /* Redirect browser */
  exit();
}
}

function reject($id){
  require('Conexion.php');
  if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
  }else{
    $query = "DELETE FROM usuario WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    $conn->close();
    header("Location: ..\adminSolicitudes.php"); /* Redirect browser */
  exit();
}
}


if (!empty($_POST["deactivateId"])) {
    $uId = filter_input(INPUT_POST, 'deactivateId');
    deactivate($uId);
} else {
    echo "No post received";
}

if (!empty($_POST["activateId"])) {
    $uId = filter_input(INPUT_POST, 'activateId');
    activate($uId);
} else {
    echo "No post received";
}

if (!empty($_POST["acceptId"])) {
    $uId = filter_input(INPUT_POST, 'acceptId');
    accept($uId);
} else {
    echo "No post received";
}

if (!empty($_POST["rejectId"])) {
    $uId = filter_input(INPUT_POST, 'rejectId');
    reject($uId);
} else {
    echo "No post received";
}
 ?>
