<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockin extends Model
{
     protected $table = 'stock_in';
    public $primaryKey = 'stock_in_id';
        public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'purchase_id','product_id','quantity','temperature','indent_price','receipt_no','shipment_no','carrier_no','carrier_name','order_no','delivery_no','seal_no','created_at'
    ];
}
