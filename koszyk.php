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
           else
           {
               foreach($_SESSION["shopping_cart"] as $keys => $values)
               {
                   if($values["item_id"] == $_GET["id"])
                   {
                       $_SESSION["shopping_cart"][$keys]["item_quantity"]+=$_POST["quantity"];//dodawanie x(liczba z value) do koszyka o danym id produktu
                   }
               }
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
