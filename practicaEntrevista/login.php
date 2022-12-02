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
  <link rel="stylesheet" href="estilos.css"> 
</head>

<body>
    <div class="container abs-center">
      <div class=" card col-4 " id="estilobgFormulario">
        <h2 class="estiloTitulo text-center">Login</h2>
        <div class="row estiloLoginLogo" id="imgLogin"></div>
        <div class="card-body">
          <?php
            if (isset($_POST['btnIngresar'])) {
              if (empty($_POST['usuario']) || empty($_POST['contrasena'])) {
                echo "<script language='JavaScript'>
                location.assign('login.php');
                </script>"; 
              }else{
                include("conexion/conexion.php");
                $usuario=$_POST['usuario'];
                $contrasena=$_POST['contrasena'];
                $sql="select * from usuarios where usuario='".$usuario."' and contrasena='".$contrasena."'";
                $res=mysqli_query($conn,$sql);
                if ($fila=mysqli_fetch_assoc($res)) {
                  echo "<script language='JavaScript'>
                  location.assign('indexTabla.php');
                  </script>";  
                }else{
                  echo "<script language='JavaScript'>
                  location.assign('login.php');
                  </script>";  
                }
                mysqli_close($conn);
              }
            } else{
               

          ?>
          <form action="<?=$_SERVER['PHP_SELF']?>" class="was-validated" method="post">
            <div class="form-group">
            <label for="usuario">Nombre de usuario:</label>
            <input type="text" class="form-control" id="usuario" placeholder="Ingrese nombre de usuario" name="usuario" required>
            </div>
            <div class="form-group">
            <label for="contrasena">Contraseña:</label>
            <input type="password" class="form-control" id="contrasena" placeholder="Ingrese contraseña" name="contrasena" required>
            </div>
            <button type="submit" name="btnIngresar"  class="btn">Ingresar</button>
          </form>
          <?php
            }
          ?>
        </div>
      </div>
    </div>

</body>
</html>
