<?php
session_start();

$host = "localhost"; // Nombre del servidor 
$user = "root"; // Usuario de conexión 
$pass = ""; // Contraseña de la base de datos 
$db = "registerloginphp"; // Nombre de la base de datos 

$conn = new mysqli($host, $user, $pass, $db); // Se establece la conexión a la base de datos 
if ($conn->connect_error) { 
    die("Error de conexión: " . $conn->connect_error); // Si hay un error en la conexión, se muestra un mensaje y se detiene el script 
}

if (isset($_POST['user']) && isset($_POST['password'])) {
  function validate($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
  }

  $user = validate($_POST['user']);
  $password = validate($_POST['password']);

  if (empty($user)) {
      header("Location: ../login.php?error=El Usuario Es Requerido");
      exit();
  } elseif (empty($password)) {
      header("Location: ../login.php?error=La Contraseña Es Requerida");
      exit();
  } else {
      $sql = "SELECT * FROM users WHERE user = ?";
      $stmt = $conn->prepare($sql);
      $stmt->bind_param("s", $user);
      $stmt->execute();
      $result = $stmt->get_result();

      if ($result->num_rows === 1) {
          $row = $result->fetch_assoc();
          $stored_password = $row['password'];

          // Verificar si la contraseña proporcionada coincide con la almacenada
          if (password_verify($password, $stored_password)) {
              // Contraseña válida, iniciar sesión
              $_SESSION['user'] = $row['user'];
              $_SESSION['name'] = $row['name'];
              $_SESSION['lastname'] = $row['lastname'];
              $_SESSION['id'] = $row['id'];
              header("Location: ../../crudphp");
              exit();
          } else {
              // Contraseña incorrecta
              header("Location: ../login.php?error=Contraseña incorrecta");
              exit();
          }
      } else {
          // Usuario no encontrado
          header("Location: ../login.php?error=Usuario no encontrado");
          exit();
      }
  }
} else {
  header("Location: ../login.php");
  exit();
}