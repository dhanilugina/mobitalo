<?php

namespace App\Http\Controllers;

use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ApprovalHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Auth::user()->roles;
        $user = Auth::user()->id;
        if($role == 'administrator'){
            $approvalHistory = Tasks::all();
        }else{   
            $approvalHistory = Tasks::all()
            ->where('created_by','=',$user);
        }
        return view('approval-history.list-approval-history', compact('approvalHistory'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $myRequestShow = Tasks::findOrFail($id);
        $fileAttachment = $myRequestShow->file_attachment;

        // Define the path to the PDF file
        $pathToFile = 'nota/' . $fileAttachment;
    
        // Check if the file exists
        if (Storage::disk('public')->exists($pathToFile)) {
            // Read the file content
            $fileContent = Storage::disk('public')->get($pathToFile);
        } else {
            // If the file does not exist, handle the error (e.g., return a 404 page)
            abort(404);
        }
        
        // Pass the file content to the view
        return view('approval-history.form-approval-history-view', compact('myRequestShow', 'fileContent'));
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
