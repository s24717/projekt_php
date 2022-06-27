<?php
    session_start();
    
    if((!isset($_SESSION['zalogowany'])) && (!$_SESSION['zalogowany']==true))
	{
		header('Location: logowanie.php');
		exit();
	}


    
    if(isset($_POST['emailform']))
    {   


        //flaga czy wszystko ok
        $wszystko_OK=true;
        //lista zmiennych
        $imie = $_POST['imieform'];
        $nazwisko = $_POST['nazwiskoform'];
        $email = $_POST['emailform'];
        $kategoria = $_POST['kategoriaform'];



        //Imie
        
        $imie = htmlentities($imie, ENT_QUOTES, "UTF-8");//funkcja zabezpieczajaca przed sql
        
        if((strlen($imie)<2) || (strlen($imie)>15)) //dlugosc imienia zeby czasem nie wkleil jakiejs ksiazki xd 
		{
			$wszystko_OK=false;
			$_SESSION['blad_imie']= '<span style="color:red">Imie za dlugie lub niepoprawne!</span>';
		}


        //Nazwisko(to samo co imie)
        
        $nazwisko = htmlentities($nazwisko, ENT_QUOTES, "UTF-8");//funkcja zabezpieczajaca przed sql
        
        if((strlen($nazwisko)<2) || (strlen($nazwisko)>15)) //dlugosc nazwiska zeby czasem nie wkleil jakiejs ksiazki xd 
		{
			$wszystko_OK=false;
			$_SESSION['blad_nazwisko']= '<span style="color:red">Nazwisko za dlugie lub niepoprawne!</span>';
		}


        //poprawnosc emaila
       
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);//sprawdza nam czy jest poprawny email ale usuwa nam niektore znaki wiec:
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))//tworzymy warunek ktory sprawdza nam czy nie obcielo nam nic z funkcji
		{
			$wszystko_OK=false;
			$_SESSION['blad_email']='<span style="color:red">Podaj poprawny email!</span>';
		}


        if($wszystko_OK==true)
        {
            $_SESSION['imieform'] = $imie;
            $_SESSION['nazwiskoform'] = $nazwisko;
            $_SESSION['emailform'] = $email;
            $_SESSION['kategoriaform']= $kategoria;
            $_SESSION['walidacja']= true;

            header('Location: zatwierdz.php');
        }
        


    }
   



?>

<!DOCTYPE HTML>
<html lang="pl">
<head>
<meta charset="utf-8" />
	<title>Logowanie</title>
	<meta name="description" content="Serwis poświęcony sklepowi internetowemu i zaliczeniu projektu php" />
	<meta name="keywords" content="sklep,internetowy,market,zakupy" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <link rel="stylesheet" href="css/login.css" type="text/css" />
</head>

<body>
    


    <div id="absoluteCenteredDiv">
        <div class="box">
            <form method="post">
            
                <h1>Formularz Dostaw</h1>
                <input class="username" name="imieform" type="text" placeholder="Imie">
                <?php
                    if(isset($_SESSION['blad_imie']))
                    {
                        echo $_SESSION['blad_imie'];
                        unset($_SESSION['blad_imie']);
                    }
                ?>
                <input class="username" name="nazwiskoform" type="password" placeholder="Nazwisko">
                <?php
                    if(isset($_SESSION['blad_nazwisko']))
                    {
                        echo $_SESSION['blad_nazwisko'];
                        unset($_SESSION['blad_nazwisko']);
                    }
                ?>
                <input class="username" name="emailform" type="text" placeholder="E-mail">
                <?php
                    if(isset($_SESSION['blad_email']))
                    {
                        echo $_SESSION['blad_email'];
                        unset($_SESSION['blad_email']);
                    }
                ?>
                <select name="kategoriaform" class="username">
                    <option value="jedzenie">Inpost</option>
                    <option value="elektronika" selected>Kurier</option>
                </select>

                <input type="submit" value="Przeslij" class="submit"/>
            
            </form>
            <?php
                if(isset($_SESSION['blad_loginform']))
                {
                    echo $_SESSION['blad_loginform'];
                    unset($_SESSION['blad_loginform']);
                }

            ?>
                
        </div>
        <p><a class="fpwd" href="konto.php">Moje Konto </a></p>
        
    </div>

</body>

</html>