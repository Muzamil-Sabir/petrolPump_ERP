<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyLubStock extends Model
{
   protected $table = 'daily_lubs_stock';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
    'stock','created_at'
    ];
}
