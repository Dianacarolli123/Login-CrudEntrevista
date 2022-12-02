<?php
    $id=$_GET['id'];
    include("conexion/conexion.php");
    $sql="delete from usuarios where id='".$id."'";
    $res=mysqli_query($conn,$sql);
    if ($res) {
        echo "<script language='JavaScript'>
            location.assign('indexTabla.php');
            </script>";      }
    mysqli_close($conn); 
?>