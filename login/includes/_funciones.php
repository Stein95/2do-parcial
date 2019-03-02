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
	case 'editar_usuario':
		editar_usuario($_POST);
	
	default:
	break;
}
function editar_usuarios($id){
	global $mysqli;
	$consulta = "SELECT * FROM usuarios WHERE id_usr=$id";
	$resultado = mysqli_query($mysqli, $consulta);
	$arreglo = [];
	while($fila = mysqli_fetch_array($resultado)){
		array_push($arreglo, $fila);
	}
	echo json_encode($arreglo); 
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
	$consulta = "DELETE FROM usuarios WHERE id_usr =$id";
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
	$nombre_usr = $_POST["nombre"];
	$correo_usr = $_POST["correo"];	
	$password= $_POST["password"];	
	$telefono_usr = $_POST["telefono"];	
	$consul1 = "INSERT INTO usuarios VALUES('','$nombre_usr','$correo_usr','$password', '$telefono_usr', 1)";
	$resul1 = mysqli_query($mysqli, $consul1);
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

		$correo = $_POST["correo"];
		$pass = $_POST["password"];	

		$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo'";
		$resultado = $mysqli->query($consulta);
		$fila = $resultado->fetch_assoc();
		
		if ($fila == 0) 
			{

				echo "[2]";

			}


		else if ($fila["password"] != $pass) 
			{
				$consulta = "SELECT * FROM usuarios WHERE correo_usr = '$correo' AND password = '$pass'";
				$resultado = $mysqli->query($consulta);
				$fila = $resultado->fetch_assoc();

				echo "[0]";

				
			}
				else if($correo == $fila["correo_usr"] && $pass == $fila["password"])
				{

					echo "[1]"	;
					session_start();
					error_reporting(0);

					$_SESSION['usuarios']=$correo;
					echo $correo;
					echo $_SESSION['usuarios'];
  					header("location:../usuarios.php");
					
				}
			}

?>