<?php include "includes/header.php"?>
<?php include "includes/navbar.php"?>
            <section class="vendor-container">
                <div class="nav-container">
                    <div class="data-title-wrapper breadcrumb-wrapper">
                        <!-- <h4>Inventory Items</h4>
                        <h4>Items</h4> -->
                        <div class="breadcrumb">
                            <span class="breadcrumb-title">feedback</span>
                        </div>
                    </div>
                </div>

                <div class="table-container">
                        <div class="actions">
                                <div class="action-btn">
                                        <button>
                                            <span><a href="addnew-feedback.html">add new</a> </span>
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
                                           feedback
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
                                                agent name
                                            </th>
                                            <th>
                                                flight number
                                            </th>
                                            <th>
                                                status
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                    <?php
                                           global $connection;
                                            
                                            $query = "SELECT * from orders_detailes WHERE status = 12";
                                            
                                            $select_1 = mysqli_query($connection,$query);  
                                        if(mysqli_num_rows($select_1) > 0){
                                            while($rows = $select_1->fetch_object() ) {

                                           


                                            ?>
                                        <tr>
                                                <td>
                                                        <input type="checkbox" name="one">
                                                    </td>
                                            <td>
            
                                               <?= $rows->order_number?>
                                                <div class="item-action">
                                                    <a href="addnew-order.html">edit</a>
                                                    <a href="addnew-order.html">View</a>
                                                    <a href="#" class="itemActionRed">delete</a>
                                                </div>
                                            </td>
                                            <td>
                                                    <a href="addnew-planes.html" class="agent-fname"><?= $rows->Agent_Name ?></a>
                                            </td>
                                            <td>
                                                <?= $rows->Flight_Number?>
                                            </td>
                                            <td>
                                                <select>
                                            <?php 
                                   
                                   global $connection;
                            
                                $query_sts = "SELECT * FROM status";
                                
                                $select_sts = mysqli_query($connection,$query_sts);  
                            
                                        while($row = $select_sts->fetch_object()) {?>
                                        <?php if($row->id == $rows->status) {
                                            $selected = "selected";
                                        }else {
                                            $selected = '';
                                        }
                                            ?>
                                            
                                            <option <?= $selected ?> value='<?=$row->id?>'><?=$row->title?></option>

                                    
                                        <?php  }?>
                                        </select>
                                            </td>
                                            </tr>
                                            <?php }} ?>
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