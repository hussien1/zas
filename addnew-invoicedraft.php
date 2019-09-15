
<?php include "includes/header.php"?>
<?php include "includes/navbar.php"?>

                                        

    <!--start accounting info-->
    <section class="Add-container">
       
        <div class="nav-container">
            <div class="data-title-wrapper breadcrumb-wrapper">
              
                <div class="breadcrumb">
                    <a href="invoice-draft.html" class="breadcrumb-title">invoice draft</a>
                </div>
                <div class="breadcrumb">
                    <span class="breadcrumb-title">new</span>
                </div>
            </div>
        </div>
        <div class="account-info">
            <div>
                <div class="title">
                    <h2>invoice draft detailes</h2>
                    <div class="clear"></div>
                </div>

                <div class="form-container">
                        
                            <?php
                            if(isset($_GET['id']))
                                $id = $_GET['id'];
                          
                                           global $connection;

                                            
                                            $query = "SELECT * from invoices i JOIN orders_detailes o WHERE o.order_id = i.order_id AND o.order_id = $id";
                                            
                                            $select_1 = mysqli_query($connection,$query);  
                                        
                                            while($rows = $select_1->fetch_object() ) {

                                                    $query_sts = "SELECT * from status";
                                                                                                
                                                    $all_status = mysqli_query($connection,$query_sts); 
                                                    while($status = $all_status->fetch_object()) {
                                                        if($status->id === $rows->status){
                                                            $invoice_stauts = $status->title;
                                                        }
                                                    };

                                           


                                            ?>

                    <form name="account-info" method="POST" action="function/invoiceCalcult.php">
                        <div class="info-con info-con-one">
                           <div class="info-con-inner">
                                <div class="Reference">
                                <input type="hidden" name="id" value="<?= $id?>">
                                        <label>
                                              order number 
                                        </label>
                                        <input type="number" name="order-number" value="<?= $rows->order_number ?>">
                                    </div>
                                    <div class="street1">
                                        <label>
                                                    agent
                                                </label>
                                        <input type="text" name="agent" value="<?= $rows->Agent_Name ?>">
                                    </div>
                                   
                           </div>
                           <div class="info-con-inner">
                                <div class="street2">
                                        <label>
                                                order date
                                            </label>
                                        <input type="text" name="order-date"  value="<?= $rows->order_date?>" class="date-pic">
                                    </div>
                                    <div class="city">
                                        <label>
                                            flight number
                                        </label>
                                        <input type="number" name=" flight-number" value="<?= $rows->Flight_Number?>">
                                    </div>
                           </div>
                            
                        </div>
                        <div class="info-con">
                                <div class="info-con-inner">
                                     <div class="Reference">
                                             <label>
                                                         creating date 
                                                         </label>
                                             <input type="text" name="creating-date"  value="<?= $rows->Creating_Date?>" class="date-pic">
                                         </div>
                                         <div class="street1 margin-con">
                                             <div class="margin">
                                                <label>margin per item</label>
                                                <input type="radio" name="margin" value="per-item">
                                                <label>common margin %</label>
                                                <input type="radio" name="margin"  checked value="common-margin">
                                             </div>
                                         </div>
                                        
                                </div>
                                <div class="info-con-inner">
                                     <div class="street2">
                                             <label>
                                                     creating person
                                                 </label>
                                             <input type="text" name="creating-person" value="<?= $rows->Creating_Person?>">
                                         </div>
                                         <div class="date">
                                                <label>
                                                        exchange rate
                                                    </label>
                                                <input type="number" name="exchange-rate" value="<?= $rows->Exchange_Rate?>">
                                            </div>
                                </div>
                                 
                             </div>
                             <div class="info-con">
                                    <div class="info-con-inner">
                                            
                                                <div class="count-down">
                                                        <label>
                                                            margin cost
                                                        </label>
                                                        <input type="text" name="margin">
                                                    </div>  
                                    </div>
                                    
                                    <div class="info-con-inner">
                                            <div class="street2">
                                                    <label>
                                                            status
                                                        </label>
                                                      <input type="text" value="<?= $invoice_stauts ?>">
                                           
                                          
                                                    </div>  
                                                    <div>
                                                            <label>
                                                                    destenation
                                                                </label>
                                                                <input type="text" name="destenation" value="<?= $rows->Destenation ?>">
                                                    </div>
                                    </div>
                                     
                                 </div>
                      
                   
                                            <?php  }  ?>

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
                                          
                                            <th>total</th>
                                            <!-- <th>margin</th>
                                            <th>total after margin</th>
                                            <th>pofit</th> -->
                                        </thead>
                                        <?php
                                           
                                             $id_order = $_GET['id'];
                          
                                           global $connection;

                                            
                                             $query_items = "SELECT * FROM `oredr_items`, items WHERE order_id = $id_order AND oredr_items.item_id = items.id  ";
                                            
                                            $select_query_items = mysqli_query($connection, $query_items);  
                                            $totalPrice = 0;
                                            while($rows = $select_query_items->fetch_object() ) {

                                          


                                            ?>
                                        <tbody>
                                          <td><?= $rows->title ?></td>
                                          <td><?= $rows->qny ?></td>
                                          <td class="t-before"><?= $rows->qny * $rows->price ?></td>

                                         <!-- <td> <input name="margin[]" type="number" value="" class="margin"> </td>
                                         <td> <input type="number" name="totalfm[]" class="t-after"> </td>
                                         <td> <input type="text" value="" name="pofit[]"> </td> -->
                                        </tbody>
                                        <?php 
                                    $totalPrice += $rows->qny * $rows->price ;
                                    } ?>
                                    </table>
                                      <input type="hidden" name="total" value="<?=$totalPrice?>">
                                   
                                      <button type="submit"  name="invoice" >Save</button>
                                      <!-- <button type="submit" name="invoice">Save $ Submit</button> -->
                                    <!-- <button type="button" class="add-invoice">add line</button> -->
                                    <!-- <table class="total">
                                        <tr>
                                        <td>total</td>
                                    
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
                       
                    </form>                   
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