<?php   
        include 'databaseconnection.php';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $del = $_POST['hidden_delete_item_input'];
                if(isset($_POST['delete_item_input'])){
                        try{
                                $sql = "DELETE FROM food WHERE id = $del";
                                $statement = $pdo->prepare($sql);
                                $statement->execute();
                        }catch(Exception $e){
                                echo "Could not delete data";
                                echo "<br>";
                                echo "<br>";
                                echo $e->getMessage();
                        }                      
                }    
                
                header("Location: main.php");
        }
?>