<?php
require "../config/Conexion.php";
class Noticias {
    //Implementamos nuestro constructor
	public function __construct()
	{

	}
	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM news";
		return ejecutarConsulta($sql);	 	
	}
    public function insertar($title,$encabezado,$body,$img,$fuente,$user_id)
	{
		$sql="INSERT INTO news (title,encabezado,body,img,fuente,user_id)
		VALUES ('$title','$encabezado','$body','$img','$fuente','$user_id')";
		return ejecutarConsulta($sql);
	}
    public function editar($id,$title,$encabezado,$body,$img,$fuente,$user_id)
	{
		$sql="UPDATE news SET title='$title',encabezado='$encabezado',body='$body',img='$img',fuente='$fuente',user_id='$user_id' WHERE id='$id'";
		return ejecutarConsulta($sql);
	}
    public function mostrarid($id)
    {
        $sql="SELECT * FROM news WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    public function mostrardistritoeditar($id)
    {
        $sql="SELECT * FROM news WHERE id='$id'";
        return ejecutarConsultaSimpleFila(($sql)); 
    }
    public function eliminar($id)
    {
        $sql="DELETE FROM news WHERE id='$id'";
        return ejecutarConsulta($sql);
    }
    //listar en la pagina principal
	public function listarNoticia()
	{
		$sql="SELECT * FROM news";
        $result= ejecutarConsulta($sql);
        $data = array();
        if($result->num_rows >0)
        {
            while($row = $result->fetch_assoc()){
                $data[]=$row;
            }
        }
        return json_encode($data);
	}
}
?>