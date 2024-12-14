<html>
<head>
    <meta charset="utf-8">
    <title>Logowanie</title>
</head>
    <body bgcolor=teal text="#FFFFFF">
    <br>
    <center>
        <?php
            $imie = $_POST['imie'];
            $nazwisko = $_POST['nazwisko'];
            $plec = isset($_POST['plec']) ? $_POST['plec'] : 't';
            $haslo = $_POST['haslo'];

            if($haslo === 'test' && $plec === 't') echo "Witam Pania " . $imie . " w systemie"; 
            if($haslo === 'test' && $plec === 'f') echo "Witam Pana " . $imie . " w systemie";
            if ($haslo !== 'test') echo "Logowanie nieudane."; 
        ?>
        </center>
    </body>    
</html>