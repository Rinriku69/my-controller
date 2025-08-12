@extends('layouts.main', [
'title' => $title,
])

@section('content')
    <form action="{{ route('categories.list') }}" method="get">
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