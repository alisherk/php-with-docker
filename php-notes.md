set_exception_handler(function (\Throwable $e) {
   var_dump($e->getMessage());
}); //pretty useful if you want to provide global exception handling

echo array_rand([], 1);  //in this case we are not using array_rand properly, so set_exception_handle will gracefully catch the exception 

