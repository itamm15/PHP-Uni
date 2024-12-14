<?php
function stworzSelect($towary, $nazwa_selecta) {
    $options = "<select name=$nazwa_selecta>";

    foreach($towary as $t=>$towar) {
        if(isset($_GET['rzecz']) && $t == $_GET['rzecz']) {
            $options .= "<option value=". $t ." selected>". $towar ."</option>";
        } else {
            $options .= "<option value=". $t .">". $towar ."</option>";
        }
    }

    return $options .= "</select> <input type=submit value='Pokaz informacje' />";
}
?>
<html>
<head>
 <meta charset="utf-8">
 <title>Tablice - demo</title>
</head>
    <body bgcolor=yellow text="#000FFF">
        <form method='GET'>
            <?php 
                $towary=['tap'=>"tapczan",'sza'=>"szafa", 'st'=>"stół",'kr'=>"krzesło"];
                echo stworzSelect($towary, "rzecz") 
            ?>
        </form>

        <?php echo isset($_GET['rzecz']) ? "Wybrales ".$towary[$_GET['rzecz']] : ''; ?>
    </body>
</html>