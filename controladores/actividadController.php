<?php
 
/**
 * CbLanguageController clase donde agrupamos todas las acciones
 * CRUD (Create Read Update Delete), y otras utilidades adicionales para la
 * tabla de la base de datos <b>actividad</b>.
 * @author Yuri Bonilla
 */

include 'DatabaseConnect.php';
                         
$dConnect = new DatabaseConnect;
$cdb = $dConnect->dbConnectSimple();

class actividadController {
        
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre actividad.
     */
    public function readAll(){
        $query = "SELECT * FROM actividad;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    }   

     /**
     * Devolvemos todos los resultados de la consulta sobre actividad.
     */
    public function rubricasDeLaActividad($codigo){
        $query = "SELECT * FROM rubrica WHERE codigo_actividad = ".$codigo.";";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    }   
    
    /**
     * Devolvemos todos los resultados de la consulta sobre actividad.
     */
    public function proyecto(){
        $query = "SELECT * FROM proyecto;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    } 


      /**
     * Devolvemos todos los resultados de la consulta sobre estudiante.
     */
    public function delete($codigo){
        $query = "DELETE FROM actividad WHERE codigo =  '".$codigo."';";
        //print($query);
        $statement = $this->cdb->prepare($query);
        $statement->execute();      
    } 

      

    /**
    * Creamos un nuevo actividad con los parámetros pasados.
    * @param type $ccodigo
    * @param type $nombre
    * @param type $fechaLimite
    * @param type $lenguajeProgramacion
    * @param type $etiqueta
    * @param type $enlace
    * @param type $Docente_codigo
    * @param type $proyecto_codigo
    */
   function create($nombre, $fechaLimite, $lenguajeProgramacion, $etiqueta, $enlace, $Docente_codigo, $proyecto_codigo){ 
       $sqlInsert = "INSERT INTO actividad(nombre, fechaLimite, lenguajeProgramacion, etiqueta, enlace, Docente_codigo, proyecto_codigo)"
                . "    VALUES ('".$nombre."', '".$fechaLimite."', '".$lenguajeProgramacion."', '".$etiqueta."', '".$enlace."', '".$Docente_codigo."', '".$proyecto_codigo."')";
       try {             
           $this->cdb->exec($sqlInsert);      
       } catch (PDOException $pdoException) {            
           echo 'Error crear un nuevo elemento actividad en create(...): '.$pdoException->getMessage();
           exit();
       }
   }
    
} 