<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response as FacadesResponse;
use App\Models\Image;
use Illuminate\Http\Request;
use App\SurplusHelper;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function list()
    {
        //query to model
        $data = Image::get()->all();
        return SurplusHelper::ApiResponse('success', $data);
    }

    public function store(Request $request)
    {
        //validation entry
        $validator = Validator::make($request->all(), $this->required('create'));
        if ($validator->fails()) {
            return SurplusHelper::ApiResponse('error', NULL, $validator->messages()->first());
        }

        if($request->file) {
            $image = $request->file('file');
            $type = $image->getClientOriginalExtension();
            $name = time() . '.' . $type;
            $image->move(public_path('images/file'), $name);
        }

        //post to model
        $data = $request->all();
        $data['file'] = $name;

        Image::create($data);

        return SurplusHelper::ApiResponse('success');
    }

    public function update(Request $request, Image $image)
    {
        //validation entry
        $validator = Validator::make($request->all(), $this->required('update'));
        if ($validator->fails()) {
            return SurplusHelper::ApiResponse('error', NULL, $validator->messages()->first());
        }
        // get request
        $req = $request->all();

        // checking file
        if($request->file) {
            $picture = $request->file('file');
            $type = $picture->getClientOriginalExtension();
            $name = time() . '.' . $type;
            $picture->move(public_path('images/file'), $name);
            $req['file'] = $name;

            $file = public_path('images/file/' . $image->first()->file);
            if (file_exists($file)) {
                unlink($file);
            }
        }

        // update data
        $image->update($req);

        return SurplusHelper::ApiResponse('success');
    }

    public function destroy(Image $image)
    {
        //delete data
        $file = public_path('images/file/' . $image->file);
        if (file_exists($file)) {
            unlink($file);
        }

        $image->delete();
        return SurplusHelper::ApiResponse('success');
    }

    public function show(Image $image)
    {
        //show data
        return SurplusHelper::ApiResponse('success', $image);
    }

    public function required($action) {
        if ($action == "create") {

            $required = [
                'name' => 'required|max:100',
                'file' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1024',
                'enable' => 'required|boolean',
            ];

            return $required;
        }

        if ($action == "update") {
            return [
                'image_id' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024',
            ];
        }
    }

    public function get_image($id){
        $image = Image::where('id', $id)->first();
        $filepath = public_path('images/file/'. $image->file);

        return FacadesResponse::download($filepath); 
    }
}
