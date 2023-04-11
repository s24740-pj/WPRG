<?php
        $people = $_POST['people'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['$lastName'];
        $street = $_POST['street'];
        $email = $_POST['email'];
        $cardNumber = $_POST['cardNumber'];
        $cardDate = $_POST['cardDate'];
        $cardCVV = $_POST['cardCVV'];
        $arrivalDate = $_POST['arrivalDate'];
        $departureDate = $_POST['departureDate'];
        $addBed = $_POST['addBed'];
        $airConditioning = $_POST['airConditioning'];
        $cigaretteCase = $_POST['cigaretteCase'];

        echo("<h2>" . "Informacje o rezerwacji" . "</h2>");

        echo("<b>" . "Imię: " . "</b>" . $firstName . "<br>");
        echo("<b>" . "Nazwisko: " . "</b>" . $lastName) . "<br>";
        echo("<b>" . "Adres: " . "</b>" . $street . "<br>");
        echo("<b>" . "Email: " . "</b>" . $email . "<br>");


        echo("<h2>" . "Dane karty kredytowej" . "</h2>");

        echo("<b>" . "Numer karty kredytowej: " . "</b>" . $cardNumber . "<br>");
        echo("<b>" . "Data ważności karty: " . "</b>" . $cardDate . "<br>");
        echo("<b>" . "CCV (3 cyfry z tyłu karty): " . "</b>" . $cardCVV . "<br>");


        echo("<h2>" . "Pobyt" . "</h2>");

        echo("<b>" . "Ilość ludzi: " . "</b>" . $people . "<br>");
        echo("<b>" . "Data przyjazdu: " . "</b>" . $arrivalDate . "<br>");
        echo("<b>" . "Data odjazdu: " . "</b>" . $departureDate . "<br>");

        echo("<h2>" . "Dodatkowe Udogodnienia" . "</h2>");

        switch ($addBed){
            case "on": echo("<b>" . "Czy jest potrzeba dostawienia łóżka: " . "</b>" . "Tak" . "<br>"); break;
            default: echo("<b>" . "Czy jest potrzeba dostawienia łóżka: " . "</b>" . "Nie" . "<br>");
        }

        switch ($airConditioning){
            case "on": echo("<b>" . "Klimatyzacja: " . "</b>" . "Tak" . "<br>"); break;
            default: echo("<b>" . "Klimatyzacja: " . "</b>" . "Nie" . "<br>");
        }

        switch ($cigaretteCase){
            case "on": echo("<b>" . "Papielniczka:" . "</b>" . "Tak" . "<br>"); break;
            default: echo("<b>" . "Papielniczka:" . "</b>" . "Nie" . "<br>");
        }


?>
<br>
<A href="index.html">Powrót</A>