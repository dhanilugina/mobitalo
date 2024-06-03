<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApprovalHistoryController;
use App\Http\Controllers\DashboardProyeksiController;
use App\Http\Controllers\DashboardRealisasiController;
use App\Http\Controllers\MyRequestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProyeksiPemusnahanController;
use App\Http\Controllers\ProyeksiPenarikanController;
use App\Http\Controllers\ProyeksiPenyetoranController;
use App\Http\Controllers\RealisasiPemusnahanController;
use App\Http\Controllers\RealisasiPenarikanController;
use App\Http\Controllers\RealisasiPenyetoranController;
use App\Http\Controllers\RealisasiPenyetoranUleController;
use App\Http\Controllers\RealisasiPenyetoranUtleController;
use App\Http\Controllers\UserController;
use App\Models\StoreProjection;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/welcome', function () {
        return view('admin.index');
    })->name('welcome');

    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/logout', [AdminController::class, 'destroy'])->name('admin.logout');
        Route::get('/profile', [AdminController::class, 'Profile'])->name('admin.profile');   
        Route::get('/profile/edit', [AdminController::class, 'EditProfile'])->name('edit.profile'); 
        Route::post('/profile/store', [AdminController::class,'StoreProfile'])->name('store.profile');
        
        Route::get('/change/password', [AdminController::class,'ChangePassword'])->name('change.password');
        Route::post('/update/password', [AdminController::class,'UpdatePassword'])->name('update.password');
    });

    Route::group(['prefix' => 'user'], function () {
        Route::get('/all', [UserController::class, 'index'])->name('user.all');
        Route::get('/add', [UserController::class, 'create'])->name('user.add');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/update', [UserController::class, 'update'])->name('user.update');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/allBanks', [UserController::class, 'getMasterBank'])->name('user.allBanks');

    });

    Route::group(['prefix' => 'proyeksi-penyetoran'], function () {
        // Stored Projection 
        Route::get('/index', [ProyeksiPenyetoranController::class, 'index'])->name('storeProjection.index');
        Route::get('/add', [ProyeksiPenyetoranController::class, 'create'])->name('storeProjection.add');
        Route::post('/store', [ProyeksiPenyetoranController::class, 'store'])->name('storeProjection.store');
        Route::get('/edit/{id}', [ProyeksiPenyetoranController::class, 'edit'])->name('storeProjection.edit');
        Route::get('/view/{id}', [ProyeksiPenyetoranController::class, 'show'])->name('storeProjection.view');
        Route::post('/update', [ProyeksiPenyetoranController::class, 'update'])->name('storeProjection.update');
        Route::get('/delete/{id}', [ProyeksiPenyetoranController::class, 'destroy'])->name('storeProjection.delete');
        
        // withdrawal Projection
    });

    Route::group(['prefix' => 'proyeksi-penarikan'], function () {
        // withdrawal Projection
        Route::get('/index', [ProyeksiPenarikanController::class, 'index'])->name('withdrawalProjection.index');
        Route::get('/add', [ProyeksiPenarikanController::class, 'create'])->name('withdrawalProjection.add');
        Route::post('/store', [ProyeksiPenarikanController::class, 'store'])->name('withdrawalProjection.store');
        Route::get('/edit/{id}', [ProyeksiPenarikanController::class, 'edit'])->name('withdrawalProjection.edit');
        Route::get('/view/{id}', [ProyeksiPenarikanController::class, 'show'])->name('withdrawalProjection.view');
        Route::post('/update', [ProyeksiPenarikanController::class, 'update'])->name('withdrawalProjection.update');
        Route::get('/delete/{id}', [ProyeksiPenarikanController::class, 'destroy'])->name('withdrawalProjection.delete');

    });

    Route::group(['prefix' => 'proyeksi-pemusnahan'], function () {
        // withdrawal Projection
        Route::get('/index', [ProyeksiPemusnahanController::class, 'index'])->name('destructionProjection.index');
        Route::get('/add', [ProyeksiPemusnahanController::class, 'create'])->name('destructionProjection.add');
        Route::post('/store', [ProyeksiPemusnahanController::class, 'store'])->name('destructionProjection.store');
        Route::get('/edit/{id}', [ProyeksiPemusnahanController::class, 'edit'])->name('destructionProjection.edit');
        Route::get('/view/{id}', [ProyeksiPemusnahanController::class, 'show'])->name('destructionProjection.view');
        Route::post('/update', [ProyeksiPemusnahanController::class, 'update'])->name('destructionProjection.update');
        Route::get('/delete/{id}', [ProyeksiPemusnahanController::class, 'destroy'])->name('destructionProjection.delete');

    });

    Route::group(['prefix' => 'realisasi-penarikan'], function () {
        // withdrawal Projection
        Route::get('/index', [RealisasiPenarikanController::class, 'index'])->name('withdrawalRealization.index');
        Route::get('/add', [RealisasiPenarikanController::class, 'create'])->name('withdrawalRealization.add');
        Route::post('/store', [RealisasiPenarikanController::class, 'store'])->name('withdrawalRealization.store');
        //Route::get('/edit/{id}', [ProyeksiPenyetoranController::class, 'edit'])->name('storeProjection.edit');
        Route::get('/view/{id}', [RealisasiPenarikanController::class, 'show'])->name('withdrawalRealization.view');
        Route::get('/delete/{id}', [RealisasiPenarikanController::class, 'destroy'])->name('withdrawalRealization.delete');
        //Route::post('/update', [ProyeksiPenyetoranController::class, 'update'])->name('storeProjection.update');
        //Route::get('/cek-proyeksi', [RealisasiPenarikanController::class, 'cekProyeksi'])->name('withdrawalRealization.cekProyeksi');
        
    });

    Route::group(['prefix' => 'realisasi-penyetoran-ule'], function () {
        // withdrawal Projection
        Route::get('/index', [RealisasiPenyetoranUleController::class, 'index'])->name('storeUleRealization.index');
        Route::get('/add', [RealisasiPenyetoranUleController::class, 'create'])->name('storeUleRealization.add');
        Route::post('/store', [RealisasiPenyetoranUleController::class, 'store'])->name('storeUleRealization.store');
        //Route::get('/edit/{id}', [ProyeksiPenyetoranController::class, 'edit'])->name('storeProjection.edit');
        Route::get('/view/{id}', [RealisasiPenyetoranUleController::class, 'show'])->name('storeUleRealization.view');
        //Route::post('/update', [ProyeksiPenyetoranController::class, 'update'])->name('storeProjection.update');
        Route::get('/delete/{id}', [RealisasiPenyetoranUleController::class, 'destroy'])->name('storeUleRealization.delete');
        
    });

    Route::group(['prefix' => 'realisasi-penyetoran-utle'], function () {
        // withdrawal Projection
        Route::get('/index', [RealisasiPenyetoranUtleController::class, 'index'])->name('storeUtleRealization.index');
        Route::get('/add', [RealisasiPenyetoranUtleController::class, 'create'])->name('storeUtleRealization.add');
        Route::post('/store', [RealisasiPenyetoranUtleController::class, 'store'])->name('storeUtleRealization.store');
        //Route::get('/edit/{id}', [ProyeksiPenyetoranController::class, 'edit'])->name('storeProjection.edit');
        Route::get('/view/{id}', [RealisasiPenyetoranUtleController::class, 'show'])->name('storeUtleRealization.view');
        //Route::post('/update', [ProyeksiPenyetoranController::class, 'update'])->name('storeProjection.update');
        Route::get('/delete/{id}', [RealisasiPenyetoranUtleController::class, 'destroy'])->name('storeUtleRealization.delete');
        
    });

    Route::group(['prefix' => 'realisasi-penyetoran'], function () {
        // withdrawal Projection
        Route::get('/index', [RealisasiPenyetoranController::class, 'index'])->name('storeRealization.index');
        Route::get('/add', [RealisasiPenyetoranController::class, 'create'])->name('storeRealization.add');
        Route::post('/store', [RealisasiPenyetoranController::class, 'store'])->name('storeRealization.store');
        //Route::get('/edit/{id}', [ProyeksiPenyetoranController::class, 'edit'])->name('storeProjection.edit');
        Route::get('/view/{id}', [RealisasiPenyetoranController::class, 'show'])->name('storeRealization.view');
        //Route::post('/update', [ProyeksiPenyetoranController::class, 'update'])->name('storeProjection.update');
        Route::get('/delete/{id}', [RealisasiPenyetoranController::class, 'destroy'])->name('storeRealization.delete');
        
    });

    Route::group(['prefix' => 'realisasi-pemusnahan'], function () {
        // withdrawal Projection
        Route::get('/index', [RealisasiPemusnahanController::class, 'index'])->name('destructionRealization.index');
        Route::get('/add', [RealisasiPemusnahanController::class, 'create'])->name('destructionRealization.add');
        Route::post('/store', [RealisasiPemusnahanController::class, 'store'])->name('destructionRealization.store');
        //Route::get('/edit/{id}', [RealisasiPemusnahanController::class, 'edit'])->name('destructionRealization.edit');
        Route::get('/view/{id}', [RealisasiPemusnahanController::class, 'show'])->name('destructionRealization.view');
        //Route::post('/update', [RealisasiPemusnahanController::class, 'update'])->name('destructionRealization.update');
        Route::get('/delete/{id}', [RealisasiPemusnahanController::class, 'destroy'])->name('destructionRealization.delete');
        
    });

    Route::group(['prefix' => 'my-request'], function () {
        Route::get('/index', [MyRequestController::class, 'index'])->name('myRequest.index');
        Route::get('/view/{id}', [MyRequestController::class, 'show'])->name('myRequest.view');
        Route::post('/store', [MyRequestController::class, 'store'])->name('myRequest.store');
    });

    Route::group(['prefix' => 'approval-history'], function () {
        Route::get('/index', [ApprovalHistoryController::class, 'index'])->name('approvalHistory.index');
        Route::get('/view/{id}', [ApprovalHistoryController::class, 'show'])->name('approvalHistory.view');
        Route::post('/store', [ApprovalHistoryController::class, 'store'])->name('approvalHistory.store');
    });

    Route::group(['prefix' => 'dashboard'], function () {
        Route::get('/projection', [DashboardProyeksiController::class, 'index'])->name('dashboardProjection.index');
        Route::get('/realization', [DashboardRealisasiController::class, 'index'])->name('dashboardRealization.index');
    });
});


require __DIR__.'/auth.php';
