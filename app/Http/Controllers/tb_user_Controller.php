<?php

namespace App\Http\Controllers;

use App\Models\tb_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class tb_user_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('Users.login');
    }

    public function postLogin(Request $request) {
   
        $remember = $request->has('remember') ? true : false;
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            return redirect()->to('Admins.home');
        }
        else{

        }
    
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
    public function show(tb_user $tb_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tb_user $tb_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tb_user $tb_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tb_user $tb_user)
    {
        //
    }
}
