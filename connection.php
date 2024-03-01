<?php
   $server  = 'localhost';
   $username  = 'root';
   $pass  = '';
   $db  = 'second_batch_back';



      $con=    mysqli_connect($server,$username, $pass , $db );

      if( $con){

        echo "connect";
      }
      else{

        echo "not connect";
      }

?>