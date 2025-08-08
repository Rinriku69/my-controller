<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Psr\Http\Message\ServerRequestInterface;

class ProductController extends SearchableController
{
    const array ITEMS = [
        [
            'code' => 'PD001',
            'name' => 'PHP & Javascript',
            'categories' => ['CT001', 'CT002'],
            'price' => 350.00,
        ],
        [
            'code' => 'PD002',
            'name' => 'Javscript inaction',
            'categories' => ['CT002'],
            'price' => 250.75,
        ],
        [
            'code' => 'PD003',
            'name' => 'Indroduction to PHP',
            'categories' => ['CT001'],
            'price' => 300.00,
        ],
        [
            'code' => 'PD004',
            'name' => 'Javascript vs Typescript',
            'categories' => ['CT002', 'CT003'],
            'price' => 125.00,
        ],
        [
            'code' => 'PD005',
            'name' => 'SPA with PHP and Angular',
            'categories' => ['CT001', 'CT003'],
            'price' => 450.50,
        ],
        [
            'code' => 'PD006',
            'name' => 'Typescript in Python',
            'categories' => ['CT003', 'CT004'],
            'price' => 560.00,
        ],
        [
            'code' => 'PD007',
            'name' => 'Python 101',
            'categories' => ['CT004'],
            'price' => 450.00,
        ],
        [
            'code' => 'PD008',
            'name' => 'Javascript in Python',
            'categories' => ['CT002', 'CT004'],
            'price' => 535.00,
        ],
        [
            'code' => 'PD009',
            'name' => 'Advance Python',
            'categories' => ['CT004'],
            'price' => 1200.00,
        ],
        [
            'code' => 'PD010',
            'name' => 'SPA with Python and Typescript',
            'categories' => ['CT003', 'CT004'],
            'price' => 365.00,
        ],
    ];

    private string $title = 'Products';

    function list(ServerRequestInterface $request,
        CategoryController $categoryController,): View {

    $criteria = $this->prepareCriteria($request->getQueryParams());
    $products = $this->search($criteria);
    $products = $categoryController->prepareCategory($products);

    return view('products.list', [
    'title' => "{$this->title}: List",
    'criteria' => $criteria,
    'products' => $products,
    ]);
    }

}
