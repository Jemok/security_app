<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'products';

    /**
     * Fields that can be mass assigned
     * @var array
     */
    protected $fillable = [
        'product_name',
        'price',
        'quantity'
    ];
}
