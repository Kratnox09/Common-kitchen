<?php 
function getConnexion()
{
  $mysqli = new Mysqli('127.0.0.1', 'root', '', 'common kitchen');
  if($mysqli->connect_errno) exit('Error en la conexión: ' . $mysqli->connect_errno);
  $mysqli->set_charset('utf8');
  return $mysqli;
}