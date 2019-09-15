<?php include "includes/header.php" ?>
<?php include "includes/navbar.php"?>
        
            <section class="vendor-container">
                <div class="nav-container">
                    <div class="data-title-wrapper breadcrumb-wrapper">
                      
                        <div class="breadcrumb">
                            <span class="breadcrumb-title">orders</span>
                        </div>
                    </div>
                </div>

                <div class="table-container">
                        <div class="actions">
                                <div class="action-btn">
                                        <button>
                                            <span><a href="addnew-order.php">add new</a> </span>
                                        </button>
                                    </div>
                            <div class="action-btn">
                                    <button>
                                        <span>preview</span>
                                    </button>
                                </div>
                                <div class="action-btn">
                                        <button>
                                            <span>
                                            CSV
                                            </span>
                                        </button>
                                    </div>
                                    <div class="action-btn">
                                            <button>
                                               <span>
                                                 PDF
                                               </span>
                                            </button>
                                        </div>
                                        <div class="action-btn">
                                                <button>
                                                    <span>duplicate</span>
                                                </button>
                                            </div>
                                            <div class="action-btn">
                                                <button>
                                                    <span>show all</span>
                                                </button>
                                            </div>
                        </div>
                        <div class="table-of-content">
                                <div class="navigation flexxx">
                                    <div class="title">
                                        <h4>    
                                           all orders
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
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                        <?php
                                    global $connection;
                                            
                                            $query = "SELECT * FROM orders_detailes";
                                            
                                            $select_1 = mysqli_query($connection,$query);  
                                        
                                         while($rows = $select_1->fetch_object() ) {


                                            ?>

                                        <tr>
                                            <td>
                                                <input type="checkbox" name="one">
                                            </td>
                                            <td>
                                          
                                                 <?= $rows->order_number?>
                                                <div class="item-action">
                                                    <a href="addnew-order.php?oredre=<?=$rows->order_id?>">Add Items</a>
                                                    <a href="Update-order.php?oredre=<?=$rows->order_id?>">edit</a>
                                                    <a href="#" class="itemActionRed">delete</a>
                                                </div>
                                            </td>
                                            <td>
                                            <?= $rows->order_date?>
                                            </td>
                                            <td>
                                            <?= $rows->Agent_Name?>
                                            </td>
                                            <td>
                                            <?= $rows->Flight_Number?>
                                            </td>
                                            <td>
                                            <?= $rows->Creating_Date?> 
                                            </td>
                                                        <td>
                                                        <?= $rows->Creating_Person?> 
                                                        
                                                        </td>
                                                        <td>
                                                        
                                                        <?= $rows->Deleviry_Date?> 
                                                        </td>
                                                        <td>
                                                        <?= $rows->Deleviry_Person?> 
                                                            </td>
                                                        <td>
                                                        <?= $rows->feedback?> 
                                                        </td>
                                                        <td>
                                                    <select id="stauts" name="sataus">
                                                    <option> Select Option</option>
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
                                                           
                                                            
                                                            
                                                        </select></td>
                                        </tr>

<?php } ?>
                                    </tbody>
                                </table>
                            </div>
                </div>
            </section>
            <?php include "includes/footer.php" ?>