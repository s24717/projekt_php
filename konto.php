<?php
    session_start();

	


?>


<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Sklep Internetowy</title>
	<meta name="description" content="Serwis poświęcony sklepowi internetowemu i zaliczeniu projektu php" />
	<meta name="keywords" content="sklep,internetowy,market,zakupy" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<link rel="stylesheet" href="css/konto.css" type="text/css" />
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
	
	<div id="container">
	
		<div id="logo">
		Sklep Internetowy By Lochu
		</div>
		
		<div id="menu">
            <div class="option">
                <a href="index.php" class="tilelink">Strona Glowna</a>
            </div>
            <div class="option">
                <a href="zmien_haslo.php" class="tilelink">Zmien Haslo</a>
            </div>
            <div class="option">
                <a href="zmien_email.php" class="tilelink">Zmien Email</a>
            </div>
            <div class="option">
                <a href="usun_konto.php" class="tilelink">Usun Konto</a>
            </div>
            <div class="option">
             <a href="logout.php" class="tilelink">Wyloguj</a>
            </div>
			
			
			<div style="clear:both;"></div>
		</div>
		
		<div id="topbar">
			<div id="topbarL">
				<img src="img/ikona.png" />
			</div>
			<div id="topbarR">
				<span class="bigtitle">Witaj <?php echo $_SESSION['user']; ?></span>
				<div style="height: 15px;"></div>
				Tutaj zmienisz haslo,zobaczysz koszyk lub usuniesz konto!
			</div>
			<div style="clear:both;"></div>
		</div>
		
		
		
		<div id="content">
        Twoj e-mail: <?php echo $_SESSION['email']; ?>
        
			
			
			
		</div>	
		
		<div id="footer">
			Stworz swoj wlasny koszyk - najszybsze dostawy. Strona w sieci od 2022r. &copy; Wszelkie prawa zastrzeżone
		</div>
	
	</div>
	
</body>
</html>