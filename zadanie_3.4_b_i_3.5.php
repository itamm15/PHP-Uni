<?php
$result = [];
 function netto($brutto, $vat) {
    return ($brutto / (1 + ($vat / 100)));
 }
 
 function netto2($brutto, $vat, &$netto) {
    $netto = ($brutto / (1 + ($vat / 100)));
 }

 function netto3() {
    global $brutto, $vat;
    return ($brutto / (1 + ($vat / 100)));
 }


// zakomentowane na potrzeby zadania 3.4 + 3.5
//  function czyBruttoPoprawne($brutto) {
//     return is_numeric($brutto) && $brutto > 0;
//  }

//  function czyVatPoprawne($vat) {
//     return is_numeric($vat) && $vat >= 0 && $vat <= 100;
//  }

 // Zadanie 3.4 b) + 3.5
 function czyBruttoPoprawne($brutto) {
    global $result;
    if(is_numeric($brutto) && $brutto > 0) {
        return true;
    } else {
        $result[] = "Zrodlo bledu: Brutto. Powod bledu: Brutto zostalo zle podane.";
        return false;
    }
 }

 function czyVatPoprawne($vat) {
    global $result;
    if(is_numeric($vat) && $vat >= 0 && $vat <= 100) {
        return true;
    } else {
        $result[] = "Zrodlo bledu: VAT. Powod Bledu: Nieprawidlowy VAT";
        return false;
    }
 }
?>
<html>
    <head>
        <meta charset="utf-8">
        <title>Oblicz cenę</title>
    </head>
    <body bgcolor=yellow text="#000FFF">
        <br>
        <form method='GET' action=''>
            <table width='70%' border=1>
                <tr>
                    <td width=20% align=center> Cena brutto
                    <input type=text name='brutto' size=15 style='text-align: left'> zł
                </td>
                    <td width=15% align=center>VAT [%]
                    <input type=text name='vat' size=5 style='text-align: left'> </td>
                    <td width=10% align=center> <input type=submit value='Oblicz'> </td>
                </tr>
                <tr>
                    <?php
                    if(isset($_GET['brutto']) && isset($_GET['vat'])) {
                        global $result;
                        $brutto = $_GET['brutto'];
                        $vat = $_GET['vat'];
                        $czyBruttoPoprawne = czyBruttoPoprawne($brutto);
                        $czyVatPoprawne = czyVatPoprawne($vat);

                        if(empty($result)) {
                            $netto = 0;
                            // netto_2 
                            // number_format(netto2($brutto, $vat, $netto), 2);

                            // netto_3
                            $netto = number_format(netto3(), 2);
                            echo "<td colspan=2><b>Cena netto: $netto zl</b></td>";
                        } else {
                            foreach($result as $error) {
                                echo $error . "<br/>";
                            }
                        }
                    }
                    ?>
                </tr>
            </table>
        </form>
    </body>
</html> 