<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CreditFill extends Model
{
protected $table = 'credit_fill';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['vehicle_id','current_fill','current_price','current_amount','total_amount','created_at', 'created_by'
    ];
}
