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
	<title>Sklep Internetowy</title>
	<meta name="description" content="Serwis poświęcony sklepowi internetowemu i zaliczeniu projektu php" />
	<meta name="keywords" content="sklep,internetowy,market,zakupy" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
	
	<div id="container">
	
		<div id="logo">
		Sklep Internetowy By Lochu
		</div>
		
		<div id="menu">
			<div class="option">Strona główna</div>
			
			<div class="option">
				<a href="logowanie.php" class="tilelink">Logowanie</a>
			</div>
			<div class="option">
			<a href="rejestracja.php" class="tilelink">Rejestracja</a>
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<div id="topbar">
			<div id="topbarL">
				<img src="img/ikona.png" />
			</div>
			<div id="topbarR">
				<span class="bigtitle">O SklepPro.pl</span>
				<div style="height: 15px;"></div>
				Podróż po świecie trendów, modowych okazji i marzeń, które dopiero się spełnią, właśnie się zaczyna! Wspólnie z nami odkryj swoje lifespiracje i czerp z życia pełnymi garściami.<br>Kupuj i zamawiaj elo.
			</div>
			<div style="clear:both;"></div>
		</div>
		
		<div id="sidebar">
			<div class="optionL">Kategoria 1</div>
			<div class="optionL">Kategoria 1</div>
			<div class="optionL">Kategoria 1</div>
			<div class="optionL">Kategoria 1</div>
			<div class="optionL">Kategoria 1</div>
			<div class="optionL">Kategoria 1</div>
		</div>
		
		<div id="content">
			<span class="bigtitle">Zaloguj sie by zobaczyc sklep</span>
			
			
			
			
		</div>	
		
		<div id="footer">
			Stworz swoj wlasny koszyk - najszybsze dostawy. Strona w sieci od 2022r. &copy; Wszelkie prawa zastrzeżone
		</div>
	
	</div>
	
</body>
</html>