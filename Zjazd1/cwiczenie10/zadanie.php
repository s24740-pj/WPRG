<?php
        $value = $_POST['value'];

        for($i = 1; $i < $value+1; $i++){
                for($k = 0; $k < $i; $k++){
                        echo("*");
                }
                echo("<br>");
        }
        for($i = $value; $i > 0; $i--){
                for($k = 0; $k < $i; $k++){
                        echo("*");
                }
                echo("<br>");
        }

        for($i = 1; $i < $value+1; $i++){
                for($k = 1; $k < $i ; $k++){
                        echo("&nbsp;&nbsp;");
                }
                for($k = 0; $k < $value - $i + 1; $k++){
                        echo("*");
                }
                echo("<br>");
        }
        for($i = 1; $i < $value+1; $i++){
                for($k = 1; $k < $value - $i + 1 ; $k++){
                        echo("&nbsp;&nbsp;");
                }
                for($k = 0; $k < $i; $k++){
                        echo("*");
                }
                echo("<br>");
        }

?>
<br>
<A href="index.html">Powrót</A>