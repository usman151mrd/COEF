<?php
    
     include_once 'db/database.php';
     $pro = $_GET['q'];                        
    $sql = "SELECT `s_id`, `s_name` FROM `semester` WHERE `p_id`=$pro";
    $mydb->setQuery($sql);
    $result =  $mydb->loadResultList();
    foreach ($result as $row){
                echo '<option value='.$row->s_id.'>'.$row->s_name.'</option>';
             }	
                              
