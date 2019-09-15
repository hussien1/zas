<?php include "includes/header.php" ?>
<?php include "includes/navbar.php"?>

            <section class="vendor-container">
                <div class="nav-container">
                    <div class="data-title-wrapper breadcrumb-wrapper">
                        <!-- <h4>Inventory Items</h4>
                        <h4>Items</h4> -->
                        <div class="breadcrumb">
                            <span class="breadcrumb-title">catring required</span>
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
                        </div>
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
                                                    status
                                                </th>
                                                <th>
                                                        action
                                                    </th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTable">
                                 
                                    <?php 
                                   
                                        global $connection;
                                        
                                            $query = "SELECT * FROM plans";
                                            
                                            $select_plans = mysqli_query($connection,$query);  
                                             
                                             while($row = $select_plans->fetch_object()) {?>
                                    <form method="POST" action="function/approved.php">
                                      <input type="hidden" name="id" value="<?=$row->id?>">
                                      <input type="hidden" name="fligth_number" value="<?=$row->fligth_number?>">
                                      <input type="hidden" name="airline" value="<?=$row->airline_id ?>" >
                                      <input type="hidden" name="agent_name" value="<?= $row->agent_name ?>">
                                      <input type="hidden" name="class_of_travellers" value=" <?= $row->class_of_travellers ?>">
                                      <input type="hidden" name="plan_id" value=" <?= $row->id ?>">
                                        <tr>
                                            <td>
                                                <input type="checkbox" name="one">
                                            </td>
                                            <td id="agent_name" >
            
                                           <?= $row->agent_name ?>
                                                <div class="item-action">
                                                        <a href="#">view</a>
                                                        <a href="#">edit</a>
                                                        <a href="#" class="itemActionRed">delete</a>
                                                </div>
                                            </td>
                                            <td >
                                            <?= $row->fligth_number?>
                                            </td>
                                            <td id="agent_airline" >
                                            <?= $row->airline ?>
                                            </td>
                                            
                                            <td>
                                                <?= $row->class_of_travellers ?>
                                            </td>
                                            <td>
                                                    <select id="stauts" name="sataus">
                                                    <option> Select Option</option>
                                                    <?php 
                                   
                                                   global $connection;
                                            
                                                $query = "SELECT * FROM status";
                                                
                                                $select = mysqli_query($connection,$query);  
                                            
                                                        while($rows = $select->fetch_object()) {?>
                                                        <?php if($rows->id == $row->status_id) {
                                                            $selected = "selected";
                                                        }else {
                                                            $selected = '';
                                                        }
                                                            ?>
                                                            
                                                            <option <?= $selected ?> value='<?=$rows->id?>'><?=$rows->title?></option>

                                                    
                                                        <?php  }?>
                                                           
                                                            
                                                            
                                                        </select></td>
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

      
       
            
           
<?php include "includes/footer.php" ?>