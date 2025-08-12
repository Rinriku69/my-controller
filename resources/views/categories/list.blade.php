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
        
        <tr></thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
        <td><a href="{{ route('categories.view', ['cat_code' => $category['code']]) }}">
                                    {{ $category['code'] }}
                                </a>&nbsp;</td> 
        <td>{{ $category['name'] }}</td>
        </tr>
        @endforeach
        </tbody>
</table>
@endsection