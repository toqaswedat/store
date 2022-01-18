
<?php
      // session_start();
      $dsn='mysql:host=localhost; dbname=store'; //data source name
      $user = 'root';
      $pass='';
// $options = array(

//     PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAME utf8',
// );
try{

    $db = new PDO($dsn,$user,$pass);//start new connection with PDO class
    // $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    // echo 'you are connected';
    // echo $q;
}
catch(PDOException $e){
    echo 'failed ' . $e->getMessage();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){  
  $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
  if(!preg_match($regex, $_POST['mail']) || empty($_POST['mail'])){
    $error_mail="the email is not valid";
  }
    if($_POST['confpsw'] !== $_POST['psw'] ){
        $error_confpsw="the password not Confirm";
    }
    if(empty($_POST['psw']) || strlen($_POST['psw']) < 8){
        $error_password="Password must be longer than 7 characters ";
    }

    if( (!empty($_POST['psw'])) && (strlen($_POST['psw']) >= 8) && ($_POST['confpsw'] == $_POST['psw'])  && 
    (preg_match($regex, $_POST['mail'])) && (!empty($_POST['mail'])))
    {
      $emailuser=$_POST['mail'];
      $passworduser=$_POST['psw'];
      $username= $_POST['user'];
      $q = "INSERT INTO users ( email ,password,username) VALUES ('$emailuser',$passworduser,'$username')";
      $db->exec($q);

      header("Location: http://localhost/project1/Login2.php");

      
    } 
  }

?>
<!DOCTYPE html>
<html>
  <title>Simple Sign up from</title>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
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
      .icon {
      font-size: 110px;
      display: flex;
      justify-content: center;
      color: #4286f4;
      }
      button {
      background-color: #4286f4;
      color: white;
      padding: 14px 0;
      margin: 10px 0;
      border: none;
      cursor: grab;
      width: 48%;
      }
      h1 {
      text-align:center;
      fone-size:18;
      }
      button:hover {
      opacity: 0.8;
      }
      .formcontainer {
      text-align: center;
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
      <h1>SIGN UP</h1>
      <div class="icon">
        <i class="fas fa-user-circle"></i>
      </div>
      <div class="formcontainer">
      <div class="container">
        <label for="mail"><strong>Username</strong></label>
        <input type="text" placeholder="Enter Username" name="user" required>
        <label for="mail"><strong>E-mail</strong></label>
        <input type="text" placeholder="Enter E-mail" name="mail" >
        <span ><?php if(isset($error_mail))  echo $error_mail; ?> </span><br>
        <label for="psw"><strong>Password</strong></label>
        <input type="password" placeholder="Enter Password" name="psw" >
        <span ><?php if(isset($error_password))  echo $error_password; ?> </span><br>
        <label for="confpsw"><strong>Confirm Password</strong></label>
        <input type="password" placeholder="Enter Confirm Password" name="confpsw" >
        <span ><?php if(isset($error_confpsw))  echo $error_confpsw; ?> </span><br>
        
        </div>
      <button type="submit" name='btn'><strong>SIGN UP</strong></button>

    </form>
  </body>
</html>



<?php 
?>