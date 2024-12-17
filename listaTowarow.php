<?php
    $nazwa_plik = "lista_towarow.txt";
    // Dodawanie do pliku
    $nazwa = $_GET['nazwa'] ?? '';
    $cena_netto = $_GET['cena_netto'] ?? '';
    $stawka_vat = $_GET['stawka_vat'] ?? '';

    if(!empty($nazwa)) {
        $plik = fopen($nazwa_plik, "a");
        $wartosci = "$nazwa;$cena_netto;$stawka_vat\n";
        fputs($plik, $wartosci);
        fclose($plik);
        // ochrona przez dublowaniem 
        header('Location: listaTowarow.php');
    }
?>
<html>
    <head>
    <meta charset="utf-8">
    <title>Lista towarow</title>
    </head>
    <body bgcolor="yellow">
        <form method="GET" action="">
            <p align="center">
                Nazwa: <input type="text" name="nazwa" /> <br>
                Cena netto: <input type="number" name="cena_netto" /> <br>
                Stawka VAT: <input type="text" name="stawka_vat" /> <br>
                <button type="submit">Stworz towar</button>
            </p>
        </form>
        <table>
            <thead>
                <tr>
                    <th>Nazwa</th>
                    <th>Stawka netto</th>
                    <th>Stawka VAT</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $plik = @fopen($nazwa_plik, "r") or exit("Cos poszlo nie tak podczas odczytu pliku!");
                    while(true) {
                        $linia = trim(fgets($plik));
                        $wartosci_z_linii = explode(";", $linia);
                        echo <<<WIERSZ
                        <tr>
                            <td>$wartosci_z_linii[0]</td>
                            <td>$wartosci_z_linii[1]</td>
                            <td>$wartosci_z_linii[2]</td>
                        </tr>
                        WIERSZ;

                        if(feof($plik)) break;
                    }
                ?>
            </tbody>
        </table>
    </body>
</html> 