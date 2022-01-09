<link rel="stylesheet" href="asset/nav.css">
<?php 
$host_name=$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME']."/connect";
?>
 <nav class="navbar navbar-expand-lg navstl">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=$host_name?>">Connect</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=$host_name?>/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=$host_name?>/signup.php">Sign Up</a>
        </li>
        
        <?php
         
            
            if(isset($_SESSION['uid'])){
              echo'<li class="nav-item">
              <a class="nav-link active" aria-current="page" href="'.$host_name.'/profile.php">Profile</a>
          
            </li>';
            }


        ?>


<li class="nav-item">
<?php
         
         //session_start();
             if(isset($_SESSION['uid'])){
               echo'<li class="nav-item">
               <a class="nav-link active" aria-current="page" href="'.$host_name.'/logout.php">Logout</a>
           
             </li>';
             }
 
 
         ?>
          
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

</head>
<body>
  
</body>
</html>