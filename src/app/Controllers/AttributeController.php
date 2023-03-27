<?php

namespace App\Controllers;

use App\Attributes\Route;

class AttributeController {
    
    #[Route("/attribute")]
    public function index(): void {
      
      //(new Container())->get(InvoiceService::class)->process([], 10);
      echo "attribute route ran";
       
    }
}