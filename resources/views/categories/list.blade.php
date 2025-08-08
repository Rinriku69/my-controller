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
        @foreach($categories as $category)
        <tr>
        <td>{{ $category['code'] }}</td> 
        <td>{{ $category['name'] }}</td>
        </tr>
        @endforeach
        </tbody>
</table>
@endsection