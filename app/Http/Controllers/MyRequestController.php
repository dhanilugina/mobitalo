<?php

namespace App\Http\Controllers;

use App\Models\StoreProjection;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MyRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bankClass = Auth::user()->bank_class;
        $bankName = Auth::user()->bank_name;
        $myRequest = Tasks::all()
        ->where('status','0')
        ->where('bank_class',$bankClass)
        ->where('bank_name',$bankName);
        return view('my-request.list-my-request', compact('myRequest'));
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
        $idTasks = $request->idTasks;
        $status = $request->statusApproval;
        $aftereData = Tasks::findOrFail($idTasks);
        $periode = $aftereData->period;
        $projectionType = $aftereData->type;
        $bankName = $aftereData->bank_name;


        $storeProjection = StoreProjection::where('periode', $periode)
            ->where('projection_type', $projectionType)
            ->where('bank_name', $bankName)
            ->update([
                'uk100000' => $aftereData->after_uk100000,
                'uk50000' => $aftereData->after_uk50000,
                'uk20000' => $aftereData->after_uk20000,
                'uk10000' => $aftereData->after_uk10000,
                'uk5000' => $aftereData->after_uk5000,
                'uk2000' => $aftereData->after_uk2000,
                'uk1000' => $aftereData->after_uk1000,
                'ul1000' => $aftereData->after_ul1000,
                'ul500' => $aftereData->after_ul500,
                'ul200' => $aftereData->after_ul200,
                'ul100' => $aftereData->after_ul100,
                'ul50' => $aftereData->after_ul50,
                'updated_by' => Auth::user()->name,
                'updated_at' => now()
            ]);


        $taskUpdate = Tasks::where('id', $idTasks) 
        ->update([
            'status' => $status,
            'updated_by' => Auth::user()->name,
            'updated_at' => now()
        ]);  

        $notification = array(
            'message' => 'Proyeksi Penyetoran Created Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('myRequest.index')->with($notification);
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
        return view('my-request.form-my-request-view', compact('myRequestShow', 'fileContent'));
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
