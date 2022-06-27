<?php
    session_start();
	require_once "koszyk.php";

    if((!isset($_SESSION['zalogowany'])) && (!$_SESSION['zalogowany']==true))
	{
		header('Location: logowanie.php');
		exit();
	}

    if((!isset($_SESSION['walidacja'])) && (!$_SESSION['walidacja']==true))
	{
		header('Location: konto.php');
		exit();
	}
	

    if(isset($_POST['zatwierdzenie']))
    {
        unset($_SESSION['imieform']);
        unset($_SESSION['nazwiskoform']);
        unset($_SESSION['kategoriaform']);
        unset($_SESSION['emailform']);
        unset($_SESSION["shopping_cart"]);
        unset($_SESSION['walidacja']);
        $_SESSION['informacja']= '<span style="color:green">Wyslales zakupy na podany adress</span>';
        header('Location: konto.php');

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
				Zatwierdz by zamowic
			</div>
			<div style="clear:both;"></div>
		</div>
		
		
		
		<div id="content">
        
		<div style="clear:both"></div>  
                <br />  
                
                <h3>Twoje Dane Wysylkowe, ackeptuj by kupic</h3> 
                <td>Twoje imie: <?php echo $_SESSION['imieform'];?></td>
                <br>
                <td>Twoje nazwisko: <?php echo $_SESSION['nazwiskoform'];?></td>
                <br>
                <td>Twoj E-mail: <?php echo $_SESSION['emailform'];?></td>
                <br>
                <td>Sposob w jaki wyslac: <?php echo $_SESSION['kategoriaform'];?></td> 
                <br>
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
                     <form method="post">
                     <input type="hidden" name="zatwierdzenie"/>  
                     <input type="submit" value="Zatwierdz" style="border: none; background: none; text-indent: 0px; width: 60px; color: black;"/>


                    </form>
					 
                </div>  
           </div>
        
			
			
			
		</div>	
		
		<div id="footer">
			Stworz swoj wlasny koszyk - najszybsze dostawy. Strona w sieci od 2022r. &copy; Wszelkie prawa zastrzeżone
		</div>
	
	</div>
	
</body>
</html>