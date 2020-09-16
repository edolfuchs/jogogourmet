<?php

  define('COMMTROL_DIR_ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);
  define('COMMTROL_DIR_APP', COMMTROL_DIR_ROOT . 'application' . DIRECTORY_SEPARATOR);

  include 'application/Controllers/JogarController.php';
  include 'application/Models/No.php';
  include 'application/Models/Prato.php';

  $jogarController = new JogarController();


  $jogarController->iniciar();
?>