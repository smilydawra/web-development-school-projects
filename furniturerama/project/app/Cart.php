<?php

namespace App;

use Session;

class Cart
{
	public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;

    public function __construct($oldCart)
    {
        if ($oldCart) {
            $this->items = $oldCart->items;
            $this->totalQty = $oldCart->totalQty;
            $this->totalPrice = $oldCart->totalPrice;
        }
    }

    public function items()
    {
        return $this->items;
    }

    /**
     * adding new item to cart
     * @param associative array  $item 
     * @param int $id  
     */
    public function add($item, $id) 
    {
        $storedItem = ['qty' => 0, 'price' => $item->cost, 'item' => $item];
        if($this->items) {
            if(array_key_exists($id, $this->items)){
                //if the item already exists
                $storedItem = $this->items[$id];
                //dd($storedItem);
            }
        }
        $storedItem['qty']++;
        //dd($storedItem['qty']);
        $storedItem['price'] = $item->cost;
        //dd($storedItem['price']);
        $this->items[$id] = $storedItem;
        //dd($this->items[$id]);
        $this->totalQty++;
        $this->totalPrice += $item->cost;
        //dd($this->totalPrice);
    }

    /**
     * remove an item from cart
     * @param  int $id 
     * @return boolean  
     */
    public function remove($id)
    {
        //dd($this->items);
        //dd($this->items[$id]);
        //dd($this->items[$id]['qty']);

        if(isset($this->items[$id])){
            
            $this->totalQty -= $this->items[$id]['qty'];
            $subtotal_remove= $this->items[$id]['price']*$this->items[$id]['qty'];
            $this->totalPrice -= $subtotal_remove;            
            unset($this->items[$id]);

            return true;
        } 
        return false;
    }

    public function update($id, $qty)
    {

        $this->items[$id]['qty'] = $qty;

        $this->totalQty = 0;            
        $this->totalPrice = 0;           

        $session_items = $this->items;

        foreach ($session_items as $element) {

            $item_sub_price = $element['qty'] * $element['price'];
            $this->totalQty += $element['qty'];
            $this->totalPrice += $item_sub_price;

        }

    }    


}
