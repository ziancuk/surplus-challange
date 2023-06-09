<?php

namespace App\Http\Controllers;

use App\Models\CategoryProduct;
use Illuminate\Http\Request;
use App\SurplusHelper;
use Illuminate\Support\Facades\Validator;

class CategoryProductController extends Controller
{
    public function list()
    {
        //query to category model
        $data = CategoryProduct::get()->all();
        return SurplusHelper::ApiResponse('success', $data);
    }

    public function list_name()
    {
        //query to category model
        $data = CategoryProduct::with('product', 'category')->get()->all();
        $arr = [];
        foreach ($data as $key => $value) {
            array_push($arr,
            [
               'id' => $value->id,
               'category_name' => $value->category->name,
               'product_name' => $value->product->name,
            ]);
        }
        return SurplusHelper::ApiResponse('success', $arr);
    }

    public function store(Request $request)
    {
        //validation entry
        $validator = Validator::make($request->all(), $this->required('create'));
        if ($validator->fails()) {
            return SurplusHelper::ApiResponse('error', NULL, $validator->messages()->first());
        }

        //validating same value
        $check = CategoryProduct::where('product_id', $request->product_id)->where('category_id', $request->category_id)->first();
        if($check){
            return SurplusHelper::ApiResponse('error', NULL, 'Data already exists');
        }

        //post to model
        $data = $request->all();
        CategoryProduct::create($data);

        return SurplusHelper::ApiResponse('success');
    }

    public function update(Request $request, CategoryProduct $category_product)
    {
        //validation entry
        $validator = Validator::make($request->all(), $this->required('update'));
        if ($validator->fails()) {
            return SurplusHelper::ApiResponse('error', NULL, $validator->messages()->first());
        }
        
        //update data
        $product_id = $category_product->product_id;
        $category_id = $category_product->category_id;
        if($request->product_id) {
            $product_id = $request->product_id;
        }
        if($request->category_id) {
            $category_id = $request->category_id;
        }
        if($request->category_id || $request->product_id) {
            $check = CategoryProduct::where('product_id', $product_id)->where('category_id', $category_id)->first();
            if($check){
                return SurplusHelper::ApiResponse('error', NULL, 'Data already exists');
            }
        }
        //update data
        $req = $request->all();
        $category_product->update($req);

        return SurplusHelper::ApiResponse('success');
    }

    public function destroy(CategoryProduct $category_product)
    {
        //delete data
        $category_product->delete();
        return SurplusHelper::ApiResponse('success');
    }

    public function show(CategoryProduct $category_product)
    {
        //show data
        return SurplusHelper::ApiResponse('success', $category_product);
    }

    public function required($action) {
        if ($action == "create") {

            $required = [
                'product_id' => 'required|exists:products,id',
                'category_id' => 'required|exists:categories,id',
            ];

            return $required;
        }
        if ($action == "update") {
            return [
                'product_id' => 'exists:products,id',
                'category_id' => 'exists:categories,id',
            ];
        }
    }
}
