<?php

      $dsn='mysql:host=localhost; dbname=store'; //data source name
      $user = 'root';
      $pass='';

try{

    $db = new PDO($dsn,$user,$pass);//start new connection with PDO class
    // $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    echo 'you are connected';
    // echo $q;
}
catch(PDOException $e){
    echo 'failed ' . $e->getMessage();
}

?>