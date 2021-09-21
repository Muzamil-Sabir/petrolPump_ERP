<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LubricantItems extends Model
{
 protected $table = 'lubricant_items';
    protected $primaryKey = 'lubricant_item_id';
    public $timestamps = true;
    protected $fillable = [
    'lubricant_item_id','fk_lubricant_category','item_name','item_desc','item_price','quantity','isActive'
    ];
}
