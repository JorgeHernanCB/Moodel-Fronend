<?php
 
/**
 * En la clase <b>DatabaseConnect</b> vamos a incluir los métodos que utilizamos para crear y 
 * administrar la conexión a la base de datos.
 * @author Yuri Bonilla.
 */
class DatabaseConnect{
     
    /**
     * Método con los valores generales para nuestra aplicación.
     * @return type PDO devuelve un objeto PDO resultado de la conexión.
     *  (object returns a result of the connection).
     */
    public function dbConnectSimple(){        
        $dbsystem='mysql';
        $host='127.0.0.1';
        $dbname='proyectophp';
        $username='root';
        $passwd=''; 
        return $this->dbConnect($dbsystem, $host, $dbname, $username, $passwd);
    }
    /**
     * Método para definir la conexión a la base de datos mediante parámetros 
     * devuelve un objeto PDO con la conexión realizada.
     * @param type $dbsystem tipo de base de datos, por ejemplo: mysql, postgresql (database type, for example: mysql, postgresql..
     * @param type $host el host ya sea el nombre correspondiente o la IP directamente.
     * @param type $dbname el nombre de la base de datos a la que nos queremos conectar.
     * @param type $username nombre del usuario para la conexión a la base de datos especificada en el DSN.
     * @param type $passwd contraseña asociada la usuario que definimos para la conexión.
     * @return type PDO devuelve un objeto PDO resultado de la conexión.
     */
    public function dbConnect($dbsystem, $host, $dbname, $username, $passwd){              
        $dsn=$dbsystem.':host='.$host.';dbname='.$dbname;               
        try {          
            $connection = new PDO($dsn, $username, $passwd);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $pdoExcetion) {
            $connection = null;
            echo 'Error al establecer la conexión: '.$pdoExcetion;
            exit();
        }
        //echo 'Conectado a la base de datos: '.$dbname;
        return $connection;        
    }
}