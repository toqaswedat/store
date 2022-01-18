<!-- <!DOCTYPE html>
<?php
      session_start();




 if (isset($_POST['submit'])){
   $mail = $_POST['uname'];
   $pass = $_POST['psw'];
    $userdata= $_SESSION["user"];
    foreach($userdata as $user){
      if($user['email']== $mail && $user['password']== $pass){
        $_SESSION ['userlogin']= [$mail];
        header('Location:http://localhost/test/landing.php');
      }
      else 
      echo "yyyyyy";
    }

if(!empty($user) && !empty ($pass) ){
  if($user=="toqa" && $pass =="12345678"){
    echo("user name and password matched");
  }else{
    echo ('error!');
  }
}else {
  echo "enter your name and pass";
}
}

?>


<html>
  <head>
    <title>Simple login form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      display: flex;
      justify-content: center;
      font-family: Roboto, Arial, sans-serif;
      font-size: 15px;
      }
      form {
      border: 5px solid #f1f1f1;
      }
      input[type=text], input[type=password] {
      width: 100%;
      padding: 16px 8px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
      }
      button {
      background-color: #8ebf42;
      color: white;
      padding: 14px 0;
      margin: 10px 0;
      border: none;
      cursor: grabbing;
      width: 100%;
      }
      h1 {
      text-align:center;
      fone-size:18;
      }
      button:hover {
      opacity: 0.8;
      }
      .formcontainer {
      text-align: left;
      margin: 24px 50px 12px;
      }
      .container {
      padding: 16px 0;
      text-align:left;
      }
      span.psw {
      float: right;
      padding-top: 0;
      padding-right: 15px;
      }
      /* Change styles for span on extra small screens */
      @media screen and (max-width: 300px) {
      span.psw {
      display: block;
      float: none;
      }
    </style>
  </head>
  <body>
    <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
      <h1>Login Form</h1>
      <div class="formcontainer">
      <hr/>
      <div class="container">
        <label for="uname"><strong>Email</strong></label>
        <input type="text" placeholder="Enter Username" name="uname" required>
        <label for="psw"><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="psw" required>
      </div>
      <button type="submit" name='submit'>Login</button>
      
    </form>
  </body>
</html>
<?php

// echo "<br>";
  // var_dump($_SESSION["user"]);


?> -->

<?php
   session_start();

$username='root';
$pass='';

try{
    $connected=new PDO ("mysql:host=localhost;dbname=store",$username,$pass);
    // echo "Connected successfully";
}

catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// var_dump($_SESSION["Register"]);
echo "<br>";


if($_SERVER["REQUEST_METHOD"]=="POST"){
 $email=$_POST["email"];
 $password=$_POST["password"];

 if(empty($email) || empty($password)){
     $messageErr="the password or email not valid";
 }

// $result="";
  
//  foreach($_SESSION["Register"] as $element){
//     if($element["Email"]==$email && $element["password"]==$password){
//         $_SESSION["Login"]=[
//             "emailLogin"=>$email,
//         ];

//         header("Location: http://localhost/form/welcom.php/");

      
      
//     }

//     else{
       
//    $result= "the password or email is not valid ";
//     }
    

//  }
//  echo $result;

 $stmt = $connected->prepare("SELECT * FROM users
  WHERE email='$email' AND password='$password'
  ");

    
$stmt->execute();

echo $stmt->rowCount();

if ($stmt->rowCount() != 0) {
    // echo "true";

    $_SESSION["userLogin"]=[
        'email'=>$email,
    ];

    header("Location: http://localhost/test/landing.php");
} else {
    echo "no Register";
}

}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link href="https://use.fontawesome.com/releases/v5.0.11/css/all.css" rel="stylesheet">




    <title>Document</title>
</head>
<body>
<div class="nav-side-menu">
   

   <div class="container">
       <h2 class="">&nbsp</h2>
       <div class="row">
           <div class="col-12 col-md-8 col-lg-6 pb-5">
   
   
                       <!--Form with header-->
   
                       <form action=""   method="POST">
                           <div class="card border-primary rounded-0">
                               <div class="card-header p-0">
                                   <div class="bg-info text-white text-center py-2">
                                       <h3><i class="fa fa-envelope"></i> login</h3>
                                      
                                   </div>
                               </div>
                               <div class="card-body p-3">
   
                                   <!--Body-->
                                                   
                                   <div class="form-group">
                                       <div class="input-group mb-2">
                                           <div class="input-group-prepend">
                                               <div class="input-group-text"><i class="fa fa-envelope text-info"></i></div>
                                           </div>
                                           <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" ></input>
                                         
                                       </div>
                                   </div>
                                   
                                  
                                   <div class="form-group">
                                       <div class="input-group mb-2">
                                           <div class="input-group-prepend">
                                               <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                           </div>
                                           <input type="password" class="form-control" id="password" name="password" placeholder="password"  ></input>
                                           <span><?php if(isset($messageErr))  echo $messageErr."<br>" ; ?></span>
                                       </div>
                                   </div>
                                 
    
                                   <div class="text-center">
                                       <input type="submit" value="login" class="btn btn-info btn-block rounded-0 py-2"></input>
                                   </div>
                               </div>
   
                           </div>
                       </form>
                       <!--Form with header-->
   
   
                   </div>
       </div>
   </div>
   
</body>
</html>