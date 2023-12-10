<?php

namespace App\Http\Controllers\Api\V2;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Requests\StoreProductRequest;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('jwtauth', ['only' => ['store',
                                                'destroy',
                                                'update'
                                                ]]);
    }
    public function index(Request $request)
    {
        //
        $request->validate([
            'perPage'=>'numeric|min:5|max:20'
        ]);

        $filter = [];

        if(isset($request['search'])){
            $filter[] = ['name','like','%'.$request['search'].'%'];
        }
        // return $filter;

        $perPage = $request->query('perPage');
        if(!$perPage){
            $perPage = 14;
        }

        $data = Product::where($filter);
        $products =  new ProductCollection($data->paginate($perPage)->appends($request->query()));
        return view('layouts.main')->with(compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
        $product = Product::create($request->all());
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $product_id)
    {
        //
        $product = Product::findOrFail($product_id);
        $product = new ProductResource($product);
        $user = auth()->user();
        return view('layouts.details')->with(compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
