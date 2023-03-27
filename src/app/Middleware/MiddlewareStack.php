<?php

namespace App\Middleware;

use App\Http\Request;

class MiddlewareStack {

    protected $start; 

    public function __construct() {
        $this->start = function (Request $request) {
          return $request;
        };
    }

    public function add(IMiddleware $middleware) {
        $next = $this->start;
        //initial -> function() { echo "start middleware "}
        //first middleware (next = initial)
        //second middleware (next = first middleware )
        //this keeps the reference to next function
        $this->start = function(Request $request) use($middleware, $next) {
           return $middleware($request, $next);
        };
    }

    public function handle(Request $request) {
        //when we invoke this function that start points to secondMiddle
        //second middleware executes and calls first middleware 
        //first middleware executes and call initial 
        //initial runs 
        return call_user_func($this->start, $request);
    }

}

//app
// initial 
// first middleware 
// second middleware