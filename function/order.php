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





//  SELECT p.deparure
//  from orders o 
//  left join plans p on o.plan_id=p.id
//  where o.id=39












//  $status =  $_POST['status'];

//---- incase new empty items ---//
  //$order_number =  $_POST['order-number'];
//   $agent =  $_POST['agent'];
//   $order_date =  $_POST['order-date'];
//   $flight_number  =  $_POST['flight-number'];
//   $creating_date =  $_POST['creating-date'];
//   $deleviry_date =  $_POST['deleviry-date'];
//   $creating_person =  $_POST['creating-person'];
//   $deleviry_person  =  $_POST['deleviry-person']; 
//   $feedback   =  $_POST['feedback'];
//   $count_down =  $_POST['count-down'];
//   $items    =    $_POST['itmes'];
  

//   $quantity =  $_POST['quantity'];
//   $units=  $_POST['units']; 
//   $size =  $_POST['size'];



// $saveOrder = "INSERT INTO logs (action,
//                                    order_id,
//                                    user_id,
//                                    action_time,
//                                    action_type,
//                                    items,
//                                    size,
//                                    qty,
//                                    units)
//                             values('create_order',
//                                      $order_id ,
//                                            2,
//                                            now(),
//                                            'create_order',
//                                            'tomato',
//                                            '$size',
//                                            '$quantity',
//                                            '$units'
//                                            )";
