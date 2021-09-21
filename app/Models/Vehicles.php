<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
protected $table = 'credit_vehicles';
    protected $primaryKey = 'vehicle_id';
    public $timestamps = false;
    protected $fillable = [
    'vehicle_model','vehicle_owner','vehicle_type','driver_name','driver_contact','created_by'
    ];
}
