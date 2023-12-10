<?php

namespace App\Http\Controllers\Api\V1;

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
            $perPage = 8;
        }

        $products = Product::where($filter);
        return new ProductCollection($products->paginate($perPage)->appends($request->query()));

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
        $newProduct = $request->except('image');
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('/images');
            $path = "/salemall/storage/app/".$path;
            
            $newProduct['image'] = $path;
        }
        $product = Product::create($newProduct);
        return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        
        return new ProductResource($product);
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
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return response()->json(['message' => 'Successfully delete']);
    }

}
