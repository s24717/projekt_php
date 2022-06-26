<?php
    session_start();
    $cena1 = $_POST['cena1'];
    $cena2 = $_POST['cena2'];
    $cena1 = htmlentities($cena1, ENT_QUOTES, "UTF-8");
    $cena2 = htmlentities($cena2, ENT_QUOTES, "UTF-8");

    if((is_numeric($cena1)) && (is_numeric($cena2)))
    {
        $_SESSION['cena'] = "SELECT * FROM produkty WHERE produkty.cena >= '$cena1' AND produkty.cena <= '$cena2'";
    }
    else
    {
        $_SESSION['cena_blad'] = '<span style="color:red">Tylko Cyfry!</span>';
    }
    header('Location: StronaPoZalogowaniu.php');
    
?>