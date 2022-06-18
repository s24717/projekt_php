<?php
    session_start();//kazda strona ktora bedzie uzywac zmiennych globalnych musimy uzyc session start

    if ((!isset($_POST['login'])) || (!isset($_POST['haslo'])))//jesli nie podamy haslo lub loginu to kod nie bedzie sie przetwarzal
	{
		header('Location: logowanie.php');
		exit();
	}

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
                $_SESSION['zalogowany'] = true;
                $wiersz = $rezultat->fetch_assoc();
                //$_SESSION['user'] = $wiersz['user']; //jedna z kolumn z baz danych w zmiennej globalnej session potem mozna dodawac(do zmiany)
                unset($_SESSION['blad']);//wywala zmienna globalna "blad" (zrobiona zeby po zalogowaniu zostala usunieta w razie gdy next login)
                $rezultat->close();
                header('Location: StronaPoZalogowaniu.php');  
            }
            else
            {
                $_SESSION['blad'] = '<span style="color:red">Nieprawidlowy login lub haslo!</span>';
                header('Location: logowanie.php'); 
            }


        }


        $polaczenie->close();
    }

    



?>