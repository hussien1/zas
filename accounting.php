<h1>Accounting</h1>


<?php include "includes/header.php" ?>
<?php include "includes/navbar.php"?>
            <section class="vendor-container">
                <div class="nav-container">
                    <div class="data-title-wrapper breadcrumb-wrapper">
                        <!-- <h4>Inventory Items</h4>
                        <h4>Items</h4> -->
                        <div class="breadcrumb">
                            <span class="breadcrumb-title">invoice draft</span>
                        </div>
                    </div>
                </div>

                <div class="table-container">
                       
                        <div class="table-of-content">
                                <div class="navigation flexxx">
                                    <div class="title">
                                        <h4>    
                                            all invoices draft
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
                                                        status
                                                    </th>
                                                    <th>
                                                        total   
                                                        </th>
                                                        <th>
                                                                exchange rate
                                                            </th>
                                                            <th>
                                                                    margin
                                                                </th>
                                                                <th>
                                                                        total after margin
                                                                    </th>
                                                                    <th>
                                                                            profit
                                                                        </th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                    <?php
                                           global $connection;
                                            
                                            $query = "SELECT * from invoices i JOIN orders_detailes o on i.order_id = o.order_id WHERE i.status = 1";
                                            
                                            $select_1 = mysqli_query($connection,$query);  
                                        if(mysqli_num_rows($select_1) > 0){
                                            while($rows = $select_1->fetch_object() ) {

                                           


                                            ?>

                                 

                                        <tr>
                                            <td>
                                                <input type="checkbox" name="one">
                                            </td>
                                            <td>
            
                                            <?= $rows->order_number ?>
                                              
                                            </td>
                                            <td>
                                            <?= $rows->order_date ?>
                                            </td>
                                            <td>
                                            <?= $rows->Agent_Name ?>
                                           
                                            </td>
                                            <td>
                                            <?= $rows->Flight_Number ?> 
                                            </td>
                                            <td>
                                            <?= $rows->Creating_Date ?> 
                                            </td>
                                                        <td>
                                                        <?= $rows->Creating_Person ?>  
                                                        </td>
                                                        <td>
                                                    <select id="stauts" name="sataus">
                                                    <option> Select Option</option>
                                                    <?php 
                                   
                                                   global $connection;
                                            
                                                $query_sts = "SELECT * FROM status";
                                                
                                                $select_sts = mysqli_query($connection, $query_sts);  
                                            
                                                        while($row = $select_sts->fetch_object()) {?>
                                                        <?php if($rows->status == $row->id) {
                                                            $selected = "selected";
                                                        }else {
                                                            $selected = '';
                                                        }
                                                            ?>
                                                            
                                                            <option <?= $selected ?> value='<?=$row->id?>'><?=$row->title?></option>

                                                    
                                                        <?php  }?>
                                                           
                                                            
                                                            
                                                        </select></td>
                                                                    <td>
                                                                    <?= $rows->total ?>  
                                                                    </td>
                                                                    <td>
                                                                    <?= $rows->Exchange_Rate?>
                                                                    </td>
                                                                    <td>
                                                                    <?= $rows->Margin ?>
                                                                    </td>
                                                                    <td>
                                                                    <?= $rows->Total_After_Margin ?>
                                                                    </td>
                                                                                <td>
                                                                                <?= $rows->Pofit .'%'?>
                                                                                </td>
                                        </tr>
                                       
                                            <?php }}?>
                                    </tbody>
                                </table>
                            </div>
                </div>
            </section>
            <script src="js/all.min.js"></script>
            <script src="js/jquery_v3.3.1.js"></script>
            <script src="js/mainScript.js"></script>
</body>

</html>