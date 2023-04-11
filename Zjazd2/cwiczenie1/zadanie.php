<?php
        $value1 = $_POST['value1'];
        $value2 = $_POST['value2'];
        $select1 = $_POST['select1'];

        switch($select1){
            case "Dodawanie": echo("Wynik dodawania: " . $value1 + $value2); break;
            case "Odejmowanie": echo("Wynik odejmowania: " . $value1 - $value2); break;
            case "Mnożenie": echo("Wynik mnożenia: " . $value1 * $value2); break;
            case "Dzielenie": echo("Wynik dzielenia: " . $value1 / $value2); break;
            default: echo("Błąd");
        }

?>
<br>
<A href="index.html">Powrót</A>