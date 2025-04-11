@extends('auth_layout')

@section('main-content')


<div class="p-8">

    <h2 class="text-2xl text-white">Create Product</h2>

    <form action="{{url('/products')}}" method="post" class="w-[400px]">
        @csrf()

        <div class="mb-3 mt-3">
            <label for="name">Product Name</label>
            <input type="text" name="name" id="name">
        </div>

        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description"
                id="description"
                cols="30"
                rows="10"
                class="bg-white rounded-lg w-full"
            ></textarea>
        </div>

        <div class="mb-3 mt-3">
            <label for="price">Price</label>
            <input type="number" step="0.1" name="price" id="price">
        </div>

        <div class="mb-3">
            <label for="status">Status</label>
            <select
                name="status"
                id="status"
                class="bg-white rounded p-2 w-full"
            >
                <option value="0">Pending</option>
                <option value="1">Available</option>
                <option value="2">Reserved</option>
                <option value="3">Sold</option>
            </select>
        </div>

        <div>
            <button class="primary" type="submit">Save Product</button>
            <button class="secondary" type="reset">Clear</button>
        </div>

    </form>

</div>

@endsection
