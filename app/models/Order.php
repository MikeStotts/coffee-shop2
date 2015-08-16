<?php
class Order extends Eloquent {
	
	protected $table = 'orders';

    public function user() {
        return $this->belongsTo('User');
    }

    public function orderItems() {
        return $this->hasMany('OrderItem'); 
    }
}