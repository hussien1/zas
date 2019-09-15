<?php
include "../function/function.php";


if(ifItIsMethod('POST')){
   if(isset($_POST['approved'])){
    $id  = $_POST['id'];
    $query = "UPDATE orders_detailes SET status = 13  WHERE order_id = $id ";
    $approve_query = mysqli_query($connection, $query);

    //  logs('Oredr Accepted by Provider', $id);


































//     $id  = $_POST['id'];
//     $airline = $_POST['airline'];
//     $fligth_number = $_POST['fligth_number'];
//     $plan_id = $_POST['plan_id'];
//     $agent_name = $_POST['agent_name'];
//     $class_of_travellers = $_POST['class_of_travellers'];
//     //plan table
//     $query = "UPDATE plans SET status_id = 8  WHERE id = $id ";
//     $approve_query = mysqli_query($connection, $query);
//     // order table
//     $saveOrder = "INSERT INTO orders (status,plan_id )
//                               values (8,$plan_id)";
//   $approve_query_order = mysqli_query($connection,  $saveOrder);
//   $oredr_id =  $connection->insert_id;
 

  // order detailes table
  
//   $saveOrder_deatiles = "INSERT INTO orders_detailes(status, order_id, Deleviry_Date, Flight_Number, Agent_Name, Airline, Class_Of_Travellers)
//                                  values (8, $oredr_id, 'after 2 Houre', $fligth_number,'$agent_name',$airline,'$class_of_travellers')";

// $approve_query_order_detailes = mysqli_query($connection,  $saveOrder_deatiles);
// if(!$approve_query_order_detailes){
//    die('query falied');
// }




    // redirect('../requests.php');
   }else {
    if(isset($_POST['unapproved'])){
        $id  = $_POST['id'];
        $query = "UPDATE orders_detailes SET status = 7  WHERE order_id = $id ";
        $approve_query = mysqli_query($connection, $query);
    
         logs('Oredr Canceld by Provider', $id);




























        // $id  = $_POST['id'];
        // $plan_id = $_POST['plan_id'];
        // $query = "UPDATE plans SET status_id = 9  WHERE id = $id ";
        // $unapprove_query = mysqli_query($connection, $query);
        // $saveOrder = "INSERT INTO orders (status,plan_id )
        //                           values (9,  $plan_id)";
        // $approve_query_order = mysqli_query($connection,  $saveOrder);
        
        //  $oredr_id =  $connection->insert_id;
     
      
        // logs('Oredr canceld', $oredr_id );
        

        // redirect('../requests.php');
   }

   
}
}

