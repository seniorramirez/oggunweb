<?php

require("info.php");
session_start();



if (isset( $_GET['idchat'])) {
	$query = mysqli_query($conexion, "SELECT c.idpersona,c.mensaje,us.nombres,us.apellidos FROM chatmensaje as c INNER JOIN usuarios as us ON c.idpersona = us.id WHERE c.idchat = $_GET[idchat] ");

if(mysqli_num_rows($query)>0){

	while($row = mysqli_fetch_array($query)){
		?>

		<strong><?php echo $row[2]." ".$row[3]?></strong>= <?php echo $row[1];?><br><?php
		
	}

}


}

if (isset($_REQUEST['mensaje'])) {
	$mensaje = $_REQUEST['mensaje'];
	$idchat = $_REQUEST['idchat'];
	echo $mensaje;
	echo $idchat;
	echo $_SESSION['idusuario'];
	$query = mysqli_query($conexion, "INSERT INTO chatmensaje (idpersona,idchat,mensaje) VALUES ($_SESSION[idusuario],$idchat,'$mensaje') ");

	header("Location: chat.php?chat=".$idchat);
	
}

if(isset($_REQUEST['amigo'])){
	$amigo = $_REQUEST['amigo'];
	$idchat = $_REQUEST['idchat'];
	foreach ($amigo as $id ) {
		$sql = "INSERT INTO chatpersona (idpersona,idchat) VALUES ($id,$idchat)";
		$query = mysqli_query($conexion,$sql);

	}
	header("Location: chat.php?chat=".$idchat);
}

?>