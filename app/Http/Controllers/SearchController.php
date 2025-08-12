<?php

namespace App\Http\Controllers;




abstract class SearchController extends Controller
{
    public const array ITEMS = [];

    function prepareCriteria(array $criteria) : array{  // Prepare search criteria
        return [
         'term' => null,
         'min_price' => null,
         'max_price' => null,
         ...$criteria,
        ];
    }

    function filterByTerm(array $items, string $term) : array { // Filter items by search term
        $results = [];

        foreach($items as $item){
            if(\stripos($item['name'], $term) !== false) {
            $results[] = $item;
            }else if(\stripos($item['code'], $term) !== false) {
            $results[] = $item;
            }
        }
        return $results;
    }

    function filterByPrice(array $items, float $minPrice, float $maxPrice): array { // Filter items by price range
        $results = [];

        foreach($items as $item){
            if($item['price'] >= $minPrice && $item['price'] <= $maxPrice) {
                $results[] = $item;
            }
        }
        return $results;
    }

    function filter(array $items, array $criteria): array { // Filter items by search criteria
        if($criteria['term'] !== null) {
        $items = $this->filterByTerm($items, $criteria['term']);
        }
        if($criteria['min_price'] !== null || $criteria['max_price'] !== null) {
            $criteria['min_price'] = $criteria['min_price'] ?? 0;
            $criteria['max_price'] = $criteria['max_price'] ?? PHP_INT_MAX;
            $items = $this->filterByPrice($items, $criteria['min_price'], $criteria['max_price']);
        }
        return $items;
    }

    
    function search(array $criteria): array { // Search items by criteria
        return $this->filter(static::ITEMS, $criteria);
    }

    function find(string $code): ?array { 
        foreach(static::ITEMS as $item){
            if($item['code'] === $code) return $item;
        }
        return null;
    }
    
}
