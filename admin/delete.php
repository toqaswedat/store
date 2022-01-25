<?php

include_once './connected.php'; 
        if($_SERVER["REQUEST_METHOD"]==="GET"){
            $delete=$_GET['id'];
            if($_GET['name']==="products"){
                $sql="Delete FROM products WHERE id='$delete'";
                $result=$db->prepare($sql);
                $result->execute();
        }
       else if($_GET['name']==="category"){
        $sql="Delete FROM products WHERE category_id='$delete'";
        $result=$db->prepare($sql);
        $result->execute();
        $sql1="Delete FROM categories WHERE id='$delete'";
        $result=$db->prepare($sql1);
        $result->execute();

       }
       else {
        $sql="Delete FROM users WHERE id='$delete'";
        $result=$db->prepare($sql);
        $result->execute();
        }
    
    header('Location:http://localhost/project1/admin/tables.php');
    }
    



?>