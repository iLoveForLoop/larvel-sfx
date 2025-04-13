@extends('layout')

@section('content')
    <div class="flex flex-col justify-center items-center min-h-full gap-4">
        <img src="{{ asset('images/signage.jpg') }}" alt="Signage" class="w-[200px]">
        <div class="w-[450px] p-8 bg-white rounded-2xl shadow ">
            @if (session('error'))
                <div class="bg-red-500 px-4 py-2 text-white">
                    {{ session('error') }}
                </div>
            @endif
            <form action="{{ url('/login') }}" method="post">
                @csrf()
                <div class="my-3">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email">
                </div>
                <div class="my-3">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="flex gap-4">
                    <button class="primary">Login</button>
                    <button class="secondary" type="reset">Clear</button>
                </div>
            </form>

        </div>
        <div>
            <span class="text-orange-500">No account yet?</span>
            <a href="{{ url('/register') }}" class="text-green-600">Register Here</a>
        </div>
    </div>
@endsection
