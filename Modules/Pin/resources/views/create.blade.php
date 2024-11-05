@extends('layout')

@section('content')
<div class="mt-7 flex justify-center  h-[350px]">
    <div class="border border-gray-300 w-1/3 p-6 rounded-lg shadow-lg">
        <div class="text-center mb-6">
            <h1 class="text-xl font-semibold">Create a New Pin</h1>
        </div>
        <div>
            <form action="{{ route('pins.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <input type="text" name="title" placeholder="Pin Title" class="focus:outline-none border border-gray-300 w-full p-2 rounded">
                </div>
                <div class="mb-4">
                    <textarea name="description" placeholder="Pin Description" class="focus:outline-none border border-gray-300 w-full p-2 rounded"></textarea>
                </div>
                <div class="mb-4 w-full p-2 rounded bg-gray-200 text-center text-gray-700">
                    <input type="file" name="image" class="w-full">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Create Pin</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection