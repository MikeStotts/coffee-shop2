<?php
class Cart extends Eloquent {
	
	protected $table = 'carts';

    public function product() {
        return $this->belongsTo('Product');
    }
}
?>
