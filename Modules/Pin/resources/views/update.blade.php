@extends('layouts.app')

@section('content')
<h1>Create a New Pin</h1>
<form action="{{ route('pins.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Pin Title" required>
    <textarea name="description" placeholder="Pin Description" required></textarea>
    <input type="file" name="image" required>
    <button type="submit">Create Pin</button>
</form>
<form action="{{ route('pins.destroy', $pin->id) }}" method="POST" style="display:inline;">
            @csrf <!-- Include CSRF token for security -->
            <button type="submit" onclick="return confirm('Are you sure you want to delete this pin?');">Delete</button>
        </form>
@endsection