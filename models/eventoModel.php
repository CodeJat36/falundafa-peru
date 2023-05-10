<?php
require "../config/Conexion.php";
class Eventos {
    //Implementamos nuestro constructor
	public function __construct()
	{

	}
	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT * FROM eventos";
		return ejecutarConsulta($sql);		
	}
    public function insertar($titulo,$imagen,$descripcion)
	{
		$sql="INSERT INTO eventos (titulo,imagen,descripcion)
		VALUES ('$titulo','$imagen','$descripcion')";
		return ejecutarConsulta($sql);
	}
    public function editar($idevento,$titulo,$imagen,$descripcion)
	{
		$sql="UPDATE eventos SET titulo='$titulo',imagen='$imagen',descripcion='$descripcion' WHERE idevento='$idevento'";
		return ejecutarConsulta($sql);
	}
    public function mostrarid($idevento)
    {
        $sql="SELECT * FROM eventos WHERE idevento='$idevento'";
        return ejecutarConsulta($sql);
    }
    public function mostrardistritoeditar($idevento)
    {
        $sql="SELECT * FROM eventos WHERE idevento='$idevento'";
        return ejecutarConsultaSimpleFila(($sql)); 
    }
    public function eliminar($idevento)
    {
        $sql="DELETE FROM eventos WHERE idevento='$idevento'";
        return ejecutarConsulta($sql);
    }
}
?>