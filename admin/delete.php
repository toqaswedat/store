<?php

include_once './connected.php'; 
 
 if($_SERVER ["REQUEST_METHOD"]=="GET" ){
        $value = $_GET["id"];
        $data=$db->prepare("DELETE  FROM users WHERE id = '$value' ");
        $data->execute();
        header('Location:http://localhost/project1/admin/tables.php');
}


?>