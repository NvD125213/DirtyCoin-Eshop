<?php

namespace App\Http\Controllers;

use App\Models\tb_invoice;
use Illuminate\Http\Request;

class tb_invoice_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index(Request $request)
    { 

    }

  
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
    
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
    public function show(tb_invoice $tb_invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tb_invoice $tb_invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tb_invoice $tb_invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tb_invoice $tb_invoice)
    {
        //
    }
}
