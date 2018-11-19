<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poisonous extends Model
{
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'food_id',
        'is_poisonous',
    ];

    public function foods()
    {
        return $this->belongsTo('App\Food');
    }
}
