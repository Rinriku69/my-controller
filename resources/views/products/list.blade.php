@extends('layouts.main', [
'title' => $title,
])

@section('content')
    <form action="{{ route('products.list') }}" method="get">
        <div>
        <label for="app-inp-search-term" >Search</label>
        <input  type="text" id="app-inp-search-term"
        name="term" value="{{ $criteria['term'] }}" />
        
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