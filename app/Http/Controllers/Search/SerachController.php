<?php

namespace App\Http\Controllers\Search;

use App\Models\Car;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SerachController extends Controller
{

    public function __invoke(Request $request)
    {
        $query = $request->input('query');

        $results = Car::where('name', 'like', "%$query%")
            ->get();

        return response()->json($results);
    }
}
