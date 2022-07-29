<?php 

//SORTING TABLE
    $sql = "";

    function tableSort(){
        include 'databaseconnection.php';
        if(isset($_POST['sort_name'])){
            $sql = "SELECT id, food_name, date_packaged, storage_type, quantity, amount_, state_solid 
            FROM food ORDER BY food_name ASC";
        }else if(isset($_POST['sort_date'])){
            $sql = "SELECT id, food_name, date_packaged, storage_type, quantity, amount_, state_solid
            FROM food ORDER BY date_packaged DESC";
        }else{
            $sql = "SELECT id, food_name, date_packaged, storage_type, quantity, amount_, state_solid
            FROM food";   
        }
        $statement = $pdo->query($sql);
        return $statement;
    } 
?>