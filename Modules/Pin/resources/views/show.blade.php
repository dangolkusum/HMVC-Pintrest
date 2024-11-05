@extends('layouts.app')

@section('content')
<h1>Pin Details</h1>
<h2>{{ $pin->title }}</h2>
<p>{{ $pin->description }}</p>
<img src="{{ asset('path/to/image/'.$pin->image) }}" alt="{{ $pin->title }}">
<a href="{{ route('pins.edit', $pin->id) }}">Edit</a>
<form action="{{ route('pins.destroy', $pin->id) }}" method="POST" style="display:inline;">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
<a href="{{ route('pins.index') }}">Back to All Pins</a>
@endsection