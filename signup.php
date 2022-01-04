<?php 
require("helper.php");
//require('mailer.php');
session_start();
$messageModal=['show'=>FALSE,'title'=>'...','body'=>'...'];



if(isset($_POST['submit'])){

  $email=$_POST['email'];
  $password=$_POST['password'];
  $username="";

  $result=find_match($email);//check pattern

  if($result[0]){
  $username=$result[1];

  

    $sql="INSERT INTO `user`( `username`, `password`, `email`,is_active) VALUES ('$username','$password','$email',1)";
    $res=$GLOBALS['conn']->query($sql);
    if ($res === TRUE) {
     


    
      
      $messageModal['show']=TRUE;
      $messageModal['title']='Congrats! Account been created!';
      $messageModal['body']="You can log in now!";
  


    
      
    } else {
      $messageModal['show']=TRUE;
      $messageModal['title']='Invalid information !';
      $messageModal['body']="Your email isn't unique,";
  
      //already have a account with same 
  }
  }else{
    //show some-kind of error 
    $messageModal['show']=TRUE;
    $messageModal['title']='Invalid Email';
    $messageModal['body']="The email address doesn't match with your Organization domain ";

  }


}

  function find_match( $email )
 {

  /** check for patten on the email and determine the username  */
  //  return  a  array that contain patten finding result {true or false } and username
  //  echo $email;

   $pattern = "/(@std.ewubd.edu)|(@ewubd.edu)/";
   if(preg_match($pattern, $email)){
     //2018-1-60-042@std.ewubd.edu
    $username="";
    for ($i=0; $i < strlen($email); $i++) { 
      if($email[$i]=='@'){
        break;
      }
      // string concatenation 

      $username=$username.$email[$i];
    

    }
    return array(TRUE,$username);
    
  }
  return array(FALSE,'');
  
 }

?>



<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>Sign up to connect </title>
  <link rel="stylesheet" href="asset/signup.css">
</head>

<body>
  <!-- nav var  -->
  <?php require_once('component/nav.php'); ?>
  
  <div class="container ">
      


        <div class="row">
      <div class="col-sm"></div>
      <div class="col-md">
      
            <div class="area">
            <h4 class="text-center">Join to Connect</h4>

        <form method="post" action="" class="signupArea">
         
          <div class="form input">
            <label for="email">Email address</label>
            <input type="email" class="form-control " name="email" id="email"
              placeholder="name@std.ewubd.edu/name@ewubd.edu">
          </div>
          <div class="form- input">
            <label for="floatingPassword">Password</label>
            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
          </div>
          <br>

          <button type="submit" name="submit" class="btn btn-primary btn-lg">Create Account</button>
        </form>
            </div>
            </div>

      <div class="col-sm"></div>


    </div>


  </div>
  



  <!-- Modal -->
  <div class="modal fade" id="myModal55" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><?=$messageModal['title']?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p><?=$messageModal['body']?></p>
        </div>

      </div>
    </div>
  </div>



  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
  </script>

  

  <script>
    var myModal = new bootstrap.Modal(document.getElementById('myModal55'), {});

    <?php
    if ($messageModal['show']) {
      echo 'myModal.toggle();';

    }?>
  </script>




</body>

</html>