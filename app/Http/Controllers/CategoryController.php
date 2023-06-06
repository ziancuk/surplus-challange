<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\SurplusHelper;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function list(Request $request)
    {
        //query to category model
        // $query = Category::with('employee')->select($request->dataField)->groupBy($request->dataField);
        $data = Category::get()->all();

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
        Category::create($data);

        return SurplusHelper::ApiResponse('success');
    }

    public function update(Request $request, Category $category)
    {
        //update data
        $req = $request->all();
        $category->update($req);

        return SurplusHelper::ApiResponse('success');
    }

    public function destroy(Category $category)
    {
        //delete data
        $category->delete();
        return SurplusHelper::ApiResponse('success');
    }

    public function show(Category $category)
    {
        //show data
        return SurplusHelper::ApiResponse('success', $category);
    }

    public function required($action) {
        if ($action == "create") {

            $required = [
                'name' => 'required|max:100',
                'enable' => 'required|boolean',
            ];

            return $required;
        }
    }
}
