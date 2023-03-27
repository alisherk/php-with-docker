<?php 

namespace App\Middleware;
use App\Http\Request; 

class FirstMiddleware implements IMiddleware {
    public function __invoke(Request $request, callable $next) {
        echo "first middleware"; 

        return $next($request);
    }
    
}