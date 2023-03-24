<?php
        $A = $_POST['value_A'];
        $B = $_POST['value_B'];
        $C = $_POST['value_C'];

        if($A + $B > $C && $A + $C > $B && $B + $C > $A)
                echo("Da sie zbudowac trojkat");
        else
                echo("Nie da sie zbugowac trojkatu");
        
?>
<br>
<A href="index.html">Powrót</A>