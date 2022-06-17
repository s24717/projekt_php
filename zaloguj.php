<?php

    require_once "connect.php"; //wlaczamy plik connect.php do zaloguj.php (once pyta czy juz czasem wczesniej nie zostal dodany)

    $polaczenie = @$new mysqli($host,$db_user,$db_password,$db_name);

    if($polaczenie->connect_errno!=0)
    {
        echo "Error: ".$polaczenie->connect_errno." Opis: ".$polaczenie->connect_error;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];


        $polaczenie->close();
    }

    



?>