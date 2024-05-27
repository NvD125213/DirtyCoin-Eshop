<?php

namespace App\Http\Controllers;

use App\Models\tb_configurations;
use Illuminate\Http\Request;

class tb_configurations_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private $config;
    public function __construct(tb_configurations $config) {
        $this->config = $config;
    }
    public function index()
    {
        $configs = $this->config->orderBy('id')->paginate(5);
        return view('Settings.index', compact('configs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Settings.add');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->config->create([
            'name' => $request->name,
            'value' => $request->value
        ]);
        return redirect()->route('settingIndex')->with('message','Thêm thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(tb_configurations $tb_configurations)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // Hiện bảng edit
        $configs = $this->config->findOrFail($id);
        return view('Settings.edit', compact('configs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Thực hiện update
        $this->config->find($id)->update([
            'name' => $request->name,
            'value' => $request->value
        ]);
        return redirect()->route('settingIndex')->with('message_edit','Sửa thành công!');

    }
    public function delete($id) {
        $this->config->find($id)->delete();
        return redirect()->route('settingIndex')->with('message_delete','Xóa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tb_configurations $tb_configurations)
    {
        //
    }
}
