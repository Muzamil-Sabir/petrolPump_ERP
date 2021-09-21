<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndentPriceTrack extends Model
{
     protected $table = 'indent_price_track';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
    'nozzel_type','stock','indent_price'
    ];
}
