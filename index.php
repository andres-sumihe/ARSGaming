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

    <link rel="stylesheet" href="style.css?version=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>

<body>
    <form method="post" action="checkLogout.php">
        <br>
        <br>
        <input type="submit" name="submit" value="Logout">
    </form>
        
    
    <h2>ARS GAMING</h2>
    <span id='ct5'></span>

    <div id="watchgroup">
        <div class="basic stopwatch card"></div> 
        <div class="basic stopwatch card"></div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="main.js?version=1"></script>
</body>
</html>

