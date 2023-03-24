<?php
        $value = $_POST['value'];

        switch($value){
                case 1: echo "Styczen i ma 31 dni"; break;
                case 2: echo "Luty i ma 29 dni"; break;
                case 3: echo "Marzec i ma 31 dni"; break;
                case 4: echo "Kwiecien i ma 30 dni"; break;
                case 5: echo "Maj i ma 31 dni"; break;
                case 6: echo "Czerwiec i ma 30 dni"; break;
                case 7: echo "Lipiec i ma 31 dni"; break;
                case 8: echo "Sierpien i ma 31 dni"; break;
                case 9: echo "Wrzesien i ma 30 dni"; break;
                case 10: echo "Pazdziernik i ma 31 dni"; break;
                case 11: echo "Listopad i ma 30 dni"; break;
                case 12: echo "Grudzien i ma 31 dni"; break;
                default: echo "BLAD"; break;
        }
        
?>
<br>
<A href="index.html">Powrót</A>