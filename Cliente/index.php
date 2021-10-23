<!DOCTYPE html>
<html lang="es" >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CELULARES</title>
  <link rel="stylesheet" href="./style.css">

</head>
<body>

  <!-- Empieza la estructura para ingresar los datos-->
<div class="container">  
  <form id="contact" action="insertar.php" method="post">
    
    <h3>Ingresar Datos</h3>
    
      
             
      <input name="nombre" type="text" placeholder="Nombre" >
    
      <input name="marca" type="text" placeholder="Marca" >
   
      <input name="sistema_op" type="text" placeholder="Sistema Operativo" >
   
      <input name="color" type="text" placeholder="Color" >
    
    
      <button name="submit" type="submit" value="Aceptar" >Aceptar</button>
    
    
  </form>

</div>

 <!-- Termina la estructura para ingresar los datos-->

<!--Empieza la estructura para modificar datos-->


<div class="container">  
  <form id="contact" action="modificar.php" method="post">
   
    <h3>Modificar</h3>
    
      <input name="Id" type="text" placeholder="Id" >
    
      <input name="nombre" type="text" placeholder="Nombre">
    
      <input name="marca" type="text" placeholder="Marca" >
    
      <input name="sistema_op" type="text" placeholder="Sistema Operativo" >
   
      <input name="color" type="text" placeholder="Color">
  
      <button name="submit" type="submit" >Aceptar</button>
    
    
  </form>
</div>

</br>
 <!-- Termina la estructura para modificar los datos-->


<!--Empieza la estructura para eliminar datos-->
<div class="container">  
  <form id="contact" action="eliminar.php" method="post">
    
    <h3>Eliminar</h3>
    
      <input name="Id" type="text" placeholder="Id" >
      <button name="submit" type="submit" >Aceptar</button>
    
    
  </form>
</div>
<!-- Termina la estructura para eliminar los datos-->



<!--
</br>


<div class="container">  
  <form id="contact" action="cliente.php" method="post">
    
    <h3>Visualizar Datos</h3>
     <fieldset>
      <input name="Id" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input name="nombre" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input name="marca" type="text" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input name="sistema_op" type="text" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input name="color" type="text" tabindex="4" required>
    </fieldset>
    
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending" >Aceptar</button>
    </fieldset>
    
  </form>
</div>-->
  
</body>
</html>