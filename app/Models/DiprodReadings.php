<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DiprodReadings extends Model
{
    protected $table = 'diprod_readings';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
    'nozzel_type','fillReading','opening_stock','physical_stock','isActive','book_stock','reading_date'
    ];

}
