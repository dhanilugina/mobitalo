<?php

namespace App\Http\Controllers;

use App\Models\MasterBank;
use App\Models\Roles;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('user.list-user-all',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allBanks = MasterBank::all();
        $roles = Roles::all();
        return view('user.form-user-add', compact('allBanks','roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            ]);
            
            $defaultPassword = '12345678';
            $status = '1';
            $img = '';
            
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($defaultPassword),
                'status' => $status,
                'bank_name' => $request->bank_name,
                'bank_class' => $request->bank_class,
                'roles' => $request->roles,
                'status' => $status,
                'created_at' => now(),
                'profile_image' => $img
            ]);

            $notification = array(
                'message' => 'User Created Successfully', 
                'alert-type' => 'success'
            );
            return redirect()->route('user.all')->with($notification);

        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        return view('user.form-user-detail',compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $user_id = $request->id;

        User::findOrFail($user_id)->update([
            'name' => $request->name,
            'updated_by' => Auth::user()->name,
            'updated_at' => Carbon::now(), 

        ]);

         $notification = array(
            'message' => 'Users Updated Successfully', 
            'alert-type' => 'success'
        );

        return redirect()->route('user.all')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

}
