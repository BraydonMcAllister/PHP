<?php for ($i = 0; $i < $member_2['total']; $i++) { 
                    
                    $food_object = new food_item($member[$i]['id'], $member[$i]['food_name'], $member[$i]['date_packaged'], 
                     $member[$i]['storage_type'], $member[$i]['quantity'], $member[$i]['amount_'], $member[$i]['state_solid']);?>
                <tr>
                    <td><?= $food_object->id; ?></td>
                    <td id="tooltip"><?= $food_object->name; ?></td>
                    <td><?= $food_object->date_packaged; ?></td>
                    <td><?= $food_object->storage_type; ?></td>
                    <td class="cell_with_button"><?= $food_object->quantity; ?>
                    </td>
                    <td class="cell_with_button"> <?php
                    $amount = $food_object->amount;
                    $state = $food_object->state_solid == 1 ?  "g" :  "mL"; 
                        echo $amount . $state;
                    ?>
                    </td>
                    <td>
                        <?php 
                            $total = $food_object->amount * $food_object->quantity;
                            echo $total . $state;
                         ?>
                    </td>
                </tr>
           <?php  } 
           
?>