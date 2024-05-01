<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoresliderRequest;
use App\Models\tb_slides;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class tb_slides_Controller extends Controller
{
    use StorageImageTrait;
    private $slider; 
    public function __construct(tb_slides $slider) {
        $this->slider = $slider;
    }
    public function index()
    {
        $slider = $this->slider->paginate(5);
        return view('Slider.index', compact('slider'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Slider.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoresliderRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'link', 'slider');
    
            if(!empty($dataImageSlider)) {
                $data['link'] = $dataImageSlider['file_path'];
                $data['image'] = $dataImageSlider['file_name'];
            }
            $this->slider->create($data);
            return redirect()->route('slider.index');
    
        }
        catch(Exception $ex) {
            Log::error('Lỗi: ' . $ex->getMessage() . 'Dòng: ' . $ex->getLine());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(tb_slides $tb_slides)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $sliders = $this->slider->find($id);
        return view('Slider.edit', compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoresliderRequest $request, $id)
    {
        try {
            $dataUpdate = [
                'name' => $request->name,
                'description' => $request->description
            ];
            $dataImageSlider = $this->storageTraitUpload($request, 'link', 'slider');
    
            if(!empty($dataImageSlider)) {
                $dataUpdate['link'] = $dataImageSlider['file_path'];
                $dataUpdate['image'] = $dataImageSlider['file_name'];
            }
            $this->slider->find($id)->update($dataUpdate);
            return redirect()->route('slider.index');
    
        }
        catch(Exception $ex) {
            Log::error('Lỗi: ' . $ex->getMessage() . 'Dòng: ' . $ex->getLine());
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */

    public function delete($id) {
        try {
            $this->slider->find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], status:200);

            
        }
        catch(Exception $ex) {
            Log::error('Message' . $ex->getMessage() . 'Line: ' . $ex->getLine());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], status:500);
        }
    }
    public function destroy(tb_slides $tb_slides)
    {
        //
    }
}
