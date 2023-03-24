<?php
        $iloczyn_skalarny = 0;

        $first_value1 = $_POST['first_value1'];
        $first_array[0] = $first_value1;
        $first_value2 = $_POST['first_value2'];
        $first_array[1] = $first_value2;
        $first_value3 = $_POST['first_value3'];
        $first_array[2] = $first_value3;
        $first_value4 = $_POST['first_value4'];
        $first_array[3] = $first_value4;
        $first_value5 = $_POST['first_value5'];
        $first_array[4] = $first_value5;

        $second_value1 = $_POST['second_value1'];
        $second_array[0] = $second_value1;
        $second_value2 = $_POST['second_value2'];
        $second_array[1] = $second_value2;
        $second_value3 = $_POST['second_value3'];
        $second_array[2] = $second_value3;
        $second_value4 = $_POST['second_value4'];
        $second_array[3] = $second_value4;
        $second_value5 = $_POST['second_value5'];
        $second_array[4] = $second_value5;

        for($i = 0; $i < 5; $i++){
                $iloczyn_skalarny += $first_array[$i] * $second_array[$i];
        }

        echo("First array: " . $first_array[0] . " , " . $first_array[1] . " , " . $first_array[2] . " , " . $first_array[3] . " , " . $first_array[4] . "<br>");
        echo("Second array: " . $second_array[0] . " , " . $second_array[1] . " , " . $second_array[2] . " , " . $second_array[3] . " , " . $second_array[4] . "<br>");
        echo("Iloczyn skalarny: " . $iloczyn_skalarny);
?>
<br>
<A href="index.html">Powrót</A>