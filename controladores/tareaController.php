<?php
 
/**
 * CbLanguageController clase donde agrupamos todas las acciones
 * CRUD (Create Read Update Delete), y otras utilidades adicionales para la
 * tabla de la base de datos <b>tarea</b>.
 * @author Yuri Bonilla
 */

include 'DatabaseConnect.php';
                         
$dConnect = new DatabaseConnect;
$cdb = $dConnect->dbConnectSimple();

class tareaController {
        
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre tarea.
     */
    public function readAll(){
        $query = "SELECT * FROM tarea;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    }   
    

    /**
     * Devolvemos todos los resultados de la consulta sobre tarea.
     */
    public function actividades(){
        $query = "SELECT * FROM actividad;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    }


      /**
     * Devolvemos todos los resultados de la consulta sobre estudiante.
     */
    public function delete($codigo){
        $query = "DELETE FROM tarea WHERE codigo =  '".$codigo."';";
        //print($query);
        $statement = $this->cdb->prepare($query);
        $statement->execute();      
    } 

      /**
     * Devolvemos todos los resultados de la consulta sobre estudiante.
     */
    public function calificar($nota, $codigo){
        $query = "UPDATE tarea  SET nota = '".$nota."' WHERE codigo =  '".$codigo."';";
        //print($query);
        $statement = $this->cdb->prepare($query);
        $statement->execute();      
    } 

     /**
     * Devolvemos todos los resultados de la consulta sobre estudiante.
     */
    public function comentar($comentario, $codigo){
        $query = "UPDATE tarea  SET comentario = '".$comentario."' WHERE codigo =  '".$codigo."';";
        //print($query);
        $statement = $this->cdb->prepare($query);
        $statement->execute();      
    } 

 /**
     * Devolvemos todos los resultados de la consulta sobre actividad.
     */
    public function buscar($codigo){
        $query = "SELECT * FROM actividad WHERE codigo = ".$codigo.";";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    }  


    /**
    * Creamos un nuevo idioma con los parámetros pasados.
    * We create a new language with parameters .
    * @param type $codigo
    * @param type $enlace
    * @param type $nota
    * @param type $comentario
    * @param type $codigo_docente
    * @param type $codigo_estudiante
    * @param type $codigo_actividad
    */
   function create($enlace, $nota, $comentario, $codigo_docente, $codigo_estudiante, $codigo_actividad){ 
       $sqlInsert = "INSERT INTO tarea(enlace, nota, comentario, codigo_docente, codigo_estudiante, codigo_actividad)"
                . "    VALUES ('".$enlace."', '".$nota."', '".$comentario."', '".$codigo_docente."', '".$codigo_estudiante."', '".$codigo_actividad."')";
       try {             
           $this->cdb->exec($sqlInsert);      
       } catch (PDOException $pdoException) {            
           echo 'Error crear un nuevo elemento tarea en create(...): '.$pdoException->getMessage();
           exit();
       }
   }
    
} 