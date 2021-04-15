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

    <link rel="stylesheet" href="style.css">
</head>
<body>
<script>



</script>
<span id='ct5'></span>
    <div id="stopwatch">
        00:00:00
    </div>
    <div class="card-timer">
        <ul id="buttons">
            <li><button onclick="startTimer()">Start</button></li>
            <li><button onclick="stopTimer()">Stop</button></li>

            <li><button onclick="resetTimer()">Reset</button></li>
        </ul>
    </div>

    <script src="main.js"></script>
</body>
</html>

