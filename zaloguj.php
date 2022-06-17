<?php
    session_start();//kazda strona ktora bedzie uzywac zmiennych globalnych musimy uzyc session start
    require_once "connect.php"; //wlaczamy plik connect.php do zaloguj.php (once pyta czy juz czasem wczesniej nie zostal dodany)

    $polaczenie = @new mysqli($host,$db_user,$db_password,$db_name);

    if($polaczenie->connect_errno!=0)
    {
        echo "Error: ".$polaczenie->connect_errno;
    }
    else
    {
        $login = $_POST['login'];
        $haslo = $_POST['haslo'];

        $sql = "SELECT * FROM uzytkownicy WHERE user='$login' AND pass='$haslo'";

        if($rezultat = @$polaczenie->query($sql))
        {
            $ilu_userow = $rezultat->num_rows;

            if($ilu_userow>0)
            {
                $wiersz = $rezultat->fetch_assoc();
                $_SESSION['user'] = $wiersz['user']; //jedna z kolumn z baz danych w zmiennej globalnej session
                $rezultat->close();
                header('Location: StronaPoZalogowaniu.php');



                
            }
            else
            {

            }


        }


        $polaczenie->close();
    }

    



?>