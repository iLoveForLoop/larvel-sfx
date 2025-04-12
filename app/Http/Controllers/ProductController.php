<?php

namespace App\Http\Controllers;

use App\Mail\NotifyMail;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProductController extends Controller
{
    public function index() {
        $products = Product::get();
        return view('products.index', compact('products'));
    }

    public function create() {
        return view('products.create');
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'status' => 'required|integer',
        ]);

        $product = Product::create($request->all());

        Mail::to(auth()->user())->send(new NotifyMail($product));

        return redirect()->route('products.index');
    }
}
