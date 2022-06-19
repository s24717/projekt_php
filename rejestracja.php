<?php
    session_start();

    if (isset($_POST['email1']))
	{   
        
		//zmienna ktora jest sluzy jako flaga
		$wszystko_OK=true;
		
		//sprawdzamy login i odrazu funkcje ktora chroni nas przed zastrzykami sql i javascriptu
        $login1 = $_POST['login1'];
        $login1 = htmlentities($login1, ENT_QUOTES, "UTF-8");//funkcja zabezpieczajaca przed sql
		
		if (ctype_alnum($login1)==false)//funkcja sprawdzajaca czy sa tylko znaki
		{
			$wszystko_OK=false;
			$_SESSION['blad_login']='<span style="color:red">Login moze skladac sie tylko z liter i cyfr</span>';
		}

		//Sprawdzenie długości loginu
		if((strlen($login1)<8) || (strlen($login1)>15))
		{
			$wszystko_OK=false;
			$_SESSION['blad_login']= '<span style="color:red">Login musi posiadac od 8 do 15 znakow!</span>';
		}

        //poprawnosc hasla

        $haslo1 = $_POST['haslo1'];
        $haslo1 = htmlentities($haslo1, ENT_QUOTES, "UTF-8");//funkcja zabezpieczajaca przed sql

        if (ctype_alnum($haslo1)==false)//funkcja sprawdzajaca czy sa tylko znaki
		{
			$wszystko_OK=false;
			$_SESSION['blad_haslo']='<span style="color:red">Haslo moze skladac sie tylko z liter i cyfr</span>';
		}

		//Sprawdzenie długości loginu
		if((strlen($haslo1)<4) || (strlen($haslo1)>15))
		{
			$wszystko_OK=false;
			$_SESSION['blad_haslo']= '<span style="color:red">Haslo musi posiadac od 4 do 15 znakow!</span>';
		}


        

        //poprawnosc emaila
        $email1 = $_POST['email1'];
		$emailB = filter_var($email1, FILTER_SANITIZE_EMAIL);//sprawdza nam czy jest poprawny email ale usuwa nam niektore znaki wiec:
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email1))//tworzymy warunek ktory sprawdza nam czy nie obcielo nam nic z funkcji
		{
			$wszystko_OK=false;
			$_SESSION['blad_email']='<span style="color:red">Podaj poprawny email!</span>';
		}
        
        //sprawdzanie czy to co podales jest juz w bazie danych

        require_once "connect.php"; //wlaczamy plik connect.php do rejestracja.php (once pyta czy juz czasem wczesniej nie zostal dodany)

        mysqli_report(MYSQLI_REPORT_STRICT);
		
		try //testujemy nowy sposob z neta na laczenie sie z baza danych
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);//standardowo
			
			if ($polaczenie->connect_errno!=0) //jesli sie nie polaczy to rzuc wyjatkiem 
			{
				throw new Exception(mysqli_connect_errno());
			}
			else // w innym wypadku jesli sie polaczy to wysylamy zapytania czy sa juz zajete login i email
			{
				//Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email1'");
				
				if(!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['blad_email']='<span style="color:red">Istnieje juz taki email!</span>';
				}		

				//Czy login jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$login1'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['blad_login']='<span style="color:red">Istnieje juz taki Login!</span>';
				}
				
				if ($wszystko_OK==true)
				{
					//dodajemy gracza do bazy
					
					if ($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL, '$login1', '$haslo1', '$email1', 100, 100, 100, 14)"))
					{
						
						header('Location: logowanie.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
			}
			
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			echo '<br />Informacja developerska: '.$e;
		}

    }

?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
	<title>Rejestracja</title>
	<meta name="description" content="Serwis poświęcony sklepowi internetowemu i zaliczeniu projektu php" />
	<meta name="keywords" content="sklep,internetowy,market,zakupy" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="css/login.css" type="text/css" />
</head>

<body>
    


    <div id="absoluteCenteredDiv">
        <div class="box">
            <form method="post">
            
                <h1>Rejestracja</h1>
                <input class="username" name="login1" type="text" placeholder="Login">
                <?php
                    if(isset($_SESSION['blad_login']))
                    {
                        echo $_SESSION['blad_login'];
                        unset($_SESSION['blad_login']);
                    }
                ?>
                
                <input class="username" name="haslo1" type="text" placeholder="Haslo">
                <?php
                    if(isset($_SESSION['blad_haslo']))
                    {
                        echo $_SESSION['blad_haslo'];
                        unset($_SESSION['blad_haslo']);
                    }
                ?>
                <input class="username" name="email1" type="text" placeholder="E-mail">
                <?php
                    if(isset($_SESSION['blad_email']))
                    {
                        echo $_SESSION['blad_email'];
                        unset($_SESSION['blad_email']);
                    }
                ?>
                <input type="submit" value="Zarejestruj Sie" class="submit"/>
            
            </form>
                
        </div>
        <p>Masz juz konto? <a class="fpwd" href="logowanie.php">Zaloguj sie!</a></p>
    </div>

</body>

</html>