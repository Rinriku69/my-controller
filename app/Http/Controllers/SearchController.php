<?php

namespace App\Http\Controllers;




abstract class SearchableController extends Controller
{
    const array ITEMS = [];

    function prepareCriteria(array $criteria) : array{
        return [
         'term' => null,
         ...$criteria,
        ];
    }

    function filterByTerm(array $items, string $term) : array {
        $results = [];

        foreach($items as $item){
            if(\stripos($item['name'], $term) !== false) {
            $results[] = $item;
            }
        }
        return $results;
    }

    function filter(array $items, array $criteria): array {
        if($criteria['term'] !== null) {
        $items = $this->filterByTerm($items, $criteria['term']);
        }
    return $items;
    }

    function search(array $criteria): array {
    return $this->filter(static::ITEMS, $criteria);
    }

    function find(string $code): ?array {
        foreach(static::ITEMS as $item){
            if($item['code'] === $code) return $item;
        }
    return null;
    }
    
}
