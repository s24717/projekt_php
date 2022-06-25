<?php
if(isset($_POST["add_to_cart"]))  
{  
     if(isset($_SESSION["shopping_cart"]))  
     {  
      $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
      if(!in_array($_GET["id"], $item_array_id))  
           {  
             $count = count($_SESSION["shopping_cart"]);  
              $item_array = array(  
                 'item_id'               =>     $_GET["id"],  
                  'item_name'               =>     $_POST["hidden_name"],  //tablica przechowuje zmienne ktore dostala przez formularz 
                   'item_price'          =>     $_POST["hidden_price"],  
                    'item_quantity'          =>     $_POST["quantity"]  
                    ); 

           $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
      
   }  
   else  
   {  
      $item_array = array(  
           'item_id'               =>     $_GET["id"],  
           'item_name'               =>     $_POST["hidden_name"],  
           'item_price'          =>     $_POST["hidden_price"],  
           'item_quantity'          =>     $_POST["quantity"]  
       );  
       $_SESSION["shopping_cart"][0] = $item_array;  
   }  
}  

if(isset($_GET["action"]))   //usuwanie z koszyka
{  
 if($_GET["action"] == "delete")  
 {  
      foreach($_SESSION["shopping_cart"] as $keys => $values)  
      {  
           if($values["item_id"] == $_GET["id"])  
           {  
                unset($_SESSION["shopping_cart"][$keys]);   
           }  
      }  
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
	
	<link rel="stylesheet" href="css/style.css" type="text/css" />
	<link rel="stylesheet" href="css/fontello.css" type="text/css" />
	<link href='http://fonts.googleapis.com/css?family=Lato:400,900&subset=latin,latin-ext' rel='stylesheet' type='text/css'>

</head>

<body>

<div style="clear:both"></div>  
                <br />  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>

                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>$ <?php echo $values["item_price"]; ?></td>  
                               <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="index.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">$ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>

</body>
</html>