<?php
 
/**
 * CbLanguageController clase donde agrupamos todas las acciones
 * CRUD (Create Read Update Delete), y otras utilidades adicionales para la
 * tabla de la base de datos <b>asignatura</b>.
 * @author Yuri Bonilla
 */

include 'DatabaseConnect.php';
                         
$dConnect = new DatabaseConnect;
$cdb = $dConnect->dbConnectSimple();

class asignaturaController {
        
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre asignatura.
     */
    public function readAll(){
        $query = "SELECT * FROM asignatura;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    }   

    /**
     * Devolvemos todos los resultados de la consulta sobre asignatura.
     */
    public function docentes(){
        $query = "SELECT * FROM docente;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    } 

     /**
     * Devolvemos todos los resultados de la consulta sobre estudiante.
     */
    public function delete($codigo){
        $query = "DELETE FROM asignatura WHERE codigo =  '".$codigo."';";
        //print($query);
        $statement = $this->cdb->prepare($query);
        $statement->execute();      
    } 
    
    /**
    * Creamos un nuevo asignatura con los parámetros pasados.
    * @param type $ccodigo
    * @param type $nombre
    * @param type $docente_codigo
    */
   function create($nombre, $docente_codigo){ 
       $sqlInsert = "INSERT INTO asignatura(nombre, docente_codigo)"
                . "    VALUES ('".$nombre."', '".$docente_codigo."')";
       try {             
           $this->cdb->exec($sqlInsert);      
       } catch (PDOException $pdoException) {            
           echo 'Error crear un nuevo elemento asignatura en create(...): '.$pdoException->getMessage();
           exit();
       }
   }
    
} 