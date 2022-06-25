<?php
    session_start();


    if((!isset($_SESSION['zalogowany'])) && (!$_SESSION['zalogowany']==true))
	{
		header('Location: logowanie.php');
		exit();
	}


    if(isset($_POST['usun']))
    {
        
        require_once "connect.php";

        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);

        if($polaczenie->query("DELETE from uzytkownicy where `uzytkownicy`.`user`='" . $_SESSION['user'] . "'"))
		{   //DELETE
            //DELETE from uzytkownicy where `uzytkownicy`.`user`='$_SESSION['user']';
            //DELETE from uzytkownicy where `uzytkownicy`.`user`='kasia';
            //$_SESSION['user'] 
			session_unset();
			header('Location: index.php');
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
            
                <h1>Usun Konto</h1>
                <input class ="username" type="radio"  name="usun" unchecked>
                Zaznacz jesli chcesz usunac
                <input type="submit" value="Usun" class="submit"/>
            </form>
                
        </div>
        <p>Powrot? <a class="fpwd" href="index.php">Strona Glowna!</a></p>
    </div>

</body>

</html>