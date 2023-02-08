<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Journal;

class FileUploadController extends Controller
{
    // function to store file in 'upload' folder
    public function upload(Request $req)
    {
        $upload_path = public_path('upload');
        $original_name = $req->file('file')->getClientOriginalName();
        $generated_new_name =  time() . '.' .$original_name;
        $req->file->move($upload_path, $generated_new_name);
 
        return  response()->json(['success'=>true, message=> 'File :'.$original_name .' Has been uploaded']);
 
    
    }
}