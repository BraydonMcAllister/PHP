<?php 

    include 'databaseconnection.php';
    $sql = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $inc = $_POST['hidden_inc_value'];
        $dec = $_POST['hidden_dec_value'];
        try{
            if(isset($_POST['quantity_inc'])){
                $sql = "UPDATE food SET quantity=quantity+1 WHERE id = $inc";
                $statement = $pdo->prepare($sql);
                $statement->execute();
                
            }else if(isset($_POST['quantity_dec'])){
                    $sql = "SELECT quantity FROM food WHERE id = $dec";
                    $statement = $pdo->query($sql);
                    $quantity = $statement->fetch();
                if($quantity <= 1){
                    //next number is 0, so delete 
                    $sql = "DELETE FROM food WHERE id = $dec";
                    $statement = $pdo->prepare($sql);
                    $statement->execute();  
                }else{
                    $sql = "UPDATE food SET quantity=quantity-1 WHERE id = $dec";
                    $statement = $pdo->prepare($sql);
                    $statement->execute();  
                }
                
                    
                header("Location: main.php"); 
            }else{
                echo "awaiting event";
            }
        }catch(Exception $e){
            $e->getMessage();
        }
        header("Location: main.php"); 
    }
    
?>