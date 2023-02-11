<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentCart extends Model
{
    protected $fillable = [
       'shop_id' , 'key', 'fullname', 'address', 'country_id', 'province_id', 'city_id', 'phone', 'description', 'status_order', 'order_place', 'payment', 'bank_code', 'order_way', 'tax', 'service_charge', 'product_name', 'product_price', 'product_count', 'product_discount', 'product_finalPrice'
    ];
}
