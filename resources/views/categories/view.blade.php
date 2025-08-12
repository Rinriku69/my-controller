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
        
        <tr></thead>
        <tbody>
        @foreach($products as $product)
        @foreach($product['categories'] as $product)
        @if ($product === $cat_code)
            <tr>
                <td>{{ $product['code'] }}</td>
                <td>{{ $product['name'] }}</td>
            </tr>
        @endif
        @endforeach
        @endforeach
        </tbody>

</table>
@endsection