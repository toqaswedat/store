<?php
include_once './connected.php'; 




if($_SERVER ["REQUEST_METHOD"]=="POST" ){

    $product_name=$_POST['product_name'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $instok=$_POST['instok'];
    $imge=$_POST['imge'];
    $category_id=$_POST['category_id'];

    $data=("INSERT INTO products( product_name, price, description, instok,imge,category_id) VALUES ('$product_name','$price', '$description','$instok','$imge','$category_id') ");
    $db->exec($data);
    // $data->execute();
    var_dump($data);
    header('Location:http://localhost/project1/admin/tables.php');

}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                            </div>
                            <form class="user" method="POST">
                                <!-- <div class="form-group row"> -->
                                    <!-- <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="User Name" name="createname">
                                    </div> -->
                                   
                                <!-- </div> -->
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="product_name" name="product_name">
                                </div>
                                <div class="form-group ">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="price" name="price">
                                </div>
                                <div class="form-group ">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="description" name="description">
                                </div>
                                <div class="form-group ">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="imge" name="imge">
                                </div>
                                <div class="form-group ">
                                        <input type="text" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="instok" name="instok">
                                </div>
                                <div class="form-group ">
                                    <label>categories</label>
                                    <select class="form-control " name="category_id">
                                         <option selected>categories</option>
                                    <?php 
                                       $data=$db->prepare("SELECT * FROM categories");
                                       $data->execute();
                                       foreach($data as $e){
                                        echo"<option  value='$e[id]'> $e[Categories_name]</option>";
                                        }
                                    ?>
                                    </select>
                                     
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Create User
                                </button>
                            </form>
                                <hr>
                           
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>