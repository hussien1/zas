<?php include "includes/header.php"?>
<?php include "includes/navbar.php"?>
      
    <!--start accounting info-->
    <section class="Add-container">
    
        <div class="nav-container">
            <div class="data-title-wrapper breadcrumb-wrapper">
           
                <div class="breadcrumb">
                    <a href="catring_orders.php" class="breadcrumb-title">orders</a>
                </div>
                <div class="breadcrumb">
                    <span class="breadcrumb-title">new</span>
                </div>
            </div>
        </div>
        <div class="account-info">
            <div>
                <div class="title">
                    <h2>order detailes</h2>
                    <div class="clear"></div>
                </div>

                <div class="form-container">
                        <div class="actions">
                        <div class="action-btn">
                            <button >
                                <span>save</span>
                            </button>
                        </div>
                        <div class="action-btn">
                                <button class="discard">
                                    <span>discard</span>
                                </button>
                            </div>
                            <div class="action-btn">
                                <button class="discard">
                                    <span>INV.draft</span>
                                </button>
                     </div>
                     <div class="action-btn">
                                    <button>
                                       <a href="function/deleteAll.php?table=orders_detailes"> <span>Delete All</span> </a>
                                    </button>
                                </div>
             </div>
             <?php
             global $connection;
                  if(isset($_GET['oredre']) )
                  {
                    $id = $_GET['oredre'];
                    
                    $query = "SELECT * FROM orders_detailes WHERE order_id = $id ";
                   
                    $select = mysqli_query($connection, $query); 
        
                    while($rows = $select->fetch_object() ) {
                           ?>
             <!--- start order edit -->
                    <form name="account-info"  method="POST" action="function/order.php">  
                          <input type="hidden" name="oredr_id" value="<?= $rows->order_id?>">
                                                    <div class="info-con info-con-one">
                                                    <div class="info-con-inner">
                                                            <div class="Reference">
                                                                    <label>
                                                                        order number 
                                                                </label>
                                                                    <input type="number" name="order-number " placeholder="order number" value="<?=$rows->Flight_Number?>">
                                                                </div>
                                                                <div class="street1">
                                                                    <label>
                                                                                agent
                                                                            </label>
                                                                    <input type="text" name="agent" value="<?= 	$rows->Agent_Name ?>"  placeholder="agent" value="<?=$rows->Agent?>">
                                                                </div>
                                   
                                                                    </div>
                                                                    <div class="info-con-inner">
                                                                            <div class="street2">
                                                                                    <label>
                                                                                            order date
                                                                                        </label>
                                                                                    <input type="text" value="<?= date('Y-m-d H:i:s') ?>" name="order-date" placeholder="order date" class="date-pic">
                                                                                </div>
                                                                                <div class="city">
                                                                                    <label>
                                                                                        flight number
                                                                                    </label>
                                                                                    <input type="number" name="flight-number"  value="<?=$rows->Flight_Number?>" placeholder=" flight number">
                                                                                </div>
                                                                    </div>
                            
                                                                        </div>
                                                                        <div class="info-con">
                                                                                <div class="info-con-inner">
                                                                                    <div class="Reference">
                                                                                            <label>
                                                                                                        creating date 
                                                                                                        </label>
                                                                                            <input type="text" value="<?= 	$rows->Creating_Date?>" name="creating-date" placeholder="creating date" class="date-pic">
                                                                                        </div>
                                                                                        <div class="street1">
                                                                                            <label>
                                                                                                        deleviry date
                                                                                                    </label>
                                                                                            <input type="text" value="<?= 	$rows->Deleviry_Date?>" name="deleviry-date" class="date-pic" placeholder="deleviry date">
                                                                                        </div>
                                                                                        
                                                                                </div>
                                                                                    <div class="info-con-inner">
                                                                                        <div class="street2">
                                                                                                <label>
                                                                                                        creating person
                                                                                                    </label>
                                                                                                <input type="text" value="<?=$rows->Creating_Person?>" name="creating-person" placeholder="creating person">
                                                                                            </div>
                                                                                            <div class="city">
                                                                                                <label>
                                                                                                    deleviry person
                                                                                                </label>
                                                                                                <input type="text" value="<?=$rows->Deleviry_Person?>" name="deleviry-person" placeholder="deleviry person">
                                                                                            </div>
                                                                                    </div>
                                 
                                                                                   </div>
                                                                                    <div class="info-con">
                                                                                            <div class="info-con-inner">
                                                                                                    <div class="date">
                                                                                                            <label>Airline </label>
                                                                                                            <?php
                                                                                                    global $connection;
                                                                                                    
                                                                                                    $query = "SELECT * FROM airline WHERE id = $rows->Airline";
                                                                                                    
                                                                                                    $select = mysqli_query($connection,$query); 
                                                                                                   $airline =  $select->fetch_object();
                                                                                                
                                                                                                                ?>
                                                                                                                
                                                                                                                <input type="text"  name="count-down" value="<?= $airline->name  ?>">

                                                                                                        
                                                                                                            
                                                                                                            
                                                                                                        
                                                                                                        </div>
                                                                                                            <div class="count-down">
                                                                                                                    <label>
                                                                                                                        count down
                                                                                                                    </label>
                                                                                                                    
                                                                                                                    <input type="text" value="2" name="count-down"  placeholder="count down" class="time-pic">
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
                                                                                                                                        <input type="text" name="destenation" value="<?= $rows->Destenation?>" placeholder="destenation">
                                                                                                                            </div>
                                                                                                            </div>
                                                                                                            
                                                                                                        </div>
                       
                
                 
                    <div class="sup-account-info">
                    <div>
                                <div class="sup-form-container">
                             
                                    <table>
                                        <thead>
                                            <th>item</th>
                                            
                                            
                                            <th>quantity</th>
                                            
                                            <th>special comment</th>
                                          
                                        </thead>
                                        <tbody>
                       
                        
                        
                                  
                       <td>
                       <?php ?>
                         <select name='item1'>
                         <option></option>
                         <?php
                               global $connection;
                               
                               $query = "SELECT * FROM items WHERE airline_id = $rows->Airline";
                               
                               $select = mysqli_query($connection,$query); 
                               while($items = $select->fetch_object()) {?>
                                 

                                     <option value="<?=$items->id?>">
                                            <?= $items->title?> (<?=$items->price?>)
                                      </option>
                                  
                                   
                              <?php }
                           
                                           ?>
                         </select>
                        </td>
                    

                      
                       <td><input type="number" name="quantity1" class="debit" placeholder="0.00"></td>
                  
                       <td><textarea type="text" name="spcial-comments1" class="credit" placeholder="comment"></textarea>
                   
                   </td>
                       
                   </tr>
       </tbody>
       <tbody>
                      
                       
                       
                                 
                       <td>
                       <?php ?>
                         <select name='item2'>
                             <option></option>
                         <?php
                               global $connection;
                               
                               $query = "SELECT * FROM items WHERE airline_id = $rows->Airline";
                               
                               $select = mysqli_query($connection,$query); 
                               while($items = $select->fetch_object()) {?>
                                 

                                     <option value="<?=$items->id?>">
                                            <?= $items->title?> (<?=$items->price?>)
                                      </option>
                                  
                                   
                              <?php }
                           
                                           ?>
                         </select>
                        </td>
                    

                      
                       <td><input type="number" name="quantity2" class="debit" placeholder="0.00"></td>
                  
                       <td><textarea type="text" name="spcial-comments2" class="credit" placeholder="comment"></textarea>
                   
                   </td>
                       
                   </tr>
       </tbody>

       <tbody>
               
                       
                       
                                 
                      <td>
                      <?php ?>
                        <select name='item3'>
                        <option></option>
                        <?php
                              global $connection;
                              
                              $query = "SELECT * FROM items WHERE airline_id = $rows->Airline";
                              
                              $select = mysqli_query($connection,$query); 
                              while($items = $select->fetch_object()) {?>
                                

                                    <option value="<?=$items->id?>">
                                           <?= $items->title?> (<?=$items->price?>)
                                     </option>
                                 
                                  
                             <?php }
                          
                                          ?>
                        </select>
                       </td>
                   

                     
                      <td><input type="number" name="quantity3" class="debit" placeholder="0.00">
                        
                      </td>
                 
                      <td><textarea type="text" name="spcial-comments3" class="credit" placeholder="comment"></textarea>
                  
                  </td>
                      
                  </tr>
      </tbody>





                                            
                                      
                                    </table>
                                    
                                    
                                    <!-- <button type="button" class="add-order">add line</button> -->
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

                        <button type="submit" value="orderNow"> Update Order</button>
                 </form>

                 <?php } 
                 
                



                
                }
                 
                 else{ ?>
                  
               

            
                    <form name="account-info" method="POST" action="function/order.php">  
                        <div class="info-con info-con-one">
                           <div class="info-con-inner">
                                <div class="Reference">
                                        <label>
                                             order number 
                                       </label>
                                        <input type="number" name="order-number " placeholder="order number" value="">
                                    </div>
                                    <div class="street1">
                                        <label>
                                                    agent
                                                </label>
                                        <input type="text" name="agent" value=""  placeholder="agent" value="">
                                    </div>
                                   
                           </div>
                           <div class="info-con-inner">
                                <div class="street2">
                                        <label>
                                                order date
                                            </label>
                                        <input type="text" value="" name="order-date" placeholder="order date" class="date-pic">
                                    </div>
                                    <div class="city">
                                        <label>
                                            flight number
                                        </label>
                                        <input type="number" name=" flight-number"  value="" placeholder=" flight number">
                                    </div>
                           </div>
                            
                        </div>
                        <div class="info-con">
                                <div class="info-con-inner">
                                     <div class="Reference">
                                             <label>
                                                         creating date 
                                                         </label>
                                             <input type="text" value="" name="creating-date" placeholder="creating date" class="date-pic">
                                         </div>
                                         <div class="street1">
                                             <label>
                                                         deleviry date
                                                     </label>
                                             <input type="text" value="" name="deleviry-date" class="date-pic" placeholder="deleviry date">
                                         </div>
                                        
                                </div>
                                <div class="info-con-inner">
                                     <div class="street2">
                                             <label>
                                                     creating person
                                                 </label>
                                             <input type="text" value="" name="creating-person" placeholder="creating person">
                                         </div>
                                         <div class="city">
                                             <label>
                                                 deleviry person
                                             </label>
                                             <input type="text" value="" name="deleviry-person" placeholder="deleviry person">
                                         </div>
                                </div>
                                 
                             </div>
                             <div class="info-con">
                                    <div class="info-con-inner">
                                            <div class="date">
                                                    <label>
                                                            feedback
                                                        </label>
                                                    <input type="text" value="" name="feedback" placeholder="feedback">
                                                </div>
                                                <div class="count-down">
                                                        <label>
                                                            count down
                                                        </label>
                                                        <?php  ?>
                                                        <input type="text" value="2" name="count-down"  placeholder="count down" class="time-pic">
                                                    </div>  
                                    </div>
                                    
                                    <div class="info-con-inner">
                                            <div class="street2">
                                                    <label>
                                                            status
                                                        </label>
                                                        <select name="status">
                                                        <?php
                                                            global $connection;
                                                            
                                                            $query = "SELECT * FROM status";
                                                            
                                                            $select = mysqli_query($connection,$query);  
                                                        
                                                                    while($sts = $select->fetch_object()) {?>
                                                                    
                                                                        ?>
                                                                        
                                                                        <option  value='<?=$sts->id?>'><?=$sts->title?></option>

                                                                
                                                     <?php  }?>
                                                    </select>
                                                    </div>  
                                                    <div>
                                                            <label>
                                                                    destenation
                                                                </label>
                                                                <input type="text" name="destenation" placeholder="destenation">
                                                    </div>
                                    </div>
                                 </div>
                     
                   
                 
                    <div class="sup-account-info">
                            <div>
                                <div class="title">
                                    <div class="clear"></div>
                                </div>
        
                                <div class="sup-form-container">
                            
                                    <table>
                                        <thead>
                                            <th>item</th>
                                            <th>size</th>
                                            <th>quantity</th>
                                            <th>unit</th>
                                            <th>special comment</th>
                                            <th>deleviry</th>
                                        </thead>
                                        <td>
                                            <tbody>
                   
            <td>
                        <select name="itmes">
                            <option value="0" name="juice" >juice</option>
                            <option value="1" name="juice2">juice2</option>
                            <option value="2" name="juice3">juice3</option>
                            <option value="3" name="juice4">juice4</option>
                        </select>
         </td>
                        <div id="suggesstion-box">
                        </div>
                        </div>
                        </td>
                        <td>
                        <select name="size">
                            <option value="small" name="small" >small</option>
                            <option value="medium" name="medium">medium</option>
                            <option value="large" name="large">large</option>
                            <option value="xlarge" name="xlarge">x large</option>
                        </select></td>
                        <td><input type="number" name="quantity[]" class="debit" placeholder="0.00"></td>
                        <td>
                        <select name="units">
                            <option value="small" name="small">small</option>
                            <option value="medium" name="medium">medium</option>
                            <option value="large" name="large">large</option>
                            <option value="xlarge" name="xlarge">x large</option>
                        </select></td>
                        <td><input type="text" name="spcial-comments[]" class="credit" placeholder="comment"></td>
                        <td style="display:flex;justify-content: space-between">
                        <input type="checkbox" name="delevery">
                            <button type="button" class="delete"><i class="fas fa-trash-alt"></i></button>
                            </td>
                    </tr>
        </tbody>
                                    </table>
                                    <!-- <button type="button" class="add-order">add line</button> -->
                                    <table class="total">
                                        <tr>
                                        <td>total</td>
                                        <td></td>
                                    
                                        <td id="bepit_total" class="total-debit count">
                                            0.00</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                    </tr>
                                    </table>
                                    <button type="submit" value="oredr_recived"> Save oredr</button>
                             </form>
                                </div>
                            </div>
                        </div>

                       
                 <?php }?>
                </div>
            </div>
        </div>

    </section>

    <script src="js/all.min.js"></script>
    <script src="js/jquery_v3.3.1.js"></script>
    <script src="js/flatpickr.js"></script>
    <script src="js/mainScript.js"></script>
    </body>

</html>


