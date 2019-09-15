
<?php
include "database.php";

function redirect($location){


    header("Location:" . $location);
    exit;

}


function ifItIsMethod($method=null){

    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){

        return true;

    }

    return false;

}

function isLoggedIn(){

    if(isset($_SESSION['user_role'])){

        return true;


    }


   return false;

}

function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){

    if(isLoggedIn()){

        redirect($redirectLocation);

    }

}





function escape($string) {

global $connection;

return mysqli_real_escape_string($connection, trim($string));


}



function set_message($msg){

if(!$msg) {

$_SESSION['message']= $msg;

} else {

$msg = "";


    }


}







function users_online() {



    if(isset($_GET['onlineusers'])) {

    global $connection;

    if(!$connection) {

        session_start();

        include("../includes/db.php");

        $session = session_id();
        $time = time();
        $time_out_in_seconds = 05;
        $time_out = $time - $time_out_in_seconds;

        $query = "SELECT * FROM users_online WHERE session = '$session'";
        $send_query = mysqli_query($connection, $query);
        $count = mysqli_num_rows($send_query);

            if($count == NULL) {

            mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session','$time')");


            } else {

            mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");


            }

        $users_online_query =  mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
        echo $count_user = mysqli_num_rows($users_online_query);


    }






    } // get request isset()


}

users_online();




function confirmQuery($result) {
    
    global $connection;

    if(!$result ) {
          
          die("QUERY FAILED ." . mysqli_error($connection));
   
          
      }
    

}



function insert_categories(){
    
    global $connection;

        if(isset($_POST['submit'])){

            $cat_title = $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)) {
        
             echo "This Field should not be empty";
    
    } else {





    $stmt = mysqli_prepare($connection, "INSERT INTO categories(cat_title) VALUES(?) ");

    mysqli_stmt_bind_param($stmt, 's', $cat_title);

    mysqli_stmt_execute($stmt);


        if(!$stmt) {
        die('QUERY FAILED'. mysqli_error($connection));
        
                  }


        
             }

             
    mysqli_stmt_close($stmt);
   
        
       }

}





function deleteCategories(){
global $connection;

    if(isset($_GET['delete'])){
    $the_cat_id = $_GET['delete'];
    $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
    $delete_query = mysqli_query($connection,$query);
    header("Location: categories.php");


    }
            


}


function UnApprove() {
global $connection;
if(isset($_GET['accept'])){
    echo $_GET['accept'];
    
    // $the_comment_id = $_GET['unapprove'];
    
    // $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $the_comment_id ";
    // $unapprove_comment_query = mysqli_query($connection, $query);
    // header("Location: comments.php");
    
    
    }

    
    

}


function is_operatore($username) {

    global $connection; 

    $query = "SELECT role FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);

    $row = mysqli_fetch_array($result);


    if($row['user_role'] == 0){

        return true;

    }else {


        return false;
    }

}








 function login_user($username, $password)
 {

    global $connection;

     $query = "SELECT * FROM users WHERE username = '{$username}' AND password = {$password} ";
     $select_user_query = mysqli_query($connection, $query);
     if (!$select_user_query) {

         die("QUERY FAILED" . mysqli_error($connection));

     }


     while ($row = mysqli_fetch_array($select_user_query)) {

         
         $db_username = $row['username'];
         $db_user_role = $row['role'];
         
         

        $_SESSION['username'] = $db_username;
        $_SESSION['user_role'] = $db_user_role;
      
            if($_SESSION['user_role'] == 1)
              redirect("../landingDashboard.php");
            if($_SESSION['user_role'] == 3)
              redirect("../third-party.php");
            if($_SESSION['user_role'] == 2)
              redirect("../accounting.php");

     }
   
     return true;

 }
 function display_message() {

    if(isset($_SESSION['username'])) {
        echo $_SESSION['username'];
        // unset($_SESSION['message']);
    }


}

function logs($action,$oredr_id){
    global $connection;
    $savelogs = "INSERT INTO logs (action,order_id,user_id )
                              values ('$action', $oredr_id,2)";
  $query_logs = mysqli_query($connection,  $savelogs);
  if (!$query_logs) {

   die("QUERY FAILED" . mysqli_error($connection));

}

}

 //  request function 



 function startStopTimeIsWithinRange($startTime='10:15', $stopTime='12:30') {                
    $dateStart      = new DateTime('2016-10-30 ' . $startTime);     //<== IGNORE, THE DATE. NOTICE THE TIME
    $dateStop       = new DateTime('2016-10-30 ' . $stopTime);      //<== IGNORE, THE DATE. NOTICE THE TIME

    $rangeStart     = new DateTime('2016-10-30 10:00');             //<== IGNORE, THE DATE. NOTICE THE TIME
    $rangeStop      = new DateTime('2016-10-30 13:00');             //<== IGNORE, THE DATE. NOTICE THE TIME

    if($dateStart >= $rangeStart && $rangeStop >= $dateStop){
      return  true ;
    }
    return false;               
}

// var_dump( startStopTimeIsWithinRange('10:15', '12:30')  );           //<== NOTICE THE COLON (:) AND NOT DOT (.)

?>