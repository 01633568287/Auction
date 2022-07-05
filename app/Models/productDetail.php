<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class productDetail extends Model
{
    use HasFactory;

    protected $table = 'product_details';

    protected $fillable = [
        'image',
        'product_id',
    ];

    public function product()
    {
        return $this->hasOne(Product::class);
    }
}
