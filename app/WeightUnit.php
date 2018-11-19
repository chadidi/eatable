<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeightUnit extends Model
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
        'name',
        'symbol',
        'conversion_rate',
    ];

    public function foods()
    {
        return $this->hasMany('App\Food');
    }

    // convert from any to gram, gram(g) is the default scale
    public function convert($value, $to = 'g')
    {
        $unit = $this->where('symbol', $to)->first();

        if ($to == 'oz') {
            return $value / $unit->conversion_rate;
        }

        if ($to == 'g') {
            return $value * $unit->conversion_rate;
        }

        return $value;
    }
}
