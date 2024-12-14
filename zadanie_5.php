<?php
function stworzSelect($towary, $nazwa_selecta) {
    $options = "<select name=$nazwa_selecta>";

    foreach($towary as $t=>$towar) {
        if(isset($_GET['rzecz']) && $t == $_GET['rzecz']) {
            $options .= "<option value=". $t ." selected>". $towar["nazwa"] ."</option>";
        } else {
            $options .= "<option value=". $t .">". $towar["nazwa"] ."</option>";
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
                $towary_2dim=[
                    "t01" => array("nazwa"=>"tapczan", "cena" => "300", "stan" => 10, "vat" => 23),
                    "t02" => array("nazwa"=>"szafa", "cena" => "500", "stan" => 5, "vat" => 12),
                    "t03" => array("nazwa"=>"stół", "cena" => "1200", "stan" => 8, "vat" => 9),
                    "t04" => array("nazwa"=>"krzesło", "cena" => "700", "stan" => 19, "vat" => 32),
                ];
                echo stworzSelect($towary_2dim, "rzecz");
            ?>
        </form>

        <!-- tabela -->
        <table>
            <thead>
                <th>Nazwa</th>
                <th>Cena</th>
                <th>Stan</th>
                <th>VAT</th>
            </thead>
            <tbody>
                <?php
                    foreach($towary_2dim as $t=>$towar) {
                        echo "<tr>";
                            echo "<td>".$towar["nazwa"]."</td>";
                            echo "<td>".$towar["cena"]."</td>";
                            echo "<td>".$towar["stan"]."</td>";
                            echo "<td>".$towar["vat"]."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>

        <?php echo isset($_GET['rzecz']) ? 
            "Wybrales ".$towary_2dim[$_GET['rzecz']]["nazwa"].
            ", o kwocie ".$towary_2dim[$_GET['rzecz']]["cena"].
            ", gdzie stan wynosi: ".$towary_2dim[$_GET['rzecz']]["stan"].
            ", a vat jest rowny".$towary_2dim[$_GET['rzecz']]["vat"]
        : ''; ?>
    </body>
</html>