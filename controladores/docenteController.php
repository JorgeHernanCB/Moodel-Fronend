<?php
 
/**
 * CbLanguageController clase donde agrupamos todas las acciones
 * CRUD (Create Read Update Delete), y otras utilidades adicionales para la
 * tabla de la base de datos <b>docente</b>.
 * @author Yuri Bonilla
 */

include 'DatabaseConnect.php';
                         
$dConnect = new DatabaseConnect;
$cdb = $dConnect->dbConnectSimple();

class docenteController {
        
    var $cdb = null;
    /**
     * Devolvemos todos los resultados de la consulta sobre docente.
     */
    public function readAll(){
        $query = "SELECT * FROM docente;";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    }   

    /**
     * Devolvemos todos los resultados de la consulta sobre docente.
     */
    public function buscarDocente($codigo){
        $query = "SELECT * FROM docente WHERE codigo = ".$codigo.";";
        $statement = $this->cdb->prepare($query);
        $statement->execute();
        $rows = $statement->fetchAll(\PDO::FETCH_OBJ);
        return $rows;         
    } 
    
    /**
    * Creamos un nuevo docente con los parámetros pasados.
    * @param type $ccodigo
    * @param type $nombre
    * @param type $usuario
    * @param type $correo
    * @param type $cuenta
    * @param type $password
    */
   function create($codigo, $nombre, $usuario, $correo, $cuenta, $password){ 
       
       try {           
        $sqlInsert = "INSERT INTO docente(codigo, nombre, usuario, correo, cuenta, password)"
                . "    VALUES ('".$codigo."', '".$nombre."', '".$usuario."', '".$correo."', '".$cuenta."', '".$password."')";

 
           //$this->cdb->execute($sqlInsert); 
           $statement = $this->cdb->prepare($sqlInsert);
           $statement->execute(); 

       } catch (PDOException $pdoException) {            
           echo 'Error crear un nuevo elemento docente en create(...): '.$pdoException->getMessage();
           exit();
       }
   }
    
} 