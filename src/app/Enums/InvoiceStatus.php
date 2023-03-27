<?php

namespace App\Enums;

//we can't use union types either integer or string 
//can't have mixed or backed cases (backed are those that have integers assigned); 
//must have unique values and case names =
//constructores and destructores are not allowed 
//inheritance & properties are not allowd 
//cloning is not allowe 
//mgic methods except __call, __callStatic & __invoke
//can not instantiated directly or via reflection API

//can support interfaces 
interface SomeInterface {

}

trait InvoiceStatusHelper {
    //public string $x; this will result in error
    public function foo() {
        echo "foo";
    }
}

//can support traits but traits does not support properties 



enum InvoiceStatus: int implements SomeInterface {

    use InvoiceStatusHelper;
    case Pending = 0;
    case Paid = 1;
    case Void = 2;
    case Failed = 3;

    public static function all(): array {
        return [self::Paid, self::Failed, self::Pending, self::Void];
    }

    public function toString(): string {
        return match ($this) {
            self::Paid => "Paid",
            self::Failed => "Declined",
            self::Void => "Void",
            default => "Pending"
        };
    }
}