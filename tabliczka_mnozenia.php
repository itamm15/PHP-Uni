<html>
<head>
 <meta charset="utf-8">
 <title>Tabliczka mnozenia</title>
 <style>
    * {
        margin: 0;
    }
 </style>
</head>
    <body style="display: flex; justify-content: center; background-color: #2596be;">
        <div>
            <div style="display: flex; flex-direction: column; margin-top: 50px">
                <p style="text-align: center">Podaj zakres tabliczki mnozenia</p>
                <form method="GET" action='' style="margin-top: 20px">
                    Od <input type="number" name="zakres_poczatek" />
                    Do <input type="number" name="zakres_koniec" />
                    <button type="submit">Podaj talbliczke</button>
                </form>
            <div>
            <div style="display: flex; justify-content: center; margin-top: 30px;">
                <!-- tabliczka mnozenia -->
                <table style="text-align: center">
                <?php
                if(isset($_GET['zakres_poczatek']) && isset($_GET['zakres_koniec'])) {
                    $start = $_GET['zakres_poczatek'];
                    $koniec = $_GET['zakres_koniec'];

                    if(is_numeric($start) && is_numeric($koniec) && $koniec >= $start) {
                        echo "<tr>";
                        for ($i = $start; $i <= $koniec; $i++) {
                            if ($i == $start) {
                                echo "<td></td> ";
                            } 
                            echo "<td style='color: yellow'>".$i . "</td> "; 
                        }
                        echo "<tr />";
                        for($i = $start; $i <= $koniec; $i++) {
                            echo "<tr>";
                            for($j = $start; $j <= $koniec; $j++) {
                                if($j == $start) {
                                    echo "<td style='color: yellow'>".($i) . "</td>";
                                }
                                echo "<td style='background-color: blue'>".$i * $j . "</td>"; 
                            }
                            echo "<tr />";
                        }
                    } else {
                        echo "Wartosci podane niepoprawnie!";
                    }
                }
                ?>
                </table>
            </div>
        </div>
    </body>
</html>