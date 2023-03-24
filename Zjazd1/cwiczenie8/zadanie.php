<?php
        $value1 = $_POST['value1'];
        $value2 = $_POST['value2'];
        $value3 = $_POST['value3'];

        //Najmniejsza liczba
        if($value1 <= $value2 && $value1 <= $value3){
                $low = $value1;
        }elseif($value2 <= $value1 && $value2 <= $value3){
                $low = $value2;
        }else{
                $low = $value3;
        }

        //Najwieksza liczba
        if($value1 >= $value2 && $value1 >= $value3){
                $high = $value1;
        }elseif($value2 >= $value1 && $value2 >= $value3){
                $high = $value2;
        }else{
                $high = $value3;
        }

        //Srednia liczba
        $med = $value1 + $value2 + $value3 - $low - $high;

        echo("Liczby rosnaco: " . $low . " , " . $med . " , " . $high . "<br>");
        echo("Liczby malejaco: " . $high . " , " . $med . " , " . $low . "<br>");
?>
<br>
<A href="index.html">Powrót</A>