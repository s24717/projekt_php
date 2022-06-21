<?php
    session_start();
    if(!isset($_SESSION['zalogowany']))
    {
        header('Location: index.php');
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
			<div class ="formularz">
				<form action="howno.php" method="post">
					<input type="text" class="wyszukiwarka" name="wyszukiwarka" placeholder="Wyszukaj..."/>
            		<input type="submit" value=""/>
				
				</form>
			</div>
			<div class="option">
				<a href="logout.php" class="tilelink">Wyloguj Się</a>
			</div>
			<div class="option">Koszyk</div>
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
			<span class="bigtitle">Dlaczego SklepPro.pl?</span>
			
			<div class="dottedline"></div>
			
			Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean lacinia mollis odio eu bibendum. Praesent non hendrerit risus. Nulla id semper sem. Mauris risus mauris, ultrices sed ullamcorper sed, vulputate vel nisi. Aliquam augue ante, mattis in pulvinar vitae, ultrices nec leo. Nulla ultricies augue enim, sit amet semper tellus vulputate sit amet. Maecenas tincidunt, ex eu viverra scelerisque, quam lectus auctor nunc, at pretium nibh lacus in ligula. Cras condimentum felis ac aliquet tristique. Sed elementum eu nulla vel rutrum. Cras feugiat nulla non congue malesuada.
			
			<br /><br />
			Cras et nulla vehicula, efficitur enim non, fermentum tortor. Curabitur id elementum leo. Sed eget turpis accumsan dolor mollis imperdiet. Praesent pellentesque laoreet lectus, at commodo magna varius vitae. Aliquam erat volutpat. Curabitur commodo, tortor laoreet sagittis cursus, nulla enim laoreet libero, et egestas risus ante vel orci. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nunc quis posuere massa, sed sollicitudin lorem. Mauris lacinia, massa efficitur malesuada luctus, arcu ex mattis erat, a venenatis magna risus nec neque. Nulla vulputate nisl urna, quis egestas orci suscipit tristique. Interdum et malesuada fames ac ante ipsum primis in faucibus. Cras auctor nec elit at ultricies. Morbi aliquam pharetra diam, vitae porta felis. Pellentesque vel arcu tincidunt, luctus justo quis, ultrices erat. Vivamus efficitur leo vitae dui molestie, eu varius sapien iaculis. In quis pharetra mauris.
			
			<br /><br />			
			Nam ullamcorper turpis non tristique sollicitudin. Etiam id magna lacus. Pellentesque vestibulum ex eget quam consectetur, sit amet luctus erat feugiat. Sed gravida tellus tempus consequat rhoncus. Phasellus lobortis magna et risus pharetra, facilisis blandit sapien tristique. Vivamus aliquam interdum arcu, eget facilisis ante gravida ut. Proin nec nisl ut lacus finibus sagittis id non nibh. Donec volutpat pretium libero. Sed fermentum vel ante vitae mattis. Curabitur porttitor turpis at scelerisque auctor. Sed vitae iaculis risus, ut iaculis nibh.
		</div>	
		
		<div id="footer">
			Stworz swoj wlasny koszyk - najszybsze dostawy. Strona w sieci od 2022r. &copy; Wszelkie prawa zastrzeżone
		</div>
	
	</div>
	
</body>
</html>