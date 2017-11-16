<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ciudades</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <?php
    include 'dameCiudades.php';
    //var_dump($ListaCiudades);
    include 'menu.php';
    if(isset($_GET['c'])){
      include 'dameImagenes.php';
      if (!isset($_SESSION["UsuarioValidado"])){
        header('Location: entrar.php');
      }
    }
  ?>

  
  
<br>

<div class="container">
  <?php if(isset($_GET['c'])){
    //echo $_GET['c'];
    for ($contador=0;$contador<count($ListaCiudades);$contador++){
      if($ListaCiudades[$contador]['id']==$_GET['c'] &&
        $ListaCiudades[$contador]['activo']==1){
        echo $ListaCiudades[$contador]['ciudad'] . "<br>";
        echo $ListaCiudades[$contador]['descripcion']. "<br><br>";
        //var_dump($ListaImagenes);
        //echo count($ListaImagenes);
        if (count($ListaImagenes)>0){
          for ($cont=0;$cont<count($ListaImagenes);$cont++){
              echo "<img width='150' src='" . $ListaImagenes[$cont]['imagen'] . "'><br><br>";
          }
        }
      }
    }
  ?>
  <?php }else{  
    if (isset($_SESSION["UsuarioValidado"])){
      
        echo '<h3>Seleccione una ciudad</h3>';
        echo '<p>Pulsar en una ciudad</p>';
      
    }
    else{
      echo '<h3>Primero debe validarse</h3>';
       }
    } ?>  
</div>
</body>
</html>