<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalRealization extends Model
{
    use HasFactory;
    protected $table = 'widrawal_realizations';
    protected $guarded = [];
}
