<?php
 
/**
 * CbLanguageController clase donde agrupamos todas las acciones
 * CRUD (Create Read Update Delete), y otras utilidades adicionales para la
 * tabla de la base de datos <b>rubrica</b>.
 * @author Yuri Bonilla
 */

include 'DatabaseConnect.php';
                         
$dConnect = new DatabaseConnect;
$cdb = $dConnect->dbConnectSimple();

class rubricaController {
        
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre rubrica.
     */
    public function readAll(){
        $query = "SELECT * FROM docente;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    }   
    
    /**
    * Creamos un nuevo rubrica con los parámetros pasados.
    * @param type $ccodigo
    * @param type $nombre
    * @param type $descripcion
    * @param type $porcentaje
    * @param type $codigo_actividad
    */
   function create($nombre, $descripcion, $porcentaje, $codigo_actividad){ 
       $sqlInsert = "INSERT INTO rubrica(nombre, descripcion, porcentaje, codigo_actividad)"
                . "    VALUES ('".$nombre."', '".$descripcion."', '".$porcentaje."', '".$codigo_actividad."')";
       try {             
           $this->cdb->exec($sqlInsert);      
       } catch (PDOException $pdoException) {            
           echo 'Error crear un nuevo elemento rubrica en create(...): '.$pdoException->getMessage();
           exit();
       }
   }
    
} 