<?php
    session_start();

	
	$connect = mysqli_connect("localhost", "root", "", "osadnicy");
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
			<div class ="formularz">
				<form action="howno.php" method="post">
					<input type="text" class="wyszukiwarka" name="wyszukiwarka" placeholder="Wyszukaj..."/>
            		<input type="submit" value=""/>
				
				</form>
			</div>
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
			<span class="bigtitle">Dlaczego SklepPro.pl?</span>
			
			<div class="dottedline"></div>
			
			<?php  
                $query = "SELECT * FROM produkty ORDER BY id_produkt ASC";  
                $result = mysqli_query($connect, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                  
                     <form method="post" action="index.php?action=add&id=<?php echo $row["id_produkt"]; ?>" style="height: 500px; width: 356px; display: inline-block;">  
                          <div style="border:10px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; text-align: center; ">  
                               <img src="<?php echo "img/".$row["image"]; ?>" class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["nazwa"]; ?></h4>  
                               <h4 class="text-danger">$ <?php echo $row["cena"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["nazwa"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["cena"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px; width: 40px;" class="przycisk1" value="Add to Cart" />  
                          </div>  
                     </form>  
                 
                <?php  
                     }  
                }  
                ?> 
		</div>	
		
		<div id="footer">
			Stworz swoj wlasny koszyk - najszybsze dostawy. Strona w sieci od 2022r. &copy; Wszelkie prawa zastrzeżone
		</div>
	
	</div>
	
</body>
</html>