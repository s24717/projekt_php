<?php
    session_start();
	require_once "koszyk.php";
	


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
		<div style="clear:both"></div>  
                <br />  
                <h3>Twoj Koszyk</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Nazwa Produktu</th>  
                               <th width="10%">ilosc</th>  
                               <th width="20%">Cena</th>  
                               <th width="15%">Razem</th>  
                               <th width="5%">Wykonaj</th>  
                          </tr>

                          <?php
                          //koszyk id_uzyt 
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td><?php echo $values["item_price"]; ?>zl</td>  
                               <td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?>zl</td>  
                               <td><a href="konto.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">usun</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Razem Do zaplaty</td>  
                               <td align="right"><?php echo number_format($total, 2); ?>zl</td>
							     
                               <td></td> 
							   
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>
					 <a href="formularz.php" class="tilelink" style="color:black; border:5px solid #128870;">Przejdz do formularza dostaw</a>
                          <br>
                          <br>
                          <?php
                              if(isset($_SESSION['informacja']))
                              {
                                   echo $_SESSION['informacja'];
                                   unset($_SESSION['informacja']);
                              }
                          ?>
                </div>  
           </div>
        
			
			
			
		</div>	
		
		<div id="footer">
			Stworz swoj wlasny koszyk - najszybsze dostawy. Strona w sieci od 2022r. &copy; Wszelkie prawa zastrzeżone
		</div>
	
	</div>
	
</body>
</html>