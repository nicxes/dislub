<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'orders';


    public function organization()
    {
        return $this->belongsTo(Organization::class);
    }

    public function ordersProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id');
    }
}