@extends('layouts.app')

@section('content')
<h1>Edit Pin</h1>
<form action="{{ route('pins.update', $pin->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $pin->title }}" required>
    <textarea name="description" required>{{ $pin->description }}</textarea>
    <input type="file" name="image">
    <button type="submit">Update Pin</button>
</form>
@endsection