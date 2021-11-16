<?php

namespace App\Models;

use App\Models\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{   
    use Uuids;
    use HasFactory;

    protected $fillable = [ 
        'name', 
        'currency_code', 
        'exchange_rate'
    ];

    protected $guarded = [];

    protected $keyType = 'string';

    public $incrementing = false;

    
}
