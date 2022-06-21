<?php
    session_start();
    if((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: StronaPoZalogowaniu.php');
		exit();
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
            <form action="zaloguj.php" method="post">
            
                <h1>Logowanie</h1>
                <input class="username" name="login" type="text" placeholder="Login">
                <input class="username" name="haslo" type="password" placeholder="Haslo">
                <input type="submit" value="Zaloguj sie" class="submit"/>
            
            </form>
                <?php
                if(isset($_SESSION['blad']))
                {
                    echo $_SESSION['blad'];
                    unset($_SESSION['blad']);
                }
                
                ?>
        </div>
        <p>Nie masz konta? <a class="fpwd" href="rejestracja.php">Zarejestruj Sie! </a>lub <a class="fpwd" href="index.php">Strona Glowna</a></p>
        
    </div>

</body>

</html>