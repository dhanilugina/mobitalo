<?php

namespace App\Http\Controllers;

use App\Models\StoreRealization;
use App\Models\WithdrawalRealization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardRealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // Get the bank name and period from the request, defaulting to empty string if not provided
        $bankName = $request->input('bank_name', '');
        $periode = $request->input('periode', '');


        // Build query conditions based on the presence of filter parameters
        if ($bankName == '' && $periode == ''){
            $proyeksiAll = StoreRealization::selectRaw(
                'SUM(uk100000) as uk100000_sum, 
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
                SUBSTRING(periode, 4, 7) as periode_month')
                ->where('realization_type', 'store')
                ->groupBy(DB::raw("SUBSTRING(periode, 4, 7)"))
                ->get();
    
                $proyeksiPenarikan = StoreRealization::selectRaw('SUM(uk100000) as uk100000_sum, 
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
                SUBSTRING(periode, 4, 7) as periode_month')
                ->where('realization_type', 'withdrawal')
                ->groupBy(DB::raw("SUBSTRING(periode, 4, 7)"))
                ->get();
        }
        else if ($bankName == '') {
            $proyeksiAll = StoreRealization::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUBSTRING(periode, 4, 7) as periode_month')
            ->where(DB::raw("SUBSTRING(periode, 7, 4)"), '=', $periode)
            ->where('realization_type', 'store')
            ->groupBy('bank_name', DB::raw("SUBSTRING(periode, 4, 7)"))
            ->get();

            $proyeksiPenarikan = StoreRealization::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUBSTRING(periode, 4, 7) as periode_month')
            ->where(DB::raw("SUBSTRING(periode, 7, 4)"), '=', $periode)
            ->where('realization_type', 'withdrawal')
            ->groupBy('bank_name', DB::raw("SUBSTRING(periode, 4, 7)"))
            ->get();
        }else if ($periode == '') {
            $proyeksiAll = StoreRealization::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUBSTRING(periode, 4, 7) as periode_month')
            ->where('bank_name', '=', $bankName)
            ->where('realization_type', 'store')
            ->groupBy(DB::raw("SUBSTRING(periode, 4, 7)","bank_name"))
            ->get();

            $proyeksiPenarikan = StoreRealization::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUBSTRING(periode, 4, 7) as periode_month')
            ->where('bank_name', '=', $bankName)
            ->where('realization_type', 'withdrawal')
            ->groupBy('bank_name', DB::raw("SUBSTRING(periode, 4, 7)"))
            ->get();
        }else{
            $proyeksiAll = StoreRealization::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUBSTRING(periode, 4, 7) as periode_month')
            ->where('bank_name', '=', $bankName)
            ->where('realization_type', 'store')
            ->where(DB::raw("SUBSTRING(periode, 7, 4)"), '=', $periode)
            ->groupBy(DB::raw("SUBSTRING(periode, 4, 7)"), 'bank_name')
            ->get();


            $proyeksiPenarikan = StoreRealization::selectRaw('SUM(uk100000) as uk100000_sum, 
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
            SUBSTRING(periode, 4, 7) as periode_month')
            ->where('bank_name', '=', $bankName)
            ->where('realization_type', 'withdrawal')
            ->where(DB::raw("SUBSTRING(periode, 7, 4)"), '=', $periode)
            ->groupBy('bank_name', DB::raw("SUBSTRING(periode, 4, 7)"))
            ->get();
        }

        return view('dashboard.dashboard-withdrawal-projection', compact('proyeksiAll','proyeksiPenarikan'));
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
