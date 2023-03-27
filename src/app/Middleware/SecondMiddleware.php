<?php

namespace App\Middleware; 

use App\Http\Request;

class SecondMiddleware implements IMiddleware {
    public function __invoke(Request $request, callable $next) {
        echo "second middleware";

        $request->code = 401;

        return $next($request);
    }
}