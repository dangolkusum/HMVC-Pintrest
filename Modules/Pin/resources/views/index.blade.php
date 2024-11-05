@extends('layout')

@section('content')
<style>
    .badge {
        position: absolute;
        background-color: #E84B4F;
        border-radius: 40%;
        padding: 5px 10px 5px 10px;
        margin-left: 70%;
        display: none;

    }
</style>
<div class="flex grid grid-cols-3">
    @foreach($pins as $pin)
    <div class="mt-7 relative">
        <div class="badge">
            <span>Save</span>
        </div>

        <img src="{{ asset($pin->image) }}" class="hover:brightness-75" alt=""
            style=" width:350px; height:400px; border: 1px #808080; padding-left:10px; border-radius:20px"
            onmouseenter="showBadge(this)">
    </div>
    @endforeach
</div>

<script>
    function showBadge(element) {
        element.querySelector('.badge').style.display = 'flex';
    }
</script>









@endsection