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
        <div class="contaioner">
            <ul id="buttons">
                <li><button onclick="startTimer()">Start</button></li>
                <li><button onclick="stopTimer()">Stop</button></li>
                <li><button onclick="resetTimer()">Reset</button></li>
            </ul>
        </div>
    </div>

    <script src="main.js"></script>
</body>
</html>

