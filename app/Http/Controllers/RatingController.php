<?php

namespace App\Http\Controllers;

use App\Http\Requests\RateRequest;
use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function rateProduct(RateRequest $request)
    {
      Rating::create($request->validated());
    }
}
