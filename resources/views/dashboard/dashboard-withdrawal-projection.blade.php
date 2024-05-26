@extends('admin.admin_master')
@section('admin')
<div class="container-fluid">
<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item" aria-current="page"><i class="las la-campground"></i> Home</li>
				<li class="breadcrumb-item" aria-current="page">Dashboard</li>
				<li class="breadcrumb-item" aria-current="page">Reealisasi</li>
			</ol>
		</nav>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Filter</h5>
                </div>
                <div class="card-body">
                    <form method="get" action="{{route('dashboardRealization.index')}}">
                        
                        @csrf
                    <div class="row">
                        <label class="col-sm-3 col-form-label">Pilih Bank</label>
                        <div class="col-sm-3">
                        @php
						$role = Auth::user()->roles;
						$bankName = Auth::user()->bank_name;
						$year = $date = date('Y', time());;
                        @endphp
                        <select name="bank_name" class="default-select form-control wide mb-3" style="display: none;" {{ $role = 'administrator' ? 'disabled' : '' }}>
                       
                                <option value="" {{ request()->input('bank_name') == '' ? 'selected' : '' }}>All</option>
                                <option value="Bank Mandiri" {{ request()->input('bank_name') == 'Bank Mandiri' ? 'selected' : '' }}>Bank Mandiri</option>
                            </select>
                        </div>
                        <label class="col-sm-3 col-form-label">Pilih Tahun</label>
                        <div class="col-sm-3">
                        <select name="periode" class="default-select form-control wide mb-3" style="display: none;">
                                <option value = "" {{ request()->input('periode') == '' ? 'selected' : '' }} > All</option>
                                <option value = "2023" {{ request()->input('periode') == '2023' ? 'selected' : '' }} > 2023</option>
                                <option value = "2024" {{ request()->input('periode') == '2024' ? 'selected' : '' }} > 2024</option>
                            </select>
                        </div>
                    </div>
                    

                </div>
                <div class="card-footer d-sm-flex justify-content-between align-items-center">
                    <div class="card-footer-link mb-4 mb-sm-0"></div>
                    
                    <button type="submit" class="btn btn-primary">Search <i class="las la-search"></i>
                    </button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Realisasi Penyetoran {{ request()->input('bank_name') == '' ? 'Seluruh Bank' : request()->input('bank_name') }} Ke Bank Indonesia</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-hover table-bordered table-responsive-sm display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center">#</th>
                                    <th rowspan="2" class="text-center">Periode</th>
                                    <th colspan="7" class="text-center"><i class="las la-money-check"></i> Uang Pecahan Kertas</th>
                                    <th colspan="5" class="text-center"><i class="las la-coins"></i> Uang Pecahan Koin</th>
                                </tr>
                                <tr>
                                    <th>100.000</th>
                                    <th>50.000</th>
                                    <th>20.000</th>
                                    <th>10.000</th>
                                    <th>5.000</th>
                                    <th>2.000</th>
                                    <th>1.000</th>
                                    <th>1.000</th>
                                    <th>500</th>
                                    <th>200</th>
                                    <th>100</th>
                                    <th>50</th>
                                </tr>
                            </thead>
                            <tbody class="text-center ">
                                @foreach($proyeksiAll as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>
                                    {{  
                                        substr($item->periode_month, 0, 2) === '01' ? 'Jan' : 
                                        (substr($item->periode_month, 0, 2) === '02' ? 'Feb' : 
                                        (substr($item->periode_month, 0, 2) === '03' ? 'Mar' : 
                                        (substr($item->periode_month, 0, 2) === '04' ? 'Apr' : 
                                        (substr($item->periode_month, 0, 2) === '05' ? 'Mei' : 
                                        (substr($item->periode_month, 0, 2) === '06' ? 'Jun' : 
                                        (substr($item->periode_month, 0, 2) === '07' ? 'Jul' : 
                                        (substr($item->periode_month, 0, 2) === '08' ? 'Agu' : 
                                        (substr($item->periode_month, 0, 2) === '09' ? 'Sep' : 
                                        (substr($item->periode_month, 0, 2) === '10' ? 'Okt' : 
                                        (substr($item->periode_month, 0, 2) === '11' ? 'Sep' : 
                                        (substr($item->periode_month, 0, 2) === '12' ? 'Okt' : 
                                        (substr($item->periode_month, 0, 2) === '12' ? 'Nov' : 
                                        (substr($item->periode_month, 0, 2) === '12' ? 'Des' : 
                                        ''                                            
                                        )))))))))))))
                                    }}
                                    </td>
                                    <td>{{ $item -> uk100000_sum }}</td>
                                    <td>{{ $item -> uk50000_sum }}</td>
                                    <td>{{ $item -> uk20000_sum }}</td>
                                    <td>{{ $item -> uk10000_sum }}</td>
                                    <td>{{ $item -> uk5000_sum }}</td>
                                    <td>{{ $item -> uk2000_sum }}</td>
                                    <td>{{ $item -> uk1000_sum }}</td>
                                    <td>{{ $item -> ul1000_sum }}</td>
                                    <td>{{ $item -> ul500_sum }}</td>
                                    <td>{{ $item -> ul200_sum }}</td>
                                    <td>{{ $item -> ul100_sum }}</td>
                                    <td>{{ $item -> ul50_sum }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Realisasi Penarikan {{ request()->input('bank_name') == '' ? 'Seluruh Bank' : request()->input('bank_name') }} Ke Bank Indonesia</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-hover table-bordered table-responsive-sm display" style="min-width: 845px">
                            <thead>
                                <tr>
                                    <th rowspan="2" class="text-center">#</th>
                                    <th rowspan="2" class="text-center">Periode</th>
                                    <th colspan="7" class="text-center"><i class="las la-money-check"></i> Uang Pecahan Kertas</th>
                                    <th colspan="5" class="text-center"><i class="las la-coins"></i> Uang Pecahan Koin</th>
                                </tr>
                                <tr>
                                    <th>100.000</th>
                                    <th>50.000</th>
                                    <th>20.000</th>
                                    <th>10.000</th>
                                    <th>5.000</th>
                                    <th>2.000</th>
                                    <th>1.000</th>
                                    <th>1.000</th>
                                    <th>500</th>
                                    <th>200</th>
                                    <th>100</th>
                                    <th>50</th>
                                </tr>
                            </thead>
                            <tbody class="text-center ">
                                @foreach($proyeksiPenarikan as $key => $item)
                                <tr>
                                    <td>{{ $key+1 }} </td>
                                    <td>
                                    {{  
                                        substr($item->periode_month, 0, 2) === '01' ? 'Jan' : 
                                            (substr($item->periode_month, 0, 2) === '02' ? 'Feb' : 
                                            (substr($item->periode_month, 0, 2) === '03' ? 'Mar' : 
                                            (substr($item->periode_month, 0, 2) === '04' ? 'Apr' : 
                                            (substr($item->periode_month, 0, 2) === '05' ? 'Mei' : 
                                            (substr($item->periode_month, 0, 2) === '06' ? 'Jun' : 
                                            (substr($item->periode_month, 0, 2) === '07' ? 'Jul' : 
                                            (substr($item->periode_month, 0, 2) === '08' ? 'Agu' : 
                                            (substr($item->periode_month, 0, 2) === '09' ? 'Sep' : 
                                            (substr($item->periode_month, 0, 2) === '10' ? 'Okt' : 
                                            (substr($item->periode_month, 0, 2) === '11' ? 'Sep' : 
                                            (substr($item->periode_month, 0, 2) === '12' ? 'Okt' : 
                                            (substr($item->periode_month, 0, 2) === '12' ? 'Nov' : 
                                            (substr($item->periode_month, 0, 2) === '12' ? 'Des' : 
                                            ''                                            
                                            )))))))))))))
                                    }}
                                    </td>
                                    <td>{{ $item -> uk100000_sum }}</td>
                                    <td>{{ $item -> uk50000_sum }}</td>
                                    <td>{{ $item -> uk20000_sum }}</td>
                                    <td>{{ $item -> uk10000_sum }}</td>
                                    <td>{{ $item -> uk5000_sum }}</td>
                                    <td>{{ $item -> uk2000_sum }}</td>
                                    <td>{{ $item -> uk1000_sum }}</td>
                                    <td>{{ $item -> ul1000_sum }}</td>
                                    <td>{{ $item -> ul500_sum }}</td>
                                    <td>{{ $item -> ul200_sum }}</td>
                                    <td>{{ $item -> ul100_sum }}</td>
                                    <td>{{ $item -> ul50_sum }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection