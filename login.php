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
  
  <title>Iniciar Sesion</title>
</head>

<body>

  <form class="LoginForm" action="models/connectionLogin.php" method="POST">

    <h1 class="LoginTitle" >Iniciar Sesion</h1>
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
  <?php 
    if (isset($_GET['success'])) {
  ?>
      <p class="success">
        <?php 
          echo $_GET['success'];
        ?>
      </p>
  <?php
    }
  ?>
    <i class="bi bi-people"></i>
    <label class="LoginLabel">Usuario</label>
    <input class="LoginInput" type="text" name="user" placeholder="Usuario">

    <i class="bi bi-key"></i>
    <label class="LoginLabel" >Contraseña</label>
    <input class="LoginInput" type="password" name="password" placeholder="Contraseña">
  <hr>
    <button type="submit">Iniciar Sesion</button>
    <a href="register.php">Registrarse</a>
  </form>


</body>

<!-- Bootstrap Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</html>