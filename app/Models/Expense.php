<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
   protected $table = 'expense';
    public $primaryKey = 'expense_id';
   public $timestamps = true;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'expense_head_id','expense_type_id','amount','description','expense_date'
    ];
}
