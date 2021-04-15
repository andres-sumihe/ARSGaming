<?php 
    session_id("Login");
    session_start();
    $username = $_SESSION['username'];
    if(!isset($username)){
        header("Location: login.php");
    }
    session_write_close();
 ?>
<?php
    require ('TxtDb.class.php');
    $db = new TxtDb([
        'dir'      => 'db/',
        'extension' => 'txtdb',
        'encrypt'   => false,
    ]);
?>
<html>
<head>

    <title>ARSGaming</title>

    <link rel="stylesheet" href="style.css?version=1">
    <meta name="viewport" content="width=device-width,initial-scale=1">
</head>

<body>

    <h2>ARS GAMING</h2>
    <span id='ct5'></span>
    
    <div class="card">
        
        <div id="stopwatch"> 00:00:00 </div>
        <table>
            <tr>
                <td style="width:100px;">Biaya</td>
                <td>: </td>
            </tr>
            <tr>
                <td>Jam Mulai</td>
                <td>: </td>
            </tr>
        </table>
        <div class="container">
            
        </div>
    </div>
<<<<<<< HEAD

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <div id="watchgroup">
        <div class="basic stopwatch"></div> 
        <div class="basic stopwatch"></div>
    </div>

=======
    <form method="post" action="checkLogout.php">
        <br>
        <br>
        <input type="submit" name="submit" value="Logout">
    </form>
>>>>>>> f3c2c58481aaad15ae8209dad7f30911527a8a01
    <script src="main.js"></script>
</body>
</html>

