<html>
<head>
 <meta charset="utf-8">
 <title>Tablice - demo</title>
</head>
    <body bgcolor=yellow text="#000FFF">
        <?php
            $options = "";
            $towary=['tap'=>"tapczan",'sza'=>"szafa", 'st'=>"stół",'kr'=>"krzesło"];

            foreach($towary as $t=>$towar) {
                if(isset($_GET['rzecz']) && $t == $_GET['rzecz']) {
                    $options .= "<option value=". $t ." selected>". $towar ."</option>";
                } else {
                    $options .= "<option value=". $t .">". $towar ."</option>";
                }
            }
        ?>

        <form method='GET'>
            <select name='rzecz'>
                <?php echo $options; ?>
                <input type="submit" value="Pokaz informacje" />
            </select>
        </form>

        <?php echo isset($_GET['rzecz']) ? "Wybrales ".$towary[$_GET['rzecz']] : ''; ?>
    </body>
</html>