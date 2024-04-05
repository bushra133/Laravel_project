<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    //
    protected $fillable = [
        'Color', 'Price', 'Qty','Description', 'ProductId',
    ];
}
