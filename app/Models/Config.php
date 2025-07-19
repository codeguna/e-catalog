<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Config
 *
 * @property $id
 * @property $title
 * @property $subtitle
 * @property $mobile
 * @property $address
 * @property $email
 * @property $facebook
 * @property $youtube
 * @property $instagram
 * @property $why
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Config extends Model
{
    
    static $rules = [
		'title' => 'required',
		'subtitle' => 'required',
		'mobile' => 'required',
		'address' => 'required',
		'email' => 'required',
		'facebook' => 'required',
		'youtube' => 'required',
		'instagram' => 'required',
		'why' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['title','subtitle','mobile','address','email','facebook','youtube','instagram','why'];



}
