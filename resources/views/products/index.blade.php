@extends('auth_layout')

@section('main-content')

<div class="p-8">
    <h2 class="text-3xl mb-4 text-white">
        Products
    </h2>

    <div class="flex gap-8">
        @foreach($products as $prod)
            <div class="border border-gray-300 p-4 rounded w-[50%]">
                <h3 class="text-xl text-white">{{$prod->name}}</h3>
                <div class="text-orange-500">{{ $prod->description }}</div>
            </div>
        @endforeach
    </div>
</div>

@endsection
