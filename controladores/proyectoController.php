<?php
 
/**
 * CbLanguageController clase donde agrupamos todas las acciones
 * CRUD (Create Read Update Delete), y otras utilidades adicionales para la
 * tabla de la base de datos <b>proyecto</b>.
 * @author Yuri Bonilla
 */

include 'DatabaseConnect.php';
                         
$dConnect = new DatabaseConnect;
$cdb = $dConnect->dbConnectSimple();

class proyectoController {
        
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre proyecto.
     */
    public function readAll(){
        $query = "SELECT * FROM proyecto;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    }   

     /**
     * Devolvemos todos los resultados de la consulta sobre estudiante.
     */
    public function estudiantes(){
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
        $query = "DELETE FROM proyecto WHERE codigo =  '".$codigo."';";
        //print($query);
        $statement = $this->cdb->prepare($query);
        $statement->execute();      
    } 
    
    /**
    * Creamos un nuevo proyecto con los parámetros pasados.
    * @param type $ccodigo
    * @param type $nombre
    * @param type $enlace
    * @param type $nota
    * @param type $Estudiante_codigo
    * @param type $asignatura_codigo
    */
   function create($nombre, $enlace, $nota, $Estudiante_codigo, $asignatura_codigo){ 
       $sqlInsert = "INSERT INTO proyecto(nombre, enlace, nota, Estudiante_codigo, asignatura_codigo)"
                . "    VALUES ('".$nombre."', '".$enlace."', '".$nota."', '".$Estudiante_codigo."', '".$asignatura_codigo."')";
       try {             
           $this->cdb->exec($sqlInsert);      
       } catch (PDOException $pdoException) {            
           echo 'Error crear un nuevo elemento proyecto en create(...): '.$pdoException->getMessage();
           exit();
       }
   }
    
} 