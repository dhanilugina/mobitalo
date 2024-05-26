<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalProjection extends Model
{
    use HasFactory;
    protected $table = 'widrawal_projections';
    protected $guarded = [];
    
}
