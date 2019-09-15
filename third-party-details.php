<?php include "includes/header.php"?>

<body>
        <section class="top-nav-container mainBgColor">
                <div class="top-nav-wrapper flexBetween">
                    <div class="third-header">
                        third-party
                    </div>
                    <div class="user-section-wrapper flexCenter">
                        <div class="user-data">
                                <div class="not">
                                        <span class="n-badge">10</span>
                                        <img class="notification" src="img/notification.png">
                                        <div class="not-pop">aly add new item</div>
                                    </div>
                        </div>
                    </div>
                </div>
            </section>
          
            <section class="order-dtailes">
                    <div class="nav-container">
                            <div class="data-title-wrapper breadcrumb-wrapper">
                                <!-- <h4>Inventory Items</h4>
                                            <h4>Items</h4> -->
                                <div class="breadcrumb">
                                    <a href="third-party.html" class="breadcrumb-title">third-party</a>
                                </div>
                            </div>
                        </div>
                    <div class="account-info">
                            <div class="form-container">
                              <form name="account-info">
                                 <?php
                                    global $connection;
                                        if(isset($_GET['id']) )
                                        {
                                            $id = $_GET['id'];
                                            
                                            $query = "SELECT * FROM orders_detailes WHERE order_id = $id ";
                                        
                                            $select = mysqli_query($connection, $query); 
                                
                                            while($rows = $select->fetch_object() ) {
                                                ?>
                                            <div class="info-con info-con-one">
                                               <div class="info-con-inner">
                                                    <div class="Reference">
                                                            <label>
                                                                        order number 
                                                        </label>
                                                            <input type="number" name="order-number " placeholder="order number" value="<?= $rows->order_id?>" readonly>
                                                        </div>
                                                        <div class="street1">
                                                            <label>
                                                                        agent
                                                                    </label>
                                                            <input type="text" name="agent" placeholder="agent" value="<?= $rows->Agent_Name?>" readonly>
                                                        </div>
                                                       
                                               </div>
                                               <div class="info-con-inner">
                                                    <div class="street2">
                                                            <label>
                                                                    order date
                                                                </label>
                                                            <input type="text" name="order-date" placeholder="order date" class="date-pic" value="<?= $rows->order_date?>" readonly>
                                                        </div>
                                                        <div class="city">
                                                            <label>
                                                                flight number
                                                            </label>
                                                            <input type="number" name=" flight-number" placeholder=" flight number" value="<?= $rows->Flight_Number?>" readonly>
                                                        </div>
                                               </div>
                                                
                                            </div>
                                            <div class="info-con">
                                                    <div class="info-con-inner">
                                                         <div class="Reference">
                                                                 <label>
                                                                             creating date 
                                                                             </label>
                                                                 <input type="text" name="creating-date" placeholder="creating date" class="date-pic" value="<?= $rows->Creating_Date?>" readonly>
                                                             </div>
                                                             <div class="street1">
                                                                 <label>
                                                                             deleviry date
                                                                         </label>
                                                                 <input type="text" name="deleviry-date" class="date-pic" placeholder="deleviry date" value="<?= $rows->Deleviry_Date?>" readonly>
                                                             </div>
                                                            
                                                    </div>
                                                    <div class="info-con-inner">
                                                         <div class="street2">
                                                                 <label>
                                                                         creating person
                                                                     </label>
                                                                 <input type="text" name="creating-person" placeholder="creating person" value="<?= $rows->Creating_Person?>" readonly>
                                                             </div>
                                                             <div class="city">
                                                                 <label>
                                                                     deleviry person
                                                                 </label>
                                                                 <input type="text" name="deleviry-person" placeholder="deleviry person" value="<?= $rows->Deleviry_Person?>" readonly>
                                                             </div>
                                                    </div>
                                                     
                                                 </div>
                                                 <div class="info-con">
                                                        <div class="info-con-inner">
                                                                <div class="date">
                                                                        <label>
                                                                                feedback
                                                                            </label>
                                                                        <input type="text" name="feedback" placeholder="feedback" value="<?= $rows->feedback?>" readonly>
                                                                    </div>
                                                                    <div class="count-down">
                                                                            <label>
                                                                                count down
                                                                            </label>
                                                                            <input type="text" name="count-down" placeholder="count down" class="time-pic" value="" readonly>
                                                                        </div>  
                                                        </div>
                                                        
                                                        <div class="info-con-inner">
                                                                <div class="street2">
                                                                        <label>
                                                                                status
                                                                            </label>
                                                                            <select>
                                                                                                                            <?php 
                                                                                
                                                                                global $connection;
                                                                            
                                                                                $query = "SELECT * FROM status";
                                                                                
                                                                                $select = mysqli_query($connection,$query);  
                                                                            
                                                                                        while($sts = $select->fetch_object()) {?>
                                                                                        <?php if($sts->id == $rows->status) {
                                                                                            $selected = "selected";
                                                                                        }else {
                                                                                            $selected = '';
                                                                                        }
                                                                                            ?>
                                                                                            
                                                                                            <option <?= $selected ?> value='<?=$sts->id?>'><?=$sts->title?></option>

                                                                                    
                                                                                        <?php  }?>
                                                                                </select>
                                                                        </div>  
                                                                        <div>
                                                                                <label>
                                                                                        destenation
                                                                                    </label>
                                                                                    <input type="text" name="destenation" placeholder="destenation" value="<?= $rows->Agent_Name?>" readonly>
                                                                        </div>
                                                        </div>
                                                         
                                                     </div>
                                            
                                      
                                        </form>
                                       
                                       

                                        <div class="sup-account-info">
                                                <div>
                                                    <div class="title">
                                                        <div class="clear"></div>
                                                    </div>
                            
                                                    <div class="sup-form-container">
                                                        <table>
                                                            <thead>
                                                                <th>item</th>
                                                              
                                                                <th>quantity</th>
                    
                                                                <th>special comment</th>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                        global $connection;
                                                                           
                                                                                
                                                                                $query_items = " SELECT * from oredr_items left join items on oredr_items.item_id = items.id where oredr_items.order_id =$id";
                                                                            
                                                                                $select_items = mysqli_query($connection, $query_items); 
                                                                    
                                                                                while($item = $select_items->fetch_object() ) {
                                                                                    ?>
                                                                              <tr class="accounts">
                                                                      
                                                                            <td>
                                                                            <div>
                                                                            <input type="text" name="search-box" id="search-box" placeholder="item name" value="<?= $item->title?>" readonly>
                                                                            <div id="suggesstion-box">
                                                                            </div>
                                                                            </div>
                                                                            </td>
                                                                            
                                                                            <td><input type="number" name="quantity" class="debit" placeholder="0.00" value="<?= $item->qny?>" readonly></td>
                                                                          
                                                                            <td><input type="text" name="spcial-comment" class="credit" placeholder="comment"value="<?= $item->comment?>">
                                                                               </td>

                                                                                
                                                                        </tr>
                                                                        <?php } ?>
                                                                        <?php }}?>      
                                                            </tbody>
                                                        </table>
                                                        <!-- <table class="total">
                                                            <tr>
                                                            <td>total</td>
                                                            <td></td>
                                                        
                                                            <td id="bepit_total" class="total-debit count">
                                                                0.00</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                        </tr>
                                                        </table> -->
                                                    </div>
                                                </div>
                                            </div>
                            </div>
                    </div>
            </section>
                   
            <script src="js/all.min.js"></script>
            <script src="js/jquery_v3.3.1.js"></script>
            <script src="js/mainScript.js"></script>
</body>

</html>