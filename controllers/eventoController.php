<?php
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
require_once "../models/eventoModel.php";

$evento = new Eventos();

$idevento=isset($_POST["idevento"])? limpiarCadena($_POST["idevento"]):"";
$titulo=isset($_POST["titulo"])? limpiarCadena($_POST["titulo"]):"";
$imagen=isset($_POST["imagen"])? limpiarCadena($_POST["imagen"]):"";
$descripcion=isset($_POST["descripcion"])? limpiarCadena($_POST["descripcion"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
			//Validamos el acceso solo al usuario logueado y autorizado.
			
				if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
				{
					$imagen=$_POST["imagenactual"];
				}
				else 
				{
					$ext = explode(".", $_FILES["imagen"]["name"]);
					if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png")
					{
						$imagen = round(microtime(true)) . '.' . end($ext);
						move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/evento/" . $imagen);
					}
				}

				if (empty($idevento)){
					$rspta=$evento->insertar($titulo,$imagen,$descripcion);
					echo $rspta ? "Evento registrado" : "No se pudieron registrar todos los datos del evento";
				}
				else {
					$rspta=$evento->editar($idevento,$titulo,$imagen,$descripcion);
					echo $rspta ? "Evento actualizado" : "Evento no se pudo actualizar";
				}
				
	break;

	case 'mostrarEvento':
		if (!isset($_SESSION["username"]))
		{
		  header("Location: ../view/login.php");//Validamos el acceso solo a los usuarios logueados al sistema.
		}
		else
		{
		    $rspta=$evento->mostrarid($idevento);
            $results = mysqli_fetch_object($rpta);
		 	//Codificar el resultado utilizando json
		 	echo json_encode($results);
			
		}		
	break;

	case 'listar':
        $rspta=$evento->listar();
		 	//Vamos a declarar un array
		 	$data= array();

		 	while ($reg=$rspta->fetch_object()){
		 		$data[]=array(
		 			"0"=>"$reg->idevento",
		 			"1"=>$reg->titulo,
		 			"2"=>"<img src='../files/evento/".$reg->imagen."' height='50px' width='50px'>",
		 			"3"=>$reg->descripcion,
                    "4"=>'<div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#eventoModal" onclick="mostrar('.$reg->idevento.')">
                                    <i class="bx bx-edit-alt me-1"></i> Editar
                                </a>
                                <a class="dropdown-item" onclick="eliminar('.$reg->idevento.')">
                                    <i class="bx bx-trash me-1"></i> Eliminar
                                </a>
                            </div>
                          </div>'
		 			);
		 	}
		 	$results = array(
                "sEcho" => 1,
                "iTotalRecords" => count($data),
                "iTotalDisplayRecords" => count($data),
                "aaData" => $data
            );
		 	echo json_encode($results);
		//Fin de las validaciones de acceso
	
	break;

    case 'mostrarEventoEditar':
        $rpta = $evento->mostrardistritoeditar($idevento);
        echo json_encode($rpta);
    break;

    case 'eliminar':
        $rpta = $evento->eliminar($idevento);
        echo json_encode($rpta);
}
ob_end_flush();
