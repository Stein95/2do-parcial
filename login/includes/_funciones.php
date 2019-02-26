<?php 
require_once("_db.php");
switch ($_POST["accion"]) {
	case 'login':
	login();
	break;
	case 'consultar_usuarios':
	consultar_usuarios();
	break;
	case 'insertar_usuarios':
	insertar_usuarios();
	break;
	case 'consultar_encabezado':
	consultar_encabezado();
	break;
	case 'insertar_encabezado':
	insertar_encabezado();
	break;

	case 'consultar_works':
	consultar_works();
	break;
	case 'insertar_works':
	insertar_works();
	break;
	case 'consultar_ourteam':
	consultar_ourteam();
	break;
	case 'insertar_ourteam':
	insertar_ourteam();
	break;

	case 'eliminar_registro':
		eliminar_usuarios($_POST["registro"]);
		# code...
		break;
	
	default:
	break;
}

function consultar_usuarios(){
	global $mysqli;
	$consulta = "SELECT * FROM usuarios";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); 
}

function eliminar_usuarios($id){
	global $mysqli;
	$consulta = "DELETE FROM usuarios WHERE idU =$id";
	$resultado = mysqli_query($mysqli, $consulta);
	if ($resultado) {
		echo "Se elmino correctamente";
		# code...
	}else{
		echo "Se genero un error intenta nuevamente";
	}
}

function insertar_usuarios(){
	global $mysqli;
	$nomU = $_POST["nombre"];
	$correoU = $_POST["correo"];	
	$passU = $_POST["password"];	
	$telU = $_POST["telefono"];	
	$consul1 = "INSERT INTO usuarios VALUES('','$nomU','$correoU','$passU', '$telU', 1)";
	$resul1 = mysqli_query($mysqli, $consultain);
	$arre1 = [];
	while($fila1 = mysqli_fetch_array($resul1)){
		array_push($arre1, $fila1);
	}
	echo json_encode($arre1);
}

function consultar_works(){
	global $mysqli;
	$consul2 = "SELECT * FROM works";
	$resul2 = mysqli_query($mysqli, $consulta);
	$arre2 = [];
	while($fila2 = mysqli_fetch_array($resul2)){
		array_push($arre2, $fila2);
	}
	echo json_encode($arre2); 
}
function insertar_works(){
	global $mysqli;
	$imgW = $_POST["imagen"];
	$proNameW= $_POST["proyecto"];	
	$WebW = $_POST["website"];	
	$consul3= "INSERT INTO works VALUES('','$imgW','$proNameW','$WebW')";
	$resul3 = mysqli_query($mysqli, $consultain);
	$arre3 = [];
	while($fila3 = mysqli_fetch_array($resul3)){
		array_push($arre3, $fila3);
	}
	echo json_encode($arre3);
}


function consultar_ourteam(){
	global $mysqli;
	$consul4 = "SELECT * FROM ourteam";
	$resul4 = mysqli_query($mysqli, $consul4);
	$arre4 = [];
	while($fila4 = mysqli_fetch_array($resul4)){
		array_push($arre4, $fila4);
	}
	echo json_encode($arre4);
}
function insertar_ourteam(){
	global $mysqli;
	$imgO = $_POST["imagen"];
	$nomO = $_POST["nombre"];	
	$cargO = $_POST["cargo"];	
	$consul5 = "INSERT INTO ourteam VALUES('','$imgO','$nomO','$cargO')";
	$resul5 = mysqli_query($mysqli, $consul5);
	$arre5 = [];
	while($fila5 = mysqli_fetch_array($resul5)){
		array_push($arre5, $fila5);
	}
	echo json_encode($arregloin);
}

	function login(){
		global $mysqli;
		// Conectar a Base de Datos.
		$correo = $_POST["correo"];
		$pass = $_POST["password"];	
		// Consultar a Base de Datos que exista el usuario.
		$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo'";
		$resultado = $mysqli->query($consulta);
		$fila = $resultado->fetch_assoc();
		
		if ($fila == 0) 
			{
				// 	Si el usuario no existe imprimir = 2
				echo "El usuario no existe [ERROR-02]";

			}

			// 	Si el usuario existe, conusltar que el password sea correcto. 
		else if ($fila["password"] != $pass) 
			{
				$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo' AND password = '$pass'";
				$resultado = $mysqli->query($consulta);
				$fila = $resultado->fetch_assoc();
				// 			Si el password no es correcto, imprimir codigo de erorres = 0.
				echo "El Password es Incorrecto [ERROR-00]";

				
			}
				else if($correo == $fila["correo_usr"] && $pass == $fila["password"])
				{
					// 			Si el password es correcto imprimir = 1 
					echo "El Usuario y Password son Correctos [ACESSO-01]"	;
					
				}
			}

?>