<?php   
        include 'databaseconnection.php';

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $item = $_POST['item'];
                $pack = $_POST['packaged'];
                $storage = $_POST['storage'];
                $quant = $_POST['quantity'];
                $amount = $_POST['amount'];
                $solid = $_POST['solid'];
                $liquid = $_POST['liquid'];

                $state;

                if(empty($item) || empty($pack) || empty($storage) || empty($quant) || empty($amount)){
                        echo "All fields must be filled out";
                }else{
                        if(isset($solid)){
                                $state = 1;
                        }else if(isset($liquid)){
                                $state = 0;
                        }
                        try{
                                $sql = "INSERT INTO food 
                                (food_name, date_packaged, storage_type, quantity, amount_, state_solid)
                                VALUES ('$item', '$pack', '$storage', '$quant', '$amount', '$state')";
                                $statement = $pdo->prepare($sql);
                                $statement->execute();
                        }catch(Exception $e){
                                echo "Could not insert data";
                                echo "<br>";
                                echo "<br>";
                                echo $e->getMessage();
                        }                      
                }     
                
                header("Location: main.php");
        }
?>