<?php

include("conexion.php");

session_start();


if(!isset($_SESSION['ciusuario'])){

    header("Location: ../logueo/login.php");
    exit();

}



$sql="SELECT * FROM usuario";


$resultado=$conexion->query($sql);



?>


<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Usuarios</title>


<style>

body{

font-family:Arial;
background:#eef5ee;
padding:30px;

}


table{

width:100%;
border-collapse:collapse;
background:white;

}


th{

background:#5f7d67;
color:white;
padding:12px;

}


td{

padding:10px;
text-align:center;
border-bottom:1px solid #ddd;

}


button{

background:#5f7d67;
color:white;
border:none;
padding:8px;
border-radius:5px;
cursor:pointer;

}


.editar{

background:#73a37b;

}


.eliminar{

background:#d45d5d;

}


</style>


</head>


<body>


<h2>Lista de Usuarios</h2>



<table>


<tr>

<th>CI</th>
<th>Nombre</th>
<th>Dirección</th>
<th>Celular</th>
<th>Rol</th>
<th>Estado</th>
<th>Correo</th>
<th>Acciones</th>

</tr>



<?php


if($resultado->num_rows>0){


while($fila=$resultado->fetch_assoc()){


?>


<tr>


<td>
<?php echo $fila['ciusuario']; ?>
</td>


<td>
<?php echo $fila['Nombre']; ?>
</td>


<td>
<?php echo $fila['Direccion']; ?>
</td>


<td>
<?php echo $fila['Celular']; ?>
</td>


<td>
<?php echo $fila['Rol']; ?>
</td>


<td>
<?php echo $fila['Estado']; ?>
</td>


<td>
<?php echo $fila['Correo']; ?>
</td>


<td>


<a href="persona.php?ciusuario=<?php echo $fila['ciusuario']; ?>">
<button>
Mostrar
</button>
</a>


<a href="formEditar.php?ciusuario=<?php echo $fila['ciusuario']; ?>">
<button class="editar">
Editar
</button>
</a>


<a href="eliminar.php?ciusuario=<?php echo $fila['ciusuario']; ?>">
<button class="eliminar">
Eliminar
</button>
</a>


</td>


</tr>



<?php


}


}else{


echo "<tr><td colspan='8'>No hay usuarios registrados</td></tr>";


}


?>


</table>


</body>


</html>
