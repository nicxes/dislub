<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    use SoftDeletes;

    /**
     * Get the products for the order.
     */
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class);
    }
}