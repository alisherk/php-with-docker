<?php 

namespace App;
use App\Http\Request;
use App\Middleware\IMiddleware;
use App\Middleware\MiddlewareStack; 

class App {

    public function __construct(protected MiddlewareStack $middleware) {

    }
    public function run() {
        $this->middleware->handle(new Request());

        echo "app is running";
    }

    public function add(IMiddleware $middleware) {
        $this->middleware->add($middleware);
    }
}