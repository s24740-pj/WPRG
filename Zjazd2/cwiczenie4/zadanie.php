<?php
        $number = $_POST['number'];
        $iteration = 0;

        if(is_int($number)){
            echo("Nie jest liczbą całkowitą");
            echo("<br>" . "Ilość pętli: " . $iteration);
        }else{
            if($number > 0){
                if(isPrimeNumber($number)){
                    echo("Liczba jest całkowita, dodatnia i pierwsza");
                    echo("<br>" . "Ilość pętli: " . $iteration);
                }else{
                    echo("Liczba jest całkowita, dodatnia ale nie pierwsza");
                    echo("<br>" . "Ilość pętli: " . $iteration);
                }
            }else{
                if($number == 0){
                    echo("Liczba jest zerem");
                    echo("<br>" . "Ilość pętli: " . $iteration);
                }else{
                    echo("Jest liczbą ujemną");
                    echo("<br>" . "Ilość pętli: " . $iteration);
                }
            }
        }

        function isPrimeNumber($number2){
            global $iteration;

            if ($number2 == 1) {
                return false;
            }
            if ($number2 == 2) {
                return true;
            }

            $sqrt = sqrt($number2);
            for ($i = 2; $i <= $sqrt; $i++) {
                $iteration += 1;
                if ($number2 % $i == 0) {
                    return false;
                }
            }
            return true;

        }
?>
<br>
<A href="index.html">Powrót</A>