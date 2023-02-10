<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Journal;

class JournalsController extends Controller
{
    public function index()
    {
        $journals = auth()->user()->journals;
 
        return response()->json([
            'success' => true,
            'data' => $journals
        ]);
    }
 
    public function show(Journal $journal)
    {
        // $journal = auth()->user()->journals()->find($id);
 
        if (!$journal) {
            return response()->json([
                'success' => false,
                'message' => 'Journal not found '
            ], 400);
        }
        $journal['user'] = $journal->user;

        return response()->json([
            'success' => true,
            'data' => $journal
        ], 200);
    }
 
 
    public function update(Request $request, $id)
    {
        $journal = auth()->user()->journals()->find($id);
 
        if (!$journal) {
            return response()->json([
                'success' => false,
                'message' => 'Journal not found'
            ], 400);
        }
 
        $updated = $journal->update($request->all());
            // return         $updated;
        if ($updated)
            return response()->json([
                'success' => true,
                'message' => 'Journal has been updated'
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'Journal can not be updated'
            ], 500);
    }
 
    public function destroy($id)
    {
        $journal = auth()->user()->journals()->find($id);
 
        if (!$journal) {
            return response()->json([
                'success' => false,
                'message' => 'Journal not found'
            ], 400);
        }
 
        if ($journal->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Journal can not be deleted'
            ], 500);
        }
    }

    // function to store file in 'upload' folder
    public function store(Request $req)
    {
        // return $req->only(['title','abstract','author','publisher','publication_date','publisher_address','user_id','status']);
        $upload_path = public_path('upload');
        $original_name = $req->file('file')->getClientOriginalName();
        $generated_new_name =  time() . '.' .$original_name;
        $req->file->move($upload_path, $generated_new_name);
        $journal = new Journal($req->only(['title','abstract','author','publisher','publication_date','publisher_address','user_id','status']));
        $journal['url'] = $generated_new_name;
        $journal['user_id'] =  auth()->user()->id;
        $journal->save();
        
        return response()->json([
           'success' => true,
           'message' => 'File :"'.$original_name.'" Has been uploaded'
        ], 200);
    }
 
}
