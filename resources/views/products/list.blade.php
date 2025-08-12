@extends('layouts.main', [
'title' => $title,
])

@section('content')
    <form action="{{ route('products.list') }}" method="get">
        <div>
        <label for="app-inp-search-term" >Search</label>
        <input  type="text" id="app-inp-search-term"
        name="term" value="{{ $criteria['term'] }}" /><br>

        <label for="app-inp-search-min-price" >Min Price</label>
        <input  type="number" id="app-inp-search-min-price"
        name="min_price" value="{{ $criteria['min_price'] }}" /><br>
     

        <label for="app-inp-search-max-price" >Max Price</label>
        <input  type="number" id="app-inp-search-max-price"
        name="max_price" value="{{ $criteria['max_price'] }}" /><br>

        </div>
        <div>
        <button type="submit">Search</button>
        </div>
    </form>

<table>
    <thead><tr>
        <th>Code</th>
        <th>Name</th>
        <th>Categories</th>
        <th>Price</th>
        <tr></thead>
        <tbody>
        @foreach($products as $product)
        <tr>
        <td>{{ $product['code'] }}</td> 
        <td>{{ $product['name'] }}</td>
        <td>
        @foreach ($product['categories'] as $productCategory)
                                <a href="{{ route('categories.view', ['cat_code' => $productCategory['code']]) }}">
                                    {{ $productCategory['name'] }}
                                </a>&nbsp;
        @endforeach
        </td>
        <td>{{ number_format($product['price'], 2) }}</td>
        </tr>
        @endforeach
        </tbody>
</table>
@endsection