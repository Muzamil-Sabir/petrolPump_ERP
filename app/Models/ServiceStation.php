<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceStation extends Model
{
    protected $table = 'servicestation';
    protected $primaryKey = 'serviceStation_id';
    public $timestamps = true;
    protected $fillable = [
    'sales','datetime'
    ];
}
