<?php 

  session_start(); //Esta funcion inicia una session o reanuda una session ya existente
  session_unset(); //Elimina las variables de session registradas 
  session_destroy(); //Destruye la informacion asosiada con la session, elimina cookies y datos almacenados en la session

  header("Location: login.php");