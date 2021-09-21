<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lubricants extends Model
{
    protected $table = 'lubricant_categories';
    protected $primaryKey = 'lubricant_category_id';
    public $timestamps = true;
    protected $fillable = [
    'lubricant_category_id','lubricant_type','created_at','isActive'
    ];
}
