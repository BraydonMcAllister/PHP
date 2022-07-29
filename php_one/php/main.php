<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FOOD INVENTORY AND CATALOG</title>
    <link rel="stylesheet" href="../css/styles.css"></link>
</head>
<body>
    <style> <?php include '../css/styles.css'; ?></style>
    <?php

    $dateArray = array('01'=>"January" , '02'=>"February", '03'=>"March",
                        '04'=>"April", '05'=>"May", '06'=>"June", '07'=>"July",
                        '08'=>"August", '09'=>"September", '10'=>"October",
                        '11'=>"November", '12'=>"December");
    
    require 'databaseconnection.php';
    include 'food_item.php';

    $sql_2 = "SELECT COUNT(*) as total FROM food";
    $statement_2 = $pdo->query($sql_2);
    $member_2 = $statement_2->fetch();
   
    ?>
    <?php 
        include 'selectionQueries.php';  
        $member = tableSort(0)->fetchAll();  
    ?>
    <!-- HEIGHT: 10 vh -->
    <!-- <div id="main_header">
        <h1>Food Storage Catalog</h1>
    </div> -->

    <!--  HEIGHT: 70 vh-->
        <div id="display_data">     
        <div id="data">   
            <table>
                <tr>
                <thead>
                    <!-- <th>ID</th> -->
                    <th id="th_item">
                        <div class="sorting_buttons_container">
                            <div id="div_name">
                                <div id="name">
                                    ITEM
                                </div>
                            </div>
                            <form id="table_sort_name" action="main.php" method="post">
                                <input class="input_button" type="submit" name='sort_name' id="sort_name" value="Sort By Name"/>
                            </form>      
                        </div>   
                       
                    </th>
                    <th id="th_package">
                        <div class="sorting_buttons_container">
                            <div id="div_date">
                                <div id="date">
                                    PACKAGED
                                </div>
                            </div>
                            <form id="table_sort_date" action="main.php" method="post">
                                <input class="input_button" type="submit" name="sort_date" id="sort_date" value="Sort By Date">
                            </form>                             
                        </div>  
                </th>
                    <th id="th_storage">STORAGE</th>
                    <th id="th_quantity">QUANTITY</th>
                    <th id="th_amount">AMOUNT</th>
                    <th id="th_total">TOTAL</th>
                </thead>
                </tr>
                <!-- create static array for storing database objects -->
                <?php $dbObjects = [];
                ?>
                <?php for ($i = 0; $i < $member_2['total']; $i++) { 
                    //clear array just once if not already empty
                    if($i == 0){
                        if(sizeOf($dbObjects) > 0){
                            $dbObjects = [];
                        }
                    }
                    $food_object = new food_item($member[$i]['id'], $member[$i]['food_name'], $member[$i]['date_packaged'], 
                     $member[$i]['storage_type'], $member[$i]['quantity'], $member[$i]['amount_'], $member[$i]['state_solid']); 
                     $dbObjects[$i] = $food_object; 
                     ?>
                <tr>
                    <!-- <td><?= $food_object->id; ?></td> -->
                    <td id="td_item">
                        <div id="table_row_item_form_container">
                            <div id="table_row_item_object">
                                <div id="item">
                                    <?= $food_object->name; ?>
                                </div>
                                
                            </div>
                            <form id="item_form" action="deleteItemQueries.php" method="post">
                                <input id="delete_item_input" type="submit" name="delete_item_input" value="DELETE ITEM">
                                <input type="hidden" name="hidden_delete_item_input" value="<?=$member[$i]['id']?>">
                            </form>                    
                        </div>
                    </td>
                    
                    <td id="td_package">

                    <?php $dateString = $dateArray[$food_object->date_packaged[5] . 
                    $food_object->date_packaged[6]] . " " .
                    $food_object->date_packaged[8] . $food_object->date_packaged[9] . ", " .
                    $food_object->date_packaged[0] .
                    $food_object->date_packaged[1] .
                    $food_object->date_packaged[2] .
                    $food_object->date_packaged[3];
                    
                   
                    ?>

                    <div id="packaged_date">
                        <?= $dateString; ?>
                    </div>

                                     
                    </td>
                    <td id="td_storage">
                        <div id="table_row_storage_form_container">
                            <div id="table_row_storage_object">
                                <div id="object">
                                    <?= $food_object->storage_type;?>
                                </div>
                                
                            </div>
                            <form id="storage_form" action="updateStorage.php" method="post">
                                <input id="update_storage_input" type="text" name="update_storage_input" placeholder="start typing to edit storage" value=""></input>
                                <input id="update_storage_button" type="submit" name="submit_storage" value="">
                                <input type="hidden" name="hidden_storage_input" value="<?=$member[$i]['id']?>">
                            </form>
                            
                        </div>
                    </td>
                    <td id="td_quantity">
                        <div id="table_row_quantity_form_container">
                            
                            <form id="quantity_form"action="updateQuantity.php" method="post" type="submit">
                                <div>
                                <button 
                                id="table_row_quantity_button_inc" 
                                type="submit" 
                                name="quantity_inc" 
                                value="<?=$member[$i]['id']?>">
                                </button>
                                <input type="hidden" name="hidden_inc_value" value="<?=$member[$i]['id']?>"></input>
                                <button 
                                id="table_row_quantity_button_dec" 
                                type="submit" 
                                name="quantity_dec" 
                                value="<?=$member[$i]['id']?>">
                                </button>
                                <input type="hidden" name="hidden_dec_value" value="<?=$member[$i]['id']?>"></input>
                                </div>
                            </form>
                            <div id="table_row_quantity_object">
                                <div id="quantity">
                                    <?php
                                    
                                    if($food_object->quantity <= 0){
                                        //delete from list
                                        echo "none";
                                    }else{
                                        echo $food_object->quantity;
                                    }
                                    
                                    ?>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td id="td_amount"> 
                    <div id="amount">
                        <?php
                        $amount = $food_object->amount;
                        $state = $food_object->state_solid == 1 ?  "g" : "mL"; 
                                    if($food_object->quantity <= 0){
                                        echo "N/A";
                                    }else{
                                        echo $amount . $state;
                                    }       
                        ?>
                    </div>
                    </td>
                    <td id="td_total">
                        <div id="total">
                            <?php 
                                $total = $food_object->amount * $food_object->quantity;

                                if($food_object->quantity <=0){
                                    echo "N/A";
                                }else{
                                    echo $total . $state;
                                }
                                
                            ?>
                        </div>
                        
                    </td>
                </tr>
           <?php  } ?>
            </table>
                </div>
    </div>

    <!-- HEIGHT: 15 vh -->
    <?php include 'navigation.php'; ?>
</body>
</html>