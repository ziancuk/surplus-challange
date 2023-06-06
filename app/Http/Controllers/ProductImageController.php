<?php

namespace App\Http\Controllers;

use App\Models\ProductImage;
use Illuminate\Http\Request;
use App\SurplusHelper;
use Illuminate\Support\Facades\Validator;

class ProductImageController extends Controller
{
    public function list()
    {
        //query to category model
        $data = ProductImage::get()->all();
        return SurplusHelper::ApiResponse('success', $data);
    }
    public function list_name()
    {
        //query to category model
        $data = ProductImage::with('product', 'image')->get()->all();
        $arr = [];
        foreach ($data as $key => $value) {
            array_push($arr,
            [
               'id' => $value->id,
               'image_name' => $value->image->name,
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
        $check = ProductImage::where('product_id', $request->product_id)->where('image_id', $request->image_id)->first();
        if($check){
            return SurplusHelper::ApiResponse('error', NULL, 'Data already exists');
        }

        //post to model
        $data = $request->all();
        ProductImage::create($data);

        return SurplusHelper::ApiResponse('success');
    }

    public function update(Request $request, ProductImage $product_image)
    {
        //validation entry
        $validator = Validator::make($request->all(), $this->required('update'));
        if ($validator->fails()) {
            return SurplusHelper::ApiResponse('error', NULL, $validator->messages()->first());
        }

        //update data
        $product_id = $product_image->product_id;
        $image_id = $product_image->image_id;
        if($request->product_id) {
            $product_id = $request->product_id;
        }
        if($request->image_id) {
            $image_id = $request->image_id;
        }
        if($request->image_id || $request->product_id) {
            $check = ProductImage::where('product_id', $product_id)->where('image_id', $image_id)->first();
            if($check){
                return SurplusHelper::ApiResponse('error', NULL, 'Data already exists');
            }
        }

        $req = $request->all();
        $product_image->update($req);

        return SurplusHelper::ApiResponse('success');
    }

    public function destroy(ProductImage $product_image)
    {
        //delete data
        $product_image->delete();
        return SurplusHelper::ApiResponse('success');
    }

    public function show(ProductImage $product_image)
    {
        //show data
        return SurplusHelper::ApiResponse('success', $product_image);
    }

    public function required($action) {
        if ($action == "create") {

            $required = [
                'product_id' => 'required|exists:products,id',
                'image_id' => 'required|exists:images,id',
            ];

            return $required;
        }

        if ($action == "update") {
            return [
                'product_id' => 'exists:products,id',
                'image_id' => 'exists:images,id',
            ];
        }
    }
}
