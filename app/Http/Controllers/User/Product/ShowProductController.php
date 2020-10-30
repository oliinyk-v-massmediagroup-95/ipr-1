<?php

namespace App\Http\Controllers\User\Product;

use App\Http\Controllers\Controller;
use App\Services\User\Product\ProductShowService;
use Illuminate\Http\Request;

class ShowProductController extends Controller
{
    private ProductShowService $showService;

    public function __construct(ProductShowService $showService)
    {
        $this->showService = $showService;
    }

    public function list()
    {

    }

    public function single()
    {

    }
}
