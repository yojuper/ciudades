<?php
  // Start the session
  session_start();
  if (isset($_SESSION["UsuarioValidado"])){
    //var_dump($_SESSION["UsuarioValidado"]);
  }
?>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Ciudades</a>
    </div>
    <ul class="nav navbar-nav">
      <?php
       if (isset($_SESSION["UsuarioValidado"])){
        for ($contador=0;$contador<count($ListaCiudades);$contador++){
          if ($ListaCiudades[$contador]['activo']==1){
            echo '<li>';
              echo '<a href="index.php?c=' . $ListaCiudades[$contador]['id'] . '">' . $ListaCiudades[$contador]['ciudad'] . '</a>';
            echo '</li>';
          }
        }
      }
      ?>    
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <?php if(isset($_SESSION["UsuarioValidado"])) {  ?>
      <li><a href="adminCiudades.php">Alta Ciudades</a></li>
      <li><a href="adminImagenes.php">Alta Imagenes</a></li>
      <?php } ?>
      <?php if (!isset($_SESSION["UsuarioValidado"])){?>
        <li><a href="registro.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <?php } ?>
     <?php if (!isset($_SESSION["UsuarioValidado"])){?>
      <li><a href="entrar.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    <?php }else { ?>
 <li><a href="salir.php"><span class="glyphicon glyphicon-log-in"></span>Salir <?php echo $_SESSION["UsuarioValidado"][0]['nombreCompleto']; ?></a></li>

 <?php }  ?>


    </ul>
  </div>
</nav>