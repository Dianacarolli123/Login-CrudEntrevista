<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="estilosTabla.css"> 
</head>
<body>



<div class="container-fluid col-11">
    
    <div class="row pt-xl-5">

        <div class="col-3 ">
            <?php
                include("conexion/conexion.php");
                if (isset($_POST['btnGuardar'])) {
                    $nombre=$_POST['nombre'];
                    $puesto=$_POST['puesto'];
                    $usuario=$_POST['usuario'];
                    $contrasena=$_POST['contrasena'];
                    include("conexion/conexion.php");
                    $sql="insert into usuarios(nombre, puesto, usuario, contrasena) values ('".$nombre."','".$puesto."','".$usuario."','".$contrasena."')";
                    $res=mysqli_query($conn,$sql);
                }
                mysqli_close($conn); 
            ?>
            <h2>Registro de usuarios</h2>
            <form action="<?=$_SERVER['PHP_SELF']?>" class="was-validated" method="post">
                <div class="form-group">
                    <label for="uname">Nombre:</label>
                    <input type="text" class="form-control" id="idInputNombre" placeholder="Ingrese nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="uname">Puesto:</label>
                    <input type="text" class="form-control" id="idInputPuesto" placeholder="Ingrese puesto" name="puesto" required>
                </div>
                <div class="form-group">
                    <label for="uname">Usuario:</label>
                    <input type="text" class="form-control" id="idInputUsuario" placeholder="Ingrese nombre de usuario" name="usuario" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Contraseña:</label>
                    <input type="password" class="form-control" id="idInputPwd" placeholder="Ingrese contraseña" name="contrasena" required>
                </div>
                <div class="form-group form-check">
                </div>
                <button type="submit" class="btn btn-success" name="btnGuardar">Guardar</button>
            </form>
        </div>

        <div class="col-9 ">
            <h2>Tabla de usuarios</h2>
            <?php
                include("conexion/conexion.php");
                $sql="select * from usuarios";
                $res=mysqli_query($conn,$sql);
            ?>
            <table class="table table-striped">
                <thead class="text-danger">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Puesto</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody class="text-white">
                    <?php
                        while ($filas=mysqli_fetch_assoc($res)) {
                    ?>
                    <tr>
                        <td> <?php echo $filas['id'] ?> </td>
                        <td><?php echo $filas['nombre'] ?></td>
                        <td><?php echo $filas['puesto'] ?></td>
                        <td><?php echo $filas['usuario'] ?></td>
                        <td><?php echo '*********' ?></td>  
                        <td>
                            <?php echo "<a href='indexEditar.php?id=".$filas['id']."' type='button' class='btn btn-outline-warning btn-sm'>Editar</a>";?>
                            <?php echo "<a href='indexEliminar.php?id=".$filas['id']."' type='button' class='btn btn-outline-danger btn-sm'>Eliminar</a>";?>
                            
                        </td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
                

            </table>
            <?php
                mysqli_close($conn); 
            ?>
        </div>
    </div>
  
</div>

</body>
</html>
