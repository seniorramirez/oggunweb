<?php 
require("info.php");
session_start();
if(isset($_REQUEST['crear'])){
	
	
	$sql = "INSERT INTO chat (nombre,idusuario) VALUES ('".$_REQUEST['crear']."','".$_SESSION['idusuario']."')";
	if(mysqli_query($conexion,$sql)){
		echo "1";
	}else{
		echo "2";
	}
}else{

}

if(isset($_REQUEST['eliminar'])){
	echo $_REQUEST['eliminar'];
	$sql = "DELETE FROM chat WHERE id = ".$_REQUEST['eliminar']."";
	
	if(mysqli_query($conexion,$sql)){
		echo "1";
	}else{
		echo "2";
	}
}
	


?>