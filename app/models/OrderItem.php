<?php
class OrderItem extends Eloquent {
	
	protected $table = 'order_items';
    
    public function order() { 
        return $this->belongsTo('Order');
    }

    public function product() {
        return $this->hasOne('Product');
    }
}
?>
