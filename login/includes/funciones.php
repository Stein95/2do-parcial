<?php  
	require_once("db.php");
	switch ($_POST["action"]) {
		case 'login':
			login();
			break;
		case 'consultar_usuarios':
			consultar_usuarios();
			break;
		
		default:

			break;
	}
function consultar_usuarios(){

global $mysqli;


		$consulta = "SELECT * FROM usuarios";
		$resultado = $mysqli->query($consulta);
		$arreglo=[];
		while ($fila = $resultado->fetch_assoc()) {
			array_push($arreglo, $fila);
		};
		//print_r($fila); 
		//imprime el json encodeado
		echo json_encode($arreglo);


}

	function login(){
		global $mysqli;

		$correo = $_POST["correo"];
		$pass = $_POST["password"];	

		$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo'";
		$resultado = $mysqli->query($consulta);
		$fila = $resultado->fetch_assoc();
		
		if ($fila > 0) 
			{

				echo "Error: 2";

			}


		else if ($fila["password"] != $pass) 
			{
				$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo' AND password = '$pass'";
				$resultado = $mysqli->query($consulta);
				$fila = $resultado->fetch_assoc();

				echo "Error: 0";

				
			}
				else if($correo == $fila["correo_usr"] && $pass == $fila["password"])
				{

					echo "acsseso: 1"	;
					
				}
			}
?>		