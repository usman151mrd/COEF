<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'Users/dbc.php';
$pro = $_POST['pro'];
$sql = "SELECT `s_id`, `s_name` FROM `semester` WHERE `p_id`=$pro";
$ob = new dbc();
$result=$ob->selection($sql);
while ($row=$result->fetch())
{
    $sid = $row->s_id;
    $sname = $row->s_name;
    echo '<option value="'.$sid.'">'.$sname.'</option>';
}
