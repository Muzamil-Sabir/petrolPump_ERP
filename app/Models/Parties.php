<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parties extends Model
{
    protected $table = 'credit_parties';
    protected $primaryKey = 'party_id';
    public $timestamps = false;
    protected $fillable = [
    'owner_name','owner_contact','owner_address','owner_balance','pending_balance','created_at'
    ];
}
