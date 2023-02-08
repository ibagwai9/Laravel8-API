<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Models\Journal;

class FileUploadController extends Controller
{
    // function to store file in 'upload' folder
    public function uploadFile(Request $request)
    {
        // $upload_path = public_path('upload');
        // $file_name = $request->file->getClientOriginalName();
        // $generated_new_name = time() . '.' . $request->file->getClientOriginalExtension();
        // // $request->file->move($upload_path, $generated_new_name);
         
        // $insert['title'] = $file_name;
        // $check = Journal::insertGetId($insert);
        // return response()->json(['success' => 'we have successfully uploaded "' . $file_name . '"']);
        $name = $request->file('file')->getClientOriginalName();
 
        $path = $request->file('file')->store('public/files');
 
        // $save = new File;
 
        // $save->name = $name;
        // $save->path = $path;
 
        return redirect('file-upload')->with('status', 'File Has been uploaded successfully in laravel 8');
 
    
    }
}