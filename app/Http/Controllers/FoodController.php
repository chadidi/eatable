<?php

namespace App\Http\Controllers;

use App\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function __construct()
    {
        // $this->middleware();
    }

    public function poisonous(Request $request)
    {
        // Validate request data
        $this->validate($request, [
            'length' => 'required|numeric',
            'weight' => 'required|numeric',
            'weight_scale' => 'min:1|max:5',
            'color' => 'required|min:2|max:24',
        ]);

        // convert weight
        // $unit = new WeightUnit();
        // $weight = $unit->convert($request->weight, $request->weight_scale);

        // see if it's exist in the database
        $food = Food::length($request->length)
            ->weight($request->weight)
            ->color($request->color)->first();

        // if it dosn't exsit return something
        if ($food == null) {
            return response()->json(['status' => 'We coudn\'t find similar food!'], 404);
        }

        // $food->weightScaleUnit = ($request->weight_scale) ? $request->weight_scale : 'g';

        // check if the food is posonous or not.
        if ($food->isPoisonous()) {
            return response()->json(['status' => $food->name . " is poisonous!", 'food' => $food], 200);
        } else {
            return response()->json(['status' => 'Eat up its safe!'], 200);
        }
    }
}
