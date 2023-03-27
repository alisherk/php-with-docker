<?php 

namespace App\Models; 

use App\Exceptions\InvoiceException;

class Invoice {
    public function __construct() {

    }

    public function process(float $amount): void {
        if($amount < 0) {
            throw InvoiceException::missingBillingInfo(); 
        }

        echo "Processing $" . $amount . 'invoice - '; 

        sleep(1); 

        echo "OK" . PHP_EOL; 
    }
}