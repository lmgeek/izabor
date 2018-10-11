<?php

namespace Order;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'billing_email', 'billing_name', 'billing_address', 
        'billing_phone', 'billing_subtotal', 'billing_tax', 'billing_total', 'status', 'error',
    ];

    public function user()
    {
        return $this->belongsTo('Order\User');
    }

    public function products()
    {
        return $this->belongsToMany('Order\Product')->withPivot('quantity');
    }
}
