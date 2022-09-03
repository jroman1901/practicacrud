<?php


class conexion
{
    protected $conexion;

    public  function obtenerConexion ()
    {
        try{
            $config = include 'config.php';
            $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
            $this->conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
            return $this->conexion;
        }
        catch (PDOException $ex)
		{
			echo "Error en la conexión : ".$ex->getMessage();			
		}
    }
   
}




?>