<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function edit()
    {
        return view('admin.auth.profile');

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        //
        $user = Auth::user();

        $user->name = $request->name;
        $user->email = $request->email;
        # code...
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        if ($user) {
            return redirect()->back()->with('success', 'Profile Updated Successfully');
        }else{
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    function allUsers()
    {
        $allUsers = User::all();
        if ($allUsers) {
            return response()->json([
                'result' => 'success',
                'allUsers' => $allUsers
            ]);
        } else {
            return response()->json([
                'result' => 'error',
                'msg' => 'Somthing Went Wrong'
            ]);
        }
    }
}
