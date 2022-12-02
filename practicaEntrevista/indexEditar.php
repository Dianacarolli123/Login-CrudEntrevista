<!DOCTYPE html>
<?php
    include("conexion/conexion.php");
?>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="estilosEditar.css"> 
</head>
<body>

<?php
    if (isset($_POST['btnActualizar'])) {
        $id=$_POST['id'];
        $nombre=$_POST['nombre'];
        $puesto=$_POST['puesto'];
        $usuario=$_POST['usuario'];
        $contrasena=$_POST['contrasena'];
        $sql="update usuarios set 
            nombre='".$nombre."',
            puesto='".$puesto."',
            usuario='".$usuario."',
            contrasena='".$contrasena."' where id='".$id."'";
        $res=mysqli_query($conn,$sql);
        if ($res) {
            echo "<script language='JavaScript'>
                location.assign('indexTabla.php');
                </script>";     
        }
        mysqli_close($conn); 
    }else{
        $id=$_GET['id'];
        $sql="select * from usuarios where id='".$id."'";
        $res=mysqli_query($conn,$sql);

        $fila=mysqli_fetch_assoc($res);
        $nombre=$fila["nombre"];
        $puesto=$fila["puesto"];
        $usuario=$fila["usuario"];
        $contrasena=$fila["contrasena"];
        
        mysqli_close($conn); 
    }
?> 

<div class="container col-12  abs-center">
    
    <div class="row pt-xl-5">

        <div class="col ">
            
            <h2 class="text-danger" >Editar usuario <?php echo $nombre; ?> </h2>
            <form action="<?=$_SERVER['PHP_SELF']?>" class="was-validated" method="post">
                <div class="form-group">
                    <label for="uname">Nombre:</label>
                    <input type="text" class="form-control" id="idInputNombre"  name="nombre" value="<?php echo $nombre; ?>">
                </div>
                <div class="form-group">
                    <label for="uname">Puesto:</label>
                    <input type="text" class="form-control" id="idInputPuesto"  name="puesto" value="<?php echo $puesto; ?>" >
                </div>
                <div class="form-group">
                    <label for="uname">Usuario:</label>
                    <input type="text" class="form-control" id="idInputUsuario"  name="usuario" value="<?php echo $usuario; ?>" >
                </div>
                <div class="form-group">
                    <label for="pwd">Contraseña:</label>
                    <input type="password" class="form-control" id="idInputPwd"  name="contrasena" value="<?php echo $contrasena; ?>" >
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <a href="indexTabla.php" class="btn btn-outline-warning" name="btnCancelar">Cancelar</a>
                <button type="submit" class="btn btn-success" name="btnActualizar">Actualizar</button>
            </form>
            <?php
                
            ?>
        </div>
    </div>
</div>

</body>
</html>