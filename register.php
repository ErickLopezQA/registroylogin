<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Bootstrap Stylesheet -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
  <!-- Stylesheet -->
  <link rel="stylesheet" href="styles/styles.css">
  
  <title>Registro</title>
</head>

<body>

<form class="RegisterForm" action="models/connectionRegister.php" method="post">

    <h1 class="RegisterTitle" >Registrarse</h1>
  <hr>
  <?php 
    if (isset($_GET['error'])) {
  ?>
      <p class="error">
        <?php 
          echo $_GET['error'];
        ?>
      </p>
  <?php
    }
  ?>
  
    <label class="RegisterLabel" for="nombre">Nombre</label>
    <input class="RegisterInput" type="text" id="nombre" name="name" placeholder="Nombre(s):" >

    <label class="RegisterLabel" for="apellido">Apellido</label>
    <input class="RegisterInput" type="text" id="apellido" name="lastname" placeholder="Apellido(s)" >

    <i class="bi bi-people"></i>
    <label class="RegisterLabel" for="email">Usuario</label>
    <input class="RegisterInput" type="text" id="user" name="user" placeholder="Usuario" >

    <label class="RegisterLabel" for="email">Email</label>
    <input class="RegisterInput" type="email" id="email" name="email" placeholder="email@example.com" >

    <label class="RegisterLabel" for="password">Contraseña</label>
    <input class="RegisterInput" type="password" id="password" name="password" placeholder="Contraseña" >

    <label class="RegisterLabel" for="confirm_password">Repetir Contraseña</label>
    <input class="RegisterInput" type="password" id="confirm_password" name="confirm_password" placeholder="Repetir Contraseña" >
  <hr>  
    <button type="submit" name="register">Registrarse!</button>
</form>


</body>

<!-- Bootstrap Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>