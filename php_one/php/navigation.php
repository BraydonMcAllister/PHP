<?php 
        require 'databaseconnection.php'; 

        function onClick($element){
                $domdoc = new DOMDocument();
                $element = $domdoc->getElementById('name_input')->nodeValue;
                echo $element;
        }
?>

<nav id="navbar">
        <!-- <div id="new_item_header_container">
                <h2>Add a new item to the list</h2>
        </div> -->
        <div id="add_new_item_container">
                <form id="newitem" action="insertQueries.php" method="post" type="submit">
                        <div id="name_input" class="newitem_container">
                                <label class="input_labels" for="item">Food:</label>
                        <input name="item" class="item_input" type="text" value="" placeholder="start typing to name the food...">
                        </div>

                        <div id="date_input" class="newitem_container">
                        <label class="input_labels" for="packaged">Date Packaged:</label>
                        <input name="packaged" class="item_input" type="date" value="" onclick="onClickFunction(this)">
                        </div>

                        <div id="storage_input" class="newitem_container">
                        <label class="input_labels" for="storage">Storage:</label>
                        <input name="storage" class="item_input" type="text" value="" placeholder="start typing to specfiy how the food is stored...">
                        </div>

                        <div id="quantity_input" class="newitem_container">
                        <label class="input_labels" for="quantity">Quantity:</label>
                        <input name="quantity" class="item_input" type="number" placeholder="enter the quantity of food..." min="1" max="99">
                        </div>

                        <div id="amount_input" class="newitem_container">
                        <label class="input_labels" for="amount">Amount (g/mL):</label>
                        <input name="amount" class="item_input" type="number" value="" step="1" placeholder="enter the amount of food in grams or milliliters...">
                        </div>
                        <div id="final_container" class="newitem_container">
                                <div id="state_solid_radio_container">
                                        <div class="state_solid_input">
                                        <label class="input_labels" for="state_solid">Solid:</label>
                                        <input class="newitem_check" value="solid" name="state" type="radio" checked>
                                        </div>

                                        <div class="state_solid_input">
                                        <label class="input_labels" for="state_solid">Liquid:</label>
                                        <input class="newitem_check" value="liquid" name="state" type="radio">
                                        </div>
                                </div>
                                <div id="newitem_submit_container" >
                                <input id="newitem_submit" name="insert_item" type="submit" value="submit">
                                </div>            
                        </div>
                        
                </form>
        </div>
</nav>
        