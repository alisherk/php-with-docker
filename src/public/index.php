<?php 

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use App\Middleware\FirstMiddleware;
use App\Middleware\MiddlewareStack;
use App\Middleware\SecondMiddleware;
use App\Models\Invoice;
//use App\Router\Router;
//use App\Controllers\HomeController;
use App\App;
use App\Exceptions\InvoiceException;

$inv = new Invoice();

try {
  $inv->process(-25); 

} catch(InvoiceException $e) {
   echo $e->getMessage();
}





//$app = new App(new MiddlewareStack()); 
//$app->add(new FirstMiddleware());
//$app->add(new SecondMiddleware());
//$app->run();

//$router = new Router();

//$router->register("get", "/", [HomeController::class, "index"]); 
//$router->register("get", "/create", [HomeController::class, "create"]); 

//$router->resolve($_SERVER["REQUEST_URI"], strtolower($_SERVER["REQUEST_METHOD"]));


