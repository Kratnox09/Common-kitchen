<?php 
if(!isset($_POST['busqueda'])) exit('No se recibió el valor a buscar');

require_once 'conexion.php';

function search()
{
  $mysqli = getConnexion();
  $search = $mysqli->real_escape_string($_POST['busqueda']);
  $query = "SELECT * url FROM recetas WHERE ingredientes LIKE '%$search%' ";
  $res = $mysqli->query($query);
  while ($row = $res->fetch_array(MYSQLI_ASSOC)) {
    echo "<p><a href='$row[url]' target='_blank'>$row[nombre]</a></p>";
  }
}

search();