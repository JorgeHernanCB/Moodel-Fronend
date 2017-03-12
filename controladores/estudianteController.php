<?php
 
/**
 * CbLanguageController clase donde agrupamos todas las acciones
 * CRUD (Create Read Update Delete), y otras utilidades adicionales para la
 * tabla de la base de datos <b>estudiante</b>.
 * @author Yuri Bonilla
 */

include 'DatabaseConnect.php';
                         
$dConnect = new DatabaseConnect;
$cdb = $dConnect->dbConnectSimple();

class estudianteController {
        
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre estudiante.
     */
    public function readAll(){
        $query = "SELECT * FROM estudiante;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    }   

     /**
     * Devolvemos todos los resultados de la consulta sobre estudiante.
     */
    public function delete($codigo){
        $query = "DELETE FROM estudiante WHERE codigo =  '".$codigo."';";
        //print($query);
        $statement = $this->cdb->prepare($query);
        $statement->execute();      
    }  
    
    /**
     * Devolvemos todos los resultados de la consulta sobre estudiante.
     */
    public function buscarEstudiante($codigo){
        $query = "SELECT * FROM estudiante WHERE codigo = ".$codigo.";";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    }   


    /**
     * Devolvemos todos los resultados de la consulta sobre estudiante.
     */
    public function NotasEstudiante($codigo){
        $query = "SELECT * FROM tarea WHERE codigo_estudiante = ".$codigo.";";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    } 

    /**
    * Creamos un nuevo estudiante con los parámetros pasados.
    * @param type $ccodigo
    * @param type $nombre
    * @param type $usuario
    * @param type $email
    * @param type $cuentaGithub
    * @param type $password
    * @param type $Docente_codigo
    * @param type $asignatura_codigo
    */
   function create($codigo, $nombre, $usuario, $email, $cuentaGithub, $password, $Docente_codigo, $asignatura_codigo){ 
       
       try {             

        $sqlInsert = "INSERT INTO estudiante(codigo, nombre, usuario, email, cuentaGithub, password, Docente_codigo, asignatura_codigo)"
                . "    VALUES ('".$codigo."', '".$nombre."', '".$usuario."', '".$email."', '".$cuentaGithub."', '".$password."', '".$Docente_codigo."', '".$asignatura_codigo."')";
           $this->cdb->exec($sqlInsert); 

       } catch (PDOException $pdoException) {            
           echo 'Error crear un nuevo elemento estudiante en create(...): '.$pdoException->getMessage();
           exit();
       }
   }
    
} 