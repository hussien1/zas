<?php


 include "function.php";
 
 if(ifItIsMethod('POST') ){

  $order_id = $_POST['oredr_id'];
  $query = "UPDATE orders_detailes SET status = 10  WHERE order_id = $order_id ";

  $exeute_query  = mysqli_query($connection, $query);
  confirmQuery($exeute_query);
 $item1 =  $_POST['item1'];
 $item2 =  $_POST['item2'];
 $item3 =  $_POST['item3'];
 $qnty1 =  $_POST['quantity1'];
 $qnty2 =  $_POST['quantity2'];
 $qnty3 =  $_POST['quantity3'];
 $coment1 = $_POST['spcial-comments1'];
 $coment2 = $_POST['spcial-comments2'];
 $coment3 = $_POST['spcial-comments3'];

 
  $order_query = "INSERT INTO oredr_items (order_id,item_id,qny,comment) 
                  VALUES
                  ($order_id, $item1, $qnty1,'$coment1'),
                  ($order_id, $item2, $qnty2,'$coment2'),
                  ($order_id, $item3, $qnty3,'$coment3')";
  $exeute_query_order  = mysqli_query($connection,$order_query);
  confirmQuery($exeute_query_order);
  logs('request order', $order_id );
  redirect('../requests.php');

 }