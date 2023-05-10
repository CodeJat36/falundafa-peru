<?php
ob_start();
if (strlen(session_id()) < 1){
	session_start();//Validamos si existe o no la sesión
}
require_once "../models/noticiasModel.php";

$noticias = new Noticias();

$id=isset($_POST["id"])? limpiarCadena($_POST["id"]):"";
$title=isset($_POST["title"])? limpiarCadena($_POST["title"]):"";
$encabezado=isset($_POST["encabezado"])? limpiarCadena($_POST["encabezado"]):"";
$body=isset($_POST["body"])? limpiarCadena($_POST["body"]):"";
$img=isset($_POST["img"])? limpiarCadena($_POST["img"]):"";
$fuente=isset($_POST["fuente"])? limpiarCadena($_POST["fuente"]):"";
$user_id=isset($_POST["user_id"])? limpiarCadena($_POST["user_id"]):"";

switch ($_GET["op"]){
	case 'guardaryeditar':
			//Validamos el acceso solo al usuario logueado y autorizado.
			
				if (!file_exists($_FILES['img']['tmp_name']) || !is_uploaded_file($_FILES['img']['tmp_name']))
				{
					$img=$_POST["imagenactual"];
				}
				else 
				{
					$ext = explode(".", $_FILES["img"]["name"]);
					if ($_FILES['img']['type'] == "image/jpg" || $_FILES['img']['type'] == "image/jpeg" || $_FILES['img']['type'] == "image/png")
					{
						$img = round(microtime(true)) . '.' . end($ext);
						move_uploaded_file($_FILES["img"]["tmp_name"], "../files/noticias/" . $img);
					}
				}

				if (empty($id)){
					$rspta=$noticias->insertar($title,$encabezado,$body,$img,$fuente,$user_id);
					echo $rspta ? "Noticia registrada" : "No se pudieron registrar todos los datos de la noticia";
				}
				else {
					$rspta=$noticias->editar($id,$title,$encabezado,$body,$img,$fuente,$user_id);
					echo $rspta ? "Noticia actualizada" : "Noticia no se pudo actualizar";
				}
				
	break;

	case 'mostrarNoticia':
		if (!isset($_SESSION["username"]))
		{
		  header("Location: ../view/login.php");//Validamos el acceso solo a los usuarios logueados al sistema.
		}
		else
		{
		    $rspta=$usuario->mostrarid($id);
            $results = mysqli_fetch_object($rpta);
		 	//Codificar el resultado utilizando json
		 	echo json_encode($results);
			
		}		
	break;

	case 'listar':
        $rspta=$noticias->listar();
		 	//Vamos a declarar un array
		 	$data= array();

		 	while ($reg=$rspta->fetch_object()){
		 		$data[]=array(
		 			"0"=>"$reg->id",
		 			"1"=>$reg->title,
		 			"2"=>$reg->encabezado,
		 			"3"=>$reg->body,
		 			"4"=>"<img src='../files/noticias/".$reg->img."' height='50px' width='50px'>",
		 			"5"=>$reg->fuente,
		 			"6"=>$reg->user_id,
                    "7"=>'<div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#noticiasModal" onclick="mostrar('.$reg->id.')">
                                    <i class="bx bx-edit-alt me-1"></i> Editar
                                </a>
                                <a class="dropdown-item" onclick="eliminar('.$reg->id.')">
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

    case 'mostrarNoticiaEditar':
        $rpta = $noticias->mostrardistritoeditar($id);
        echo json_encode($rpta);
    break;

    case 'eliminar':
        $rpta = $noticias->eliminar($id);
        echo json_encode($rpta);
}
ob_end_flush();
