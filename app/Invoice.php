<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    protected $fillable = [
  
    
            'ProductId',
            'ProductName',
            'Qty',
            'Price',
            'Tax',
            'Total',
            'Desc',
            'Net',
            'UserId',
            'UserName',  
        ];
}
