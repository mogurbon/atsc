<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class queueatc extends Model
{
    use HasFactory;

    protected $casts = [

        'queue' => 'array',
    ];
    protected $attributes = [
        'queue' => '{
            []
        }'
    ];
}
