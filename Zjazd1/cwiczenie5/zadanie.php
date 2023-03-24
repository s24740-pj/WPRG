<?php
        $text = $_POST['input_text'];
        $words = explode(" ", $text);

        echo '"%' . $words[1] . ' ' . $words[0] . '%$#"';
?>
<br>
<A href="index.html">Powrót</A>