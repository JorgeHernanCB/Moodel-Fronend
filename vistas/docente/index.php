   <?php
            
      if ( isset($_SESSION['codigoDocente']) && $_SESSION['codigoDocente'] != '' ){

           require_once("404.html");
          

           }else{

          require_once("index-entro.php");
         }  
?>
         
