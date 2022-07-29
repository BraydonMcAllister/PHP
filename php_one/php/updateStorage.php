<?php

include 'databaseconnection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $storage = $_POST['update_storage_input'];
    if(!empty($_POST['update_storage_input'])){ 
        $id = $_POST['hidden_storage_input'];
        if (!preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $storage))
            {
                try{
                    if(isset($_POST['submit_storage'])){
                        $sql = "UPDATE food SET storage_type = '$storage'
                        WHERE id = $id";    
                        $statement = $pdo->prepare($sql);
                        $statement->execute();  
                    }
                }catch(Exception $e){
                    $e->getMessage();
                }
            } 
    }
    header("Location: main.php"); 
        
}

?>