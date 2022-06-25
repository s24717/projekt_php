<?php
    session_start();

	if((!isset($_SESSION['admin'])))
	{
		header('Location: index.php');
		exit();
	}

    if ((isset($_POST['nazwa'])) && (isset($_POST['cena'])) && (isset($_POST['kategoria'])))//sprawdza 
	{   
        if($_POST['nazwa'] != "" && $_POST['cena'] != 0)
        {
            $nazwa=$_POST['nazwa'];
            $cena=$_POST['cena'];
            $kategoria=$_POST['kategoria'];

            $connect = mysqli_connect("localhost", "root", "", "osadnicy");
            $query = "INSERT INTO produkty (nazwa, image, cena, kategoria) VALUES ('$nazwa', 'obrazek.png','$cena','$kategoria')";
            $result = mysqli_query($connect, $query);
            echo "produkt dodany";
            unset($nazwa);
            unset($cena);
            unset($kategoria);	
        }
		
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
	
	
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>
	<form method="post">
            
                <h1>Dodaj Produkt(zakladam ze admin nie bedzie wrzucal javascriptu czy sqla...</h1>
                <input name="nazwa" type="text" placeholder="Nazwa Produktu">
                <input name="cena" type="text" placeholder="cena">
                <select name="kategoria">
                    <option value="jedzenie">Jedzenie</option>
                    <option value="elektronika" selected>Elektronika</option>
                </select>
                <input type="submit" value="Dodaj" class="submit"/>
            
            </form>
            <a href="logout.php" class="tilelink">Wyloguj</a>
	
</body>
</html>