<?php

namespace App\Http\Controllers;

use App\Models\MasterBank;
use App\Models\StoreProjection;
use App\Models\WithdrawalProjection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardProyeksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        $allBanks = MasterBank::all();

        // Get the bank name and period from the request, defaulting to empty string if not provided
        $bankName = $request->input('bank_name', '');
        $periode = $request->input('periode', '');
        $bankClass = $request->input('bank_class', '');
        // Build query conditions based on the presence of filter parameters
       if ($periode == '' && $bankName == '' && $bankClass == '') {
            $proyeksiAll = StoreProjection::selectRaw(
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
            SUM(ul50) as ul50_sum, 
            periode
            ')
            ->where('projection_type', 'store')
            ->groupBy('periode')
            ->get();

            $proyeksiPenarikan = StoreProjection::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUM(ul50) as ul50_sum, 
            periode')
            ->where('projection_type', 'withdrawal')
            ->groupBy('periode')
            ->get();

            $proyeksiPemusnahan = StoreProjection::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUM(ul50) as ul50_sum, 
            periode')
            ->where('projection_type', 'destruction')
            ->groupBy('bank_name', 'periode')
            ->get();
        }else if ($bankName == '') {
            $proyeksiAll = StoreProjection::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUM(ul50) as ul50_sum, 
            periode')
            ->where(DB::raw("SUBSTRING(periode, 4, 4)"), '=', $periode)
            ->where('projection_type', 'store')
            ->where('bank_class', $bankClass)
            ->groupBy('bank_name', 'periode')
            ->get();

            $proyeksiPenarikan = StoreProjection::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUM(ul50) as ul50_sum, 
            periode')
            ->where(DB::raw("SUBSTRING(periode, 4, 4)"), '=', $periode)
            ->where('projection_type', 'withdrawal')
            ->where('bank_class', $bankClass)
            ->groupBy('bank_name', 'periode')
            ->get();

            $proyeksiPemusnahan = StoreProjection::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUM(ul50) as ul50_sum, 
            periode')
            ->where(DB::raw("SUBSTRING(periode, 4, 4)"), '=', $periode)
            ->where('projection_type', 'destruction')
            ->where('bank_class', $bankClass)
            ->groupBy('bank_name', 'periode')
            ->get();
        }else if ($bankClass == '') {
            $proyeksiAll = StoreProjection::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUM(ul50) as ul50_sum, 
            periode')
            ->where(DB::raw("SUBSTRING(periode, 4, 4)"), '=', $periode)
            ->where('projection_type', 'store')
            ->where('bank_name', $bankName)
            ->groupBy('bank_name', 'periode')
            ->get();

            $proyeksiPenarikan = StoreProjection::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUM(ul50) as ul50_sum, 
            periode')
            ->where(DB::raw("SUBSTRING(periode, 4, 4)"), '=', $periode)
            ->where('projection_type', 'withdrawal')
            ->where('bank_name', $bankName)
            ->groupBy('bank_name', 'periode')
            ->get();

            $proyeksiPemusnahan = StoreProjection::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUM(ul50) as ul50_sum, 
            periode')
            ->where(DB::raw("SUBSTRING(periode, 4, 4)"), '=', $periode)
            ->where('projection_type', 'destruction')
            ->where('bank_name', $bankName)
            ->groupBy('bank_name', 'periode')
            ->get();

        }else if ($periode == '') {
            $proyeksiAll = StoreProjection::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUM(ul50) as ul50_sum, 
            periode')
            ->where('bank_name', '=', $bankName)
            ->where('projection_type', 'store')
            ->where('bank_class', $bankClass)
            ->groupBy('bank_name', 'periode')
            ->get();

            
            $proyeksiPenarikan = StoreProjection::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUM(ul50) as ul50_sum, 
            periode')
            ->where('bank_name', '=', $bankName)
            ->where('bank_class', $bankClass)
            ->where('projection_type', 'withdrawal')
            ->groupBy('bank_name', 'periode')
            ->get();

            $proyeksiPemusnahan = StoreProjection::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUM(ul50) as ul50_sum, 
            periode')
            ->where('bank_name', '=', $bankName)
            ->where('bank_class', $bankClass)
            ->where('projection_type', 'destruction')
            ->groupBy('bank_name', 'periode')
            ->get();
        }else{
            $proyeksiAll = StoreProjection::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUM(ul50) as ul50_sum, 
            periode')
            ->where('bank_name', '=', $bankName)
            ->where('bank_class', '=', $bankClass)
            ->where(DB::raw("SUBSTRING(periode, 4, 4)"), '=', $periode)
            ->where('projection_type', 'store')
            ->groupBy('periode', 'bank_name')
            ->get();

            $proyeksiPenarikan = StoreProjection::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUM(ul50) as ul50_sum, 
            periode')
            ->where('bank_name', '=', $bankName)
            ->where('bank_class', '=', $bankClass)
            ->where(DB::raw("SUBSTRING(periode, 4, 4)"), '=', $periode)
            ->where('projection_type', 'withdrawal')
            ->groupBy('bank_name', 'periode')
            ->get();

            $proyeksiPemusnahan = StoreProjection::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUM(ul50) as ul50_sum, 
            periode')
            ->where('bank_name', '=', $bankName)
            ->where('bank_class', '=', $bankClass)
            ->where(DB::raw("SUBSTRING(periode, 4, 4)"), '=', $periode)
            ->where('projection_type', 'destruction')
            ->groupBy('bank_name', 'periode')
            ->get();
        }
        
        return view('dashboard.dashboard-store-projection', compact('allBanks','proyeksiAll','proyeksiPenarikan','proyeksiPemusnahan'));
    
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
        //
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
