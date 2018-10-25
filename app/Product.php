<?php

namespace Order;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    public function presentPrice()
    {
        // return money_format('$%i', $this->price / 100);
        return '$'.number_format($this->price / 100, 2);
    }
}
