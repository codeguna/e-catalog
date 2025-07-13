<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property $id
 * @property $user_id
 * @property $order_date
 * @property $total_amount
 * @property $created_at
 * @property $updated_at
 *
 * @property OrderItem[] $orderItems
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Order extends Model
{
    
    static $rules = [
		'user_id' => 'required',
		'order_date' => 'required',
		'total_amount' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','order_date','total_amount'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderItems()
    {
        return $this->hasMany('App\Models\OrderItem', 'order_id', 'id');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    

}
