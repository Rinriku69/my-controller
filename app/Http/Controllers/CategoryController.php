<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Psr\Http\Message\ServerRequestInterface;

class CategoryController extends SearchController
{

const array ITEMS = [
        ['code' => 'CT001', 'name' => 'PHP'],
        ['code' => 'CT002', 'name' => 'Javascript'],
        ['code' => 'CT003', 'name' => 'Typescript'],
        ['code' => 'CT004', 'name' => 'Python'],
    ];
function prepareCategory(array $items): array
    {
        foreach ($items as $key => $item) {
            $categories = [];

            foreach ($item['categories'] as $catCode) {
                $categories[] = $this->find($catCode);
            }

            $items[$key]['categories'] = $categories;
        }

        return $items;
    }



    private string $title = 'Categories';

    function list(ServerRequestInterface $request): View {

    $criteria = $this->prepareCriteria($request->getQueryParams());
    $categories = $this->search($criteria);

    return view('categories.list', [
    'title' => "{$this->title}: List",
    'criteria' => $criteria,
    'categories' => $categories,
    ]);
    }

}