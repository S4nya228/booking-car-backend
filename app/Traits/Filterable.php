<?php

namespace App\Traits;

use Illuminate\Http\Request;

trait Filterable
{
    public function scopeFilter($query, Request $request)
    {
        if ($request->filled('color')) {
            $query->where('color', $request->color);
        }

        if ($request->filled('brand')) {
            $query->where('brand', $request->brand);
        }

        if ($request->filled('engine_power')) {
            $query->where('engine_power', $request->engine_power);
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }


        return $query->get();
    }
}
