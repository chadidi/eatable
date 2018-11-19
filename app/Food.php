<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'food';

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
        'min_length',
        'max_length',
        'weight',
        'weight_unit_id',
        'color',
    ];

    // protected $appends = ['weight_scale'];
    // public $weightScaleUnit = 'g';

    public function poisonous()
    {
        return $this->hasOne('App\Poisonous');
    }

    public function weightUnit()
    {
        return $this->belongsTo('App\WeightUnit');
    }

    public function isPoisonous()
    {
        $pos = $this->poisonous()->first();

        if ($pos) {
            return ($pos->is_poisonous) ? true : false;
        }return false;
    }

    /* public function getWeightScaleAttribute()
    {
    return $this->attributes['weight_scale'] = $this->weightScaleUnit;
    } */

    /* public function getWeightAttribute($value)
    {
    $scale = $this->weightUnit()->first();
    if ($scale->symbol != $this->weightScale) {
    return $scale->convert($value, $this->weightScale);
    }return $value;
    } */
    // Search scopes
    public function scopeLength($query, $length)
    {
        return $query->whereRaw('? between min_length and max_length', [$length]);
    }

    public function scopeWeight($query, $weight)
    {
        return $query->where('weight', $weight);
    }

    public function scopeColor($query, $color)
    {
        return $query->where('color', $color);
    }
}
