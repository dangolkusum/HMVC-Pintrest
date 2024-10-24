@extends('pin::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('pin.name') !!}</p>
@endsection
