<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LubricantPrice extends Model
{
     protected $table = 'lubricant_price';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
    'fk_lubricant_item_id','price','isActive'
    ];
}
