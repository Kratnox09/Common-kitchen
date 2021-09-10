<?php

$mysqli = new mysqli("b7c0911lhveepakxn4uy-mysql.services.clever-cloud.com","uuhknxeuimaxxokd","dZzXon2qU30c0EaF8H07","b7c0911lhveepakxn4uy");

$salida= "";
$query = "SELECT * FROM recetas";

if(isset($_POST['busqueda'])){
    $q = $mysqli->real_escape_string($_POST['busqueda']);
    $query = "SELECT * FROM recetas WHERE ingredientes LIKE '%{$q}%'";
}

$resultado = $mysqli->query($query);

if($resultado->num_rows > 0){
    $salida.="<table class='tabla_datos'>
                   <thead>
                      <tr>
                        <td>id</td>
                        <td>Nombre</td>
                        <td>Receta</td>
                        <td>ingredientes</td>
                      </tr>
                   </thead>
                   <tbody>"; 
    while($fila = $resultado->fetch_assoc()){
        $salida.="<tr>
                   <td>".$fila['id']."</td>
                   <td>".$fila['Nombre']."</td>
                    <td>".$fila['Receta']."</td>
                    <td>".$fila['ingredientes']."</td>
        </tr>";
    }
    $salida.="</tbody></table>";
}
else{
  $salida.="<div class='alert'>No hay datos disponibles</div>";
}

echo $salida;
$mysqli->close();

?>