<?php

class food_item {
    public int $id;
    public String $name;
    public String $date_packaged;
    public String $storage_type;
    public float $quantity;
    public float $amount;
    public bool $state_solid;


    public function __construct($id, $name, $date_packaged, $storage_type, $quantity, $amount, $state_solid)
    {
        $this->id = $id;
        $this->name = $name;
        $this->date_packaged = $date_packaged;
        $this->storage_type = $storage_type;
        $this->quantity = $quantity;
        $this->amount = $amount;
        $this->state_solid = $state_solid;
    }


    public function toString() : String {

        $message = $this->name . "(" . $this->quantity . " lbs), stored in " . 
        $this->storage_type .  " was packaged on " . $this->date_packaged; 
        return $message;
    }
}

?>