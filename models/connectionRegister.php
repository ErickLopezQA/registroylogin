<?php
session_start();

$host = "localhost"; //Nombre del servidor
$user = "root"; //usuario, de conexion
$pass = ""; //contraseña de base de datos 
$db = "registerloginphp"; //nombre de base de datos

$conn = new mysqli($host, $user, $pass, $db); //Se crea la conexion
if ($conn->connect_error) { 
    die("Error de conexión: " . $conn->connect_error); //Si conexion, da error. saltar mensaje.
}

if (isset($_POST['register'])){
  function validate($data) { //Esta funcion es para validar datos.
      $data = trim($data); //trim, elimina los espacios en blanco.
      $data = stripslashes($data); //strplashes, elimina barras invertidas, medida de seguridad para prevenir ataques de inyeccion SQL.
      $data = htmlspecialchars($data);  //htmlspecialchars, convierte caracteres especiales en entidades HTML, para prevenir ataques de XSS. 
      return $data; //Una vez validado esto, regresa $data
  }

  $name = validate($_POST['name']);
  $lastname = validate($_POST['lastname']);
  $email = validate($_POST['email']);
  $user = validate($_POST['user']);
  $password = validate($_POST['password']); //Se aplica la funcion validate, para los datos enviados por el metodo POST.
  $confirm_password = validate($_POST['confirm_password']); // Se valida la confirmación de la contraseña

    if (empty($user) || empty($name) || empty($lastname) || empty($email) || empty($password) || empty($confirm_password)) {
      header("Location: ../register.php?error=Por favor, complete todos los campos"); //Mensaje de error en caso de algun campo este vacio
      exit();
    } else if ($password !== $confirm_password) {
      header("Location: ../register.php?error=Las contraseñas no coinciden"); //Mensaje de error en caso de que las contraseñas no coincidan
      exit();
    } else {
      // $password = md5($password);
  
      $sql = "SELECT * FROM users WHERE email = ?"; //Comprobamos si el email ya esta en uso.
      $stmt = $conn->prepare($sql); // Prepara la conexion sql.
      $stmt->bind_param("s", $email); // Se vinculan los parametros de la consulta. el string "ss".
      $stmt->execute(); // Ejecuta la conexion preparada de sql.
      $result = $stmt->get_result(); //Obtiene el resultado de la consulta y devuelve un objeto que contiene el resultado.
      $stmt->close(); //Cierra la conexion preparada.
      if ($result->num_rows > 0) {
          header("Location: ../register.php?error=El email ya esta en uso"); //Mensaje de error
          exit();
      } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, user, lastname, email, password) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $name, $user, $lastname, $email, $hashed_password);
        $stmt->execute();
        $stmt->close();
        header("Location: ../login.php?success=Registro Exitoso");
        exit();
      } 
    }
} else {
    header("Location: ../login.php");
    exit();
}
