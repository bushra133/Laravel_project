<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //
    protected $fillable = [
        'ProductId','Price', 'Qty', 'Tax', 'Total', 'Desc', 'Net', 'UserId',
    ];
    
    
}
