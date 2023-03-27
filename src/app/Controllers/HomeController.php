<?php

namespace App\Controllers;

class HomeController {
  public function index(): void {
    echo "visiting index route";
  }

  public function create(): void {
    echo "visting create api";
  }
}