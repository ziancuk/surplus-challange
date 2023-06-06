<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\SurplusHelper;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function list()
    {
        //query to category model
        $data = Product::get()->all();
        return SurplusHelper::ApiResponse('success', $data);
    }

    public function store(Request $request)
    {
        //validation entry
        $validator = Validator::make($request->all(), $this->required('create'));
        if ($validator->fails()) {
            return SurplusHelper::ApiResponse('error', NULL, $validator->messages()->first());
        }

        //post to model
        $data = $request->all();
        Product::create($data);

        return SurplusHelper::ApiResponse('success');
    }

    public function update(Request $request, Product $product)
    {
        //update data
        $req = $request->all();
        $product->update($req);

        return SurplusHelper::ApiResponse('success');
    }

    public function destroy(Product $product)
    {
        //delete data
        $product->delete();
        return SurplusHelper::ApiResponse('success');
    }

    public function show(Product $product)
    {
        //show data
        return SurplusHelper::ApiResponse('success', $product);
    }

    public function required($action) {
        if ($action == "create") {

            $required = [
                'name' => 'required|max:100',
                'description' => 'required|max:200',
                'enable' => 'required|boolean',
            ];

            return $required;
        }
    }
}
