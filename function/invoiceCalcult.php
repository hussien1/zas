<?php 
include "function.php";

if(ifItIsMethod('POST')) {
  if(isset($_POST['invoice'])) {
      $total =   $_POST['total'];
      $ex    =   $_POST['exchange-rate'];
      $m     =   $_POST['margin'];
      $id    =   $_POST['id'];
 $saveInvoice_deatiles = "UPDATE invoices SET status = 1 ,
                                             Exchange_Rate = $ex ,
                                             Margin = $m ,
                                             Total_After_Margin = $total+$m ,
                                             Pofit = $total+$m / 100,
                                             total = $total+$m * $ex  
                                             WHERE order_id = $id";
                                      
$invoice = mysqli_query($connection, $saveInvoice_deatiles);
logs('create invoice ', $id);
if(!$invoice ){
   die('query falied');
}


  

}else {
   echo 'no pod';
}

}