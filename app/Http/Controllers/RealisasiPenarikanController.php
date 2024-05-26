<?php

namespace App\Http\Controllers;

use App\Models\StoreProjection;
use App\Models\StoreRealization;
use App\Models\WithdrawalRealization;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RealisasiPenarikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $role = Auth::user()->roles;
        $bankName = Auth::user()->bank_name;

        if($role == 'administrator'){
        $proyeksiAll = StoreRealization::where('realization_type', 'withdrawal')
        ->where('status','1')
        ->get();
        }else{
            $proyeksiAll = StoreRealization::where('realization_type', 'withdrawal')
            ->where('status','1')
            ->where('bank_name',$bankName)
            ->get();
        }
        return view('realization.penarikan.list-withdrawal-realization', compact('proyeksiAll'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $periode = $request->input('periode', '');
        $bankName = 'Bank Mandiri';

        $proyeksi = StoreProjection::where('projection_type', 'withdrawal')
        ->where('periode', $periode)
            ->first(); // Assuming you expect only one record

        $sumRealisasi = StoreRealization::selectRaw(
            '
        SUM(uk100000) as uk100000_sum, 
        SUM(uk50000) as uk50000_sum, 
        SUM(uk20000) as uk20000_sum, 
        SUM(uk10000) as uk10000_sum, 
        SUM(uk5000) as uk5000_sum, 
        SUM(uk2000) as uk2000_sum, 
        SUM(uk1000) as uk1000_sum, 
        SUM(ul1000) as ul1000_sum, 
        SUM(ul500) as ul500_sum, 
        SUM(ul200) as ul200_sum, 
        SUM(ul100) as ul100_sum, 
        SUM(ul50) as ul50_sum
        '
        )
            ->where(DB::raw("SUBSTRING(periode, 4, 7)"), '=', $periode)
            ->where('realization_type', 'withdrawal')
            ->groupBy('periode')
            ->first(); // Assuming you expect only one record

        // Calculate the differences
        if ($proyeksi && $sumRealisasi) {
            $sisaUk100000 = $proyeksi->uk100000 - $sumRealisasi->uk100000_sum;
            $sisaUk50000 = $proyeksi->uk50000 - $sumRealisasi->uk50000_sum;
            $sisaUk20000 = $proyeksi->uk20000 - $sumRealisasi->uk20000_sum;
            $sisaUk10000 = $proyeksi->uk10000 - $sumRealisasi->uk10000_sum;
            $sisaUk5000 = $proyeksi->uk5000 - $sumRealisasi->uk5000_sum;
            $sisaUk2000 = $proyeksi->uk2000 - $sumRealisasi->uk2000_sum;
            $sisaUk1000 = $proyeksi->uk1000 - $sumRealisasi->uk1000_sum;
            $sisaUl1000 = $proyeksi->ul1000 - $sumRealisasi->ul1000_sum;
            $sisaUl500 = $proyeksi->ul500 - $sumRealisasi->ul500_sum;
            $sisaUl200 = $proyeksi->ul200 - $sumRealisasi->ul200_sum;
            $sisaUl100 = $proyeksi->ul100 - $sumRealisasi->ul100_sum;
            $sisaUl50 = $proyeksi->ul50 - $sumRealisasi->ul50_sum;
        } elseif ($proyeksi) {
            $sisaUk100000 = $proyeksi ? $proyeksi->uk100000 : 0;
            $sisaUk50000 = $proyeksi ? $proyeksi->uk50000 : 0;
            $sisaUk20000 = $proyeksi ? $proyeksi->uk20000 : 0;
            $sisaUk10000 = $proyeksi ? $proyeksi->uk10000 : 0;
            $sisaUk5000 = $proyeksi ? $proyeksi->uk5000 : 0;
            $sisaUk2000 = $proyeksi ? $proyeksi->uk2000 : 0;
            $sisaUk1000 = $proyeksi ? $proyeksi->uk1000 : 0;
            $sisaUl1000 = $proyeksi ? $proyeksi->ul1000 : 0;
            $sisaUl500 = $proyeksi ? $proyeksi->ul500 : 0;
            $sisaUl200 = $proyeksi ? $proyeksi->ul200 : 0;
            $sisaUl100 = $proyeksi ? $proyeksi->ul100 : 0;
            $sisaUl50 = $proyeksi ? $proyeksi->ul50 : 0;
        } else {
            $sisaUk100000 = 0;
            $sisaUk50000 = 0;
            $sisaUk20000 = 0;
            $sisaUk10000 = 0;
            $sisaUk5000 =  0;
            $sisaUk2000 =  0;
            $sisaUk1000 =  0;
            $sisaUl1000 =  0;
            $sisaUl500 =  0;
            $sisaUl200 =  0;
            $sisaUl100 =  0;
            $sisaUl50 =  0;
        }

        
        return view('realization.penarikan.form-withdrawal-realization-add', compact('sisaUk100000', 'sisaUk50000', 'sisaUk20000', 'sisaUk10000', 'sisaUk5000', 'sisaUk2000', 'sisaUk1000', 'sisaUl1000', 'sisaUl500', 'sisaUl200', 'sisaUl100', 'sisaUl50'));
    }


    
    public function cekProyeksi(Request $request)
    {
        
        $proyeksi = StoreProjection::where('projection_type', 'withdrawal')
        ->where('periode',$request->periodePenyetoran)
        ->get();
        return view('realization.penarikan.form-withdrawal-realization-add', compact('proyeksi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $status = '1';
        $realizationType = 'withdrawal';
        $storeType = '';
        $WithdrawalRealization = StoreRealization::create([
            'periode' => $request->periode_penyetoran,
            'realization_type' => $realizationType,
            'store_type' => $storeType,
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
            'created_by' => Auth::user()->name,
            'bank_name' => Auth::user()->bank_name
        ]);

        $notification = array(
            'message' => 'Proyeksi Penyetoran Created Successfully', 
            'alert-type' => 'success'
        );
        return redirect()->route('withdrawalRealization.index')->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $proyeksiView = StoreRealization::findOrFail($id);
        return view('realization.penarikan.form-withdrawal-realization-view', compact('proyeksiView'));
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
        $data = StoreRealization::findOrFail($id);
        $data->status = '0';
        $data->save();
        
        $notification = array(
            'message' => 'Proyeksi Penyetoran Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('withdrawalRealization.index')->with($notification);
    }
}
