<?php
   function render($template,$data=array()){
       $path=__DIR__.'/../views/'.$template.'.php';
       //$path=__DIR__.'/../views/'.'index.php';
       if(file_exists($path)){
          extract($data);
          require($path);
       }
   }
?>