<?php
        $text = $_POST['text'];
        $text_lower = strtolower($text);
        $alphabet = range('a', 'z');
        
        switch(pangram_checker($text_lower, $alphabet)){
                case 0: echo("False"); break;
                case 1: echo("True"); break;
        }

        function pangram_checker($text_lower, $alphabet){
                $check = 0;

                for($i = 0; $i < count($alphabet); $i++){
                        for($k = 0; $k < strlen($text_lower); $k++){
                                if(substr($text_lower, $k, 1) == $alphabet[$i]){
                                        $check = 1;
                                }
                        }
                        if($check == 0){
                                return false;
                        }
                        $check = 0;
                }
                return true;
        }


?>
<br>
<A href="index.html">Powrót</A>