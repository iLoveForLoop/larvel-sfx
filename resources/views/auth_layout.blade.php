@extends('layout')

@section('content')

<header class="p-4 flex items-center justify-between">
    <img src="{{asset('images/signage.jpg')}}" alt="Signage" class="w-[100px]">
    <nav class="main-nav">
        <a href="{{url('/products')}}">Products</a>
        <a href="{{url('/products/create')}}">Create Product</a>
        <a href="{{url('/logout')}}">Logout</a>
    </nav>
</header>

@yield('main-content')

@endsection
