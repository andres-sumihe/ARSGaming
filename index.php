<?php 
    session_id("Login");
    session_start();
    $username = $_SESSION['username'];
    require ('TxtDb.class.php');
    if(!isset($username)){
        header("Location: login.php");
    }
    session_write_close();

    $db = new TxtDb([
        'dir'      => 'db/',
        'extension' => 'txtdb',
        'encrypt'   => false,
    ]);

    if(isset($_POST["name"])) {
        $tableName = $_POST["name"];
        $time = $_POST["time"];
        $db->update($tableName, [
            "waktu_mulai" => $time,
        ],0);
    };
?>
<html>
<head>

    <title>ARSGaming</title>

    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css?version=<?=time();?>">
</head>

<body>
    
        
    
<div class="container-fluid p-0">
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
    

    <form method="post" action="checkLogout.php" class="form-inline ml-auto my-2 my-lg-0">
        <br>
        <br>
        <input type="submit" name="submit" value="Logout" class="btn btn-outline-success my-2 my-sm-0">
    </form>
  </div>
</nav>
</div>
    
    <div class="w-100 d-flex flex-column align-item-center">
        <img src="/ARSGaming/assets/logo.png" class="logo-img" />
        <p id='ct5' class="text-center">
            loading watch...
        </p>
	</div>

    <div id="watchgroup">
        <div class="basic stopwatch card"></div> 
        <div class="basic stopwatch card"></div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="main.js?version=<?=time();?>"></script>
</body>
</html>

