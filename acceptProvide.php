<?php include "includes/header.php"?>

        <section class="top-nav-container mainBgColor">
                <div class="top-nav-wrapper flexBetween">
                    <div class="third-header">
                      <h1> third-party</h1> 
                    </div>
                    <div class="user-section-wrapper flexCenter">
                        <div class="user-data">
                                <div class="not">
                          
                                <a style="color:#000" href="third-party.php">Orders</a>
                                        <!-- <i class="fas 7x fa-bell  green"></i> -->
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
                

                <div class="table-container">
                        
                        <div class="table-of-content">
                                <div class="navigation flexxx">
                                    <div class="title">
                                        <h4>    
                                           all requests
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
                                                agent name
                                            </th>
                                            <th>
                                                fligth Number
                                            </th>
                                            <th>
                                                airline
                                            </th>
                                           
                                            <th>
                                                class of travellers 
                                            </th>
                                           
                                                <th>
                                                        action
                                                    </th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                 
                                    <?php 
                                   
                                   global $connection;
                                            
                                   $query = "SELECT * FROM orders_detailes where status = 10";
                                   
                                   $select_1 = mysqli_query($connection,$query);  
                               
                                   while($row = $select_1->fetch_object() ) {
                                       
                                       ?>

                                    <form method="POST" action="function/approvedProvider.php">
                                 
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="one">
                                                <input type="hidden" name="id" value="<?= $row->order_id?>">
                                            </td>
                                            <td id="agent_name" >
            
                                           <?= $row->Agent_Name ?>
                                                <div class="item-action">
                                                        <a href="#">view</a>
                                                        <a href="#">edit</a>
                                                        <a href="#" class="itemActionRed">delete</a>
                                                </div>
                                            </td>
                                            <td >
                                            <?= $row->Flight_Number?>
                                            </td>
                                            <?php
                                                global $connection;
                                                
                                                $query_airline = "SELECT * FROM airline WHERE id = $row->Airline";
                                                
                                                $select = mysqli_query($connection,$query_airline); 
                                                $airline =  $select->fetch_object();
                                                                                                
                                                                                                                ?>
                                            <td id="agent_airline" >
                                            <?= $airline->name  ?>
                                            </td>
                                            
                                            <td>
                                                <?= $row->Class_Of_Travellers ?>
                                            </td>
                                           
                                                        <td>
                                                           <button type="submit" name="approved" value="approved">yes</button>
                                                        </td>
                                                        <td>
                                                           <button type="submit" name="unapproved" value="unapproved">no</button>
                                                        </td>
                                          </form>            
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