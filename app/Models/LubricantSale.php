<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LubricantSale extends Model
{
   protected $table = 'lubricant_sales';
    protected $primaryKey = 'lubricant_sales_id ';
    public $timestamps = true;
    protected $fillable = [
    'item_id','current_price','quantity','sale_date','created_by'
    ];
}
