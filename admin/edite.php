<?php
include_once './connected.php'; 

// $data=$db->prepare("INSERT INTO `users`( `username`, `email`, `password`, `is_admin`) VALUES ('$_POST[]','tharra@gmail.com','11111111111','1'); ");


if($_SERVER ["REQUEST_METHOD"]=="GET" ){
    $value = $_GET["id"];
    $sql="SELECT * FROM users WHERE id ='$value '";
    $result= $db->query($sql);
    $row=$result->fetch(PDO::FETCH_ASSOC);

}

if($_SERVER ["REQUEST_METHOD"]=="POST" ){
    $value = $_GET["id"];
    $data=$db->prepare("UPDATE users SET username='$_POST[editename]',email='$_POST[editeemail]',password='$_POST[editepassword]',is_admin='$_POST[editeisadmen]' WHERE id='$value' ");
        // "UPDATE users SET username=$_POST[editename],email=$_POST[editeemail],password=$_POST[editepassword],is_admin=$_POST[editeisadmen] WHERE id='$value' "
    $data->execute();
    // echo "ttttt";
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

    <title>SB Admin 2 - Login</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST">
                                    <div class="form-group">
                                        <label >is_admin</label>
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="is_admin" value='<?php echo "$row[is_admin]"; ?> ' name="editeisadmen">
                                        </div>
                                        <div class="form-group">
                                        <label >Id</label>

                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="id" value='<?php echo "$row[id]"; ?> ' disabled>
                                        </div>

                                        <div class="form-group">
                                        <label >Email</label>

                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="email" value='<?php echo "$row[email]"; ?> ' name="editeemail"  >
                                        </div>
                                        <div class="form-group">
                                        <label >UserName</label>

                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="username" value='<?php echo "$row[username]"; ?> ' name="editename">
                                        </div>
                                        <div class="form-group">
                                        <label >Password</label>

                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="Password" value='<?php echo "$row[password]"; ?> ' name="editepassword">
                                        </div>
                                        

                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                         edit
                                        </button>

                                    
                                    </form>
                                    
                                </div>
                            </div>
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
