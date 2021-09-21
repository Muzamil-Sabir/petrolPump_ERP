<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class diprodScale extends Model
{
    protected $table = 'diprod_scale';
    protected $primaryKey = 'drs_id';
    public $timestamps = true;
    protected $fillable = [
    'fk_nozzel_type','fill','LT','LG'
    ];
}
