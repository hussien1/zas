<?php include "includes/header.php"?>
<script>

function set_countdown(ts,span_id){
	var c_ts = 	Math.floor(new Date().getTime()/1000.0) ;
var timestamp=ts-c_ts;
//timestamp /= 1000; // from ms to seconds

function component(x, v) {
    return Math.floor(x / v);
}


setInterval(function() {
    
    timestamp--;
    
    var days    = component(timestamp, 24 * 60 * 60),
        hours   = component(timestamp,      60 * 60) % 24,
        minutes = component(timestamp,           60) % 60,
        seconds = component(timestamp,            1) % 60;
    // if(timestamp<7200){
    //     alert('fadel sa3teen bas');
    // }
        document.getElementById(span_id).innerHTML = days + " days, " + hours + ":" + minutes + ":" + seconds;
    
}, 1000);
console.log(timestamp+'>>'+ts);	
}

            </script>
        <section class="top-nav-container mainBgColor">
                <div class="top-nav-wrapper flexBetween">
                    <div class="third-header">
                      <h1> third-party</h1> 
                    </div>
                    <div class="user-section-wrapper flexCenter">
                        <div class="user-data">
                                <div class="not">
                                       
                                        <i class="fas 7x fa-bell  green"></i>
                                        <a style="color:#000" href="acceptProvide.php">Orders</a>
                                        <!-- <span class="n-badge">10</span>
                                        <img class="notification" src="img/notification.png">
                                        <div class="not-pop">aly add new item</div> -->
                                        <div class="user-setting-data">
                               
                            </div>
                                    </div>
                               
                        </div>
                    </div>
                </div>
            </section>
            <section class="vendor-container">
                <div class="nav-container">
                </div>

                <div class="table-container">

                        <div class="table-of-content">
                                <div class="navigation flexxx">
                                    <div class="title">
                                        <h4>    
                                            orders
                                        </h4>
                                    </div>
                                    <div class="left-side">
                                        <input type="text" class="search" id="myInput" name="search" placeholder="Search...">
                                    </div>
                                </div>
                                <table class="box-data-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <input type="checkbox" name="all">
                                            </th>
                                            <th>
                                                order number
                                            </th>
                                            <th>
                                                order date
                                            </th>
                                            <th>
                                                agent
                                            </th>
                                            <th>
                                                flight number
                                            </th>
                                            <th>
                                                creating date
                                            </th>
                                            <th>
                                                creating person
                                            </th>
                                            <th>
                                                deleviry date
                                            </th>
                                            <th>
                                                deleviry person
                                            </th>
                                            <th>
                                                feedback
                                            </th>
                                            <th>
                                                    status
                                            </th>
                                            <th>
                                                count down
                                            </th>
                                            <th>
                                               Action
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php
                                           global $connection;
                                            
                                            $query = "SELECT * FROM orders_detailes where status = 13";
                                            
                                            $select_1 = mysqli_query($connection,$query);  
                                        
                                            while($rows = $select_1->fetch_object() ) {

                                           


                                            ?>
                                            
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="one">
                                            </td>
                                            <td>
            
                                          <?=  $rows->order_id?>
                                                <div class="item-action">
                                                        <a href="third-party-details.php?id=<?= $rows->order_id ?>">View</a>
                                                    </div>
                                            </td>
                                            <td>
                                            <?=  $rows->order_date?>
                                            </td>
                                            <td>
                                            <?=  $rows->Agent_Name?>
                                            </td>
                                            <td>
                                            <?=  $rows->Flight_Number?>
                                            </td>
                                            <td>
                                            <?=  $rows->Creating_Date?>
                                            </td>
                                            <td>
                                            <?=  $rows->Creating_Person?>
                                            </td>
                                            <td>
            
                                            <?=  $rows->Deleviry_Date?>
                                            </td>
                                            <td>
                                            <?=  $rows->Deleviry_Person?>
                                                </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                       <select>
                                              <?php 
                                           global $connection;
                                            
                                            $query = "SELECT * FROM status";
                                            
                                            $select_status = mysqli_query($connection,$query);  
                                        
                                           while($sts = $select_status->fetch_object() ) {
                                               if($sts->id == $rows->status){
                                                   $selecte = 'selected';
                                               }else {
                                                $selecte = '';
                                               }
                                               ?>
                                                  <option <?= $selecte?>> <?=$sts->title?></option>

                                           

                                           

                                                           
                                           <?php  } ?>
                                                           
                                   </select>
                                            </td>
                                            <td>
                                                <span id='countdown_span_<?php echo $rows->order_id ?>'>
                                                        <script>
                                                        set_countdown(1568426400,'countdown_span_<?php echo $rows->order_id ?>')
                                                        </script>
                                                </span>
                           

                                            </td>
                                            <td> <a  href="function/invoice.php?id=<?=$rows->order_id?>" value="invoice"><button> finshed Order</button></a></td>
                                           
                                            
                                        </tr>
                                         <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                </div>
            </section>
            <script src="js/all.min.js"></script>
            <script src="js/jquery_v3.3.1.js"></script>
            <script src="js/jquery.countdownTimer.min.js"></script>
            <script src="js/mainScript.js"></script>
  
</body>

</html>