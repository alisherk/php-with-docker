<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Enums\InvoiceStatus;
use App\Models\Invoice;
use App\Db\Database;

class InvoiceController {
    public function index() {
        echo "Invoices";
    }

    public function create() {

    }

    public function get() {
        $db = new Database($_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASS"]);

        $invoceModel = new Invoice($db->getConnection());

        $invoiceId = $invoceModel->findAll(InvoiceStatus::Paid);

        print_r(InvoiceStatus::cases());
    }
}