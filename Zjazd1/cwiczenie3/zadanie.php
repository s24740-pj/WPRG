<?php
        $value = $_POST['input_value'];
        echo "Pierwiastek kwadratowy: " . number_format((float)sqrt($value), 2, '.', '');
        
?>
<br>
<A href="index.html">Powrót</A>