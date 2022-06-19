<?php
    session_start();

    if (isset($_POST['email']))
	{
		//zmienna ktora jest sluzy jako flaga
		$wszystko_OK=true;
		
		//sprawdzamy login
		$login = $_POST['login'];
		
		//Sprawdzenie długości loginu
		if ((strlen($login)<8) || (strlen($login)>15))
		{
			$wszystko_OK=false;
			$_SESSION['blad_login']= '<span style="color:red">Login musi posiadac od 8 do 15 znakow!</span>';
		}


        if($wszystko_OK==true)
        {
            echo "Udalo Ci sie zarejestrowac";//do zmiany wtedy przekierowuje cie do zalogowania 
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
                <input class="username" name="login" type="text" placeholder="Login">
                <?php
                    if(isset($_SESSION['blad_login']))
                    {
                        echo $_SESSION['blad_login'];
                        unset($_SESSION['blad_login']);
                    }
                ?>
                <input class="username" name="haslo" type="text" placeholder="Haslo">
                <input class="username" name="email" type="text" placeholder="E-mail">
                <input type="submit" value="Zarejestruj Sie" class="submit"/>
            
            </form>
                
        </div>
        <p>Masz juz konto? <a class="fpwd" href="logowanie.php">Zaloguj sie!</a></p>
    </div>

</body>

</html>