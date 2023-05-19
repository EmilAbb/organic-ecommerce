<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;

class SlugMiddleware
{

    public function handle(Request $request, Closure $next): Response
    {
        $newRequestData = $request->all();
        $requestData = $request->all();
        foreach (config('app.languages') as $lang){
            if (isset($requestData[$lang]) && isset($requestData[$lang]['slug'])){
                 $newRequestData[$lang]['slug'] = Str::slug($requestData[$lang]['slug']);
            }
        }
          $request->replace($newRequestData);
        return $next($request);
    }
}
