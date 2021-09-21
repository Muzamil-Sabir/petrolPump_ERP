<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nozzelReadings extends Model
{
    protected $table = 'nozzel_readings';
    public $primaryKey = 'id';
   public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nozzel_type','nozzel_number','purchase_price','current_nozzle_price','old_reading','current_reading','total_readings','added_by','isActive','reading_date'
    ];
}
