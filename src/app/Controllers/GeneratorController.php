<?php

namespace App\Controllers;

class GeneratorController {
    public function __construct() {

    }
    public function index() {
        echo "gen example";
        
    }

    private function lazyRange(int $start, int $end): \Generator {
      for($i = $start; $i <= $end; $i++) {
         yield $i;
      }
    }
}