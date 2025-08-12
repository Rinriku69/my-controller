@extends('layouts.main', [
'title' => $title,
])

@section('content')
        <form action="{{ route('products.list') }}" method="get">
        <div class="form">
        <label for="app-inp-search-term" >Search</label>
        <input  type="text" id="app-inp-search-term"
        name="term" value="{{ $criteria['term'] }}" /><br>

        <label for="app-inp-search-min-price" >Min Price</label>
        <input  type="number" id="app-inp-search-min-price"
        name="min_price" value="{{ $criteria['min_price'] }}" /><br>
     

        <label for="app-inp-search-max-price" >Max Price</label>
        <input  type="number" id="app-inp-search-max-price"
        name="max_price" value="{{ $criteria['max_price'] }}" />

        </div>
        <div class="button">
        <button type="submit">Search</button>
        <a href="{{ route('products.list') }}">
                <button type="button">X</button>
            </a>
        </div>
    </form>

<table>
    <thead><tr>
        <th>Code</th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        
        <tr></thead>
        <tbody>
        @foreach($products as $product)
                <tr>
                    <td>{{ $product['code'] }}</td>
                    <td>{{ $product['name'] }}</td>
                    <td>
                        @foreach ($product['categories'] as $cat_name)
                                <a href="{{ route('categories.view', ['cat_code' => $cat_name['code']]) }}">
                                    {{ $cat_name['name'] }}
                                </a>&nbsp;
                        @endforeach
                    </td>
                    <td>{{ number_format($product['price'], 2) }}</td>
                </tr>
                
            
        @endforeach
        </tbody>

</table>
@endsection