<?php include "includes/header.php"?>
<?php include "includes/navbar.php"?>
            <section class="vendor-container">
                <div class="nav-container">
                    <div class="data-title-wrapper breadcrumb-wrapper">
                        <!-- <h4>Inventory Items</h4>
                        <h4>Items</h4> -->
                        <div class="breadcrumb">
                            <span class="breadcrumb-title">log</span>
                        </div>
                    </div>
                </div>

                <div class="table-container">
                        <div class="actions">
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
                                            <div class="action-btn">
                                    <button>
                                       <a style="color:#000" href="function/deleteAll.php?table=logs"> <span>Delete All</span> </a>
                                    </button>
                                </div>
                        </div>
                        <div class="table-of-content">
                                <div class="navigation flexxx">
                                    <div class="title">
                                        <h4>    
                                           all logs
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
                                               Flight number
                                            </th>
                                            <th>
                                                user
                                            </th>
                                            <th>
                                               
                                            </th>
                                            <th>
                                            date&time
                                            </th>
                                                <th>
                                                        action
                                                    </th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                    <?php 
                                   
                                   global $connection;
                                   
                                       $query = "SELECT * FROM logs, orders_detailes WHERE logs.order_id = orders_detailes.order_id";
                                       //die($query);
                                       
                                       $select_logs = mysqli_query($connection,$query);  
                                        
                                        while($row = $select_logs->fetch_object()) {

                                            ?>

                                        <tr>
                                            <td>
                                                <input type="checkbox" name="one">
                                            </td>
                                            <td>
            
                                            <?= $row->Flight_Number ?>
                                                <div class="item-action">
                                                        <a href="#">view</a>
                                                        <a href="#" class="itemActionRed">delete</a>
                                                </div>
                                            </td>
                                            <td>
                                               Opertor
                                            </td>
                                            <td>
                                                
                                            </td>
                                            <td>
                                            <?= $row->action_time ?>
                                            </td>
                                            <td>
                                            <?= $row->action ?>       
                                            </td>
                                        </tr>
                                        <?php }?> 
                                       
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