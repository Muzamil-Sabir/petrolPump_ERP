<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nozzeltype extends Model
{
     protected $table = 'nozzel_type';
     protected $primaryKey = 'nozzel_id';
     public $timestamps = true;
     protected $fillable = [
     'quantity','opening_stock'
    ];
}
