<?php

namespace App\Models;

use App\Models\Traits\HasUuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Currency extends Model
{
    use HasFactory, HasUuid;

    protected $fillable = ['name', 'currency_code', 'exchange_rate'];

    // protected $primaryKey = 'uuid';

    // protected $keyType = 'string';

    public $incrementing = false;

    
}
