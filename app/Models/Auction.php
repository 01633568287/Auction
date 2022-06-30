<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
    
    protected $table = 'auctions';

    protected $fillable = [
        'start_time',
        'close_time',
        'status',
        'start_price',
        'step_price',
        'highest_price',
        'winner_id',
    ];
}
