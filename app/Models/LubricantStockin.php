<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LubricantStockin extends Model
{
protected $table = 'lubricants_stock_in';
    protected $primaryKey = 'stock_in_id';
    public $timestamps = true;
    protected $fillable = [
    'purchase_id','item_id','quantity','indent_price'
    ];
}
