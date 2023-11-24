<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Add this line for the Validator facade


class ImageController extends BaseController
{
    public function upload(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'file' => 'required|mimes:pdf|max:2048'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error', $validator->errors());
        }

        if ($file = $request->file('file')) {
            $path = $file->store('public/files');
            $name = $file->getClientOriginalName();

            $data = new Image();
            $data->name = $name;
            $data->path = $path;
            $data->save();

            return $this->sendResponse($name, 'file saved successfully');
        }
    }
}
