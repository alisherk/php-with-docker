<?php 

namespace App\Exceptions; 

class InvoiceException extends \Exception {
    protected static $billMsg = "Missing billing info";

    public static function missingBillingInfo(): static {
        return new static(static::$billMsg);
    }
}

