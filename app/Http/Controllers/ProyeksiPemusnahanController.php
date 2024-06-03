<?php

namespace App\Http\Controllers;

use App\Models\StoreProjection;
use App\Models\Tasks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProyeksiPemusnahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Auth::user()->roles;
        $bankName = Auth::user()->bank_name;

        if($role == 'administrator'){
            $proyeksiAll = StoreProjection::where('projection_type', 'destruction')
            ->where('status','1')
            ->get();
        }else{
            $proyeksiAll = StoreProjection::where('projection_type', 'destruction')
            ->where('status','1')
            ->where('bank_name',$bankName)
            ->get();
        }
        return view('projection.destruction.list-destruction-projection', compact('proyeksiAll'));//
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projection.destruction.form-destruction-projection-add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'periode' => ['required', 'string', 'max:255']
        ]);
        
        $status = '1';
        $projectionType = 'destruction';

        $destructionProjection = StoreProjection::create([
            'periode' => $request->periode,
            'projection_type' => $projectionType,
            'uk100000' => $request->uk_100000 ? $request->uk_100000 : 0,
            'uk50000' => $request->uk_50000 ? $request->uk_50000 : 0,
            'uk20000' => $request->uk_20000 ? $request->uk_20000 : 0,
            'uk10000' => $request->uk_10000 ? $request->uk_10000 : 0,
            'uk5000' => $request->uk_5000 ? $request->uk_5000 : 0,
            'uk2000' => $request->uk_2000 ? $request->uk_2000 : 0,
            'uk1000' => $request->uk_1000 ? $request->uk_1000 : 0,
            'ul1000' => $request->ul_1000 ? $request->ul_1000 : 0,
            'ul500' => $request->ul_500 ? $request->ul_500 : 0,
            'ul200' => $request->ul_200 ? $request->ul_200 : 0,
            'ul100' => $request->ul_100 ? $request->ul_100 : 0,
            'ul50' => $request->ul_50 ? $request->ul_50 : 0,
            'status' => $status,
            'created_at' => now(),
            'created_by' => Auth::user()->id,
            'bank_name' => Auth::user()->bank_name
        ]);


        $notification = array(
            'message' => 'Proyeksi Pemusnahan Created Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('destructionProjection.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proyeksiView = StoreProjection::findOrFail($id);
        return view('projection.destruction.form-destruction-projection-view', compact('proyeksiView'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $proyeksiEdit = StoreProjection::findOrFail($id);
        return view('projection.destruction.form-destruction-projection-edit', compact('proyeksiEdit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->idStoreProjection;
        $beforeData = StoreProjection::findOrFail($id);
        $data = new Tasks();
        $data->period = $beforeData -> periode;
        $data->before_uk100000 = $beforeData -> uk100000;
        $data->before_uk50000 = $beforeData -> uk50000;
        $data->before_uk20000 = $beforeData -> uk20000;
        $data->before_uk10000 = $beforeData -> uk10000;
        $data->before_uk5000 = $beforeData -> uk5000;
        $data->before_uk2000 = $beforeData -> uk2000;
        $data->before_uk1000 = $beforeData -> uk1000;
        $data->before_ul1000 = $beforeData -> ul1000;
        $data->before_ul500 = $beforeData -> ul500;
        $data->before_ul200 = $beforeData -> ul200;
        $data->before_ul100 = $beforeData -> ul100;
        $data->before_ul50 = $beforeData -> ul50;
        $data->after_uk100000 = str_replace(',', '', $request->uk_100000);
        $data->after_uk50000 = str_replace(',', '', $request->uk_50000);
        $data->after_uk20000 = str_replace(',', '', $request->uk_20000);
        $data->after_uk10000 = str_replace(',', '', $request->uk_10000);
        $data->after_uk5000 = str_replace(',', '', $request->uk_5000);
        $data->after_uk2000 = str_replace(',', '', $request->uk_2000);
        $data->after_uk1000 = str_replace(',', '', $request->uk_1000);
        $data->after_ul1000 = str_replace(',', '', $request->ul_1000);
        $data->after_ul500 = str_replace(',', '', $request->ul_500);
        $data->after_ul200 = str_replace(',', '', $request->ul_200);
        $data->after_ul100 = str_replace(',', '', $request->ul_100);
        $data->after_ul50 = str_replace(',', '', $request->ul_50);
        $data->created_at = now();
        $data->created_by = Auth::user()->id;
        $data->bank_name = Auth::user()->bank_name;
        $data->bank_class = Auth::user()->bank_class;
        $data->status = '0';
        $data->type = 'destruction';
        $data->adjustment_type = 'PD';

        if ($request->file('fileNota')) {
            $file = $request->file('fileNota');
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $path = 'nota/';
            Storage::disk('public')->put($path . $filename, file_get_contents($file));
            //$file->move(public_path('upload/admin_images'),$filename);
            $data->file_attachment = $filename;
        }
        
        $data->save();
        

        $notification = array(
            'message' => 'Proyeksi Pemusnahan Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('destructionProjection.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = StoreProjection::findOrFail($id);
        $data->status = '0';
        $data->save();
        
        $notification = array(
            'message' => 'Proyeksi Pemusnahan Deleted Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('destructionProjection.index')->with($notification);
    }
}
