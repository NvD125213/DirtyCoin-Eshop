<?php

namespace App\Http\Controllers;

use App\Models\tb_categories;
use Illuminate\Http\Request;
use App\Components\Recusive;


class tb_categories_Controller extends Controller
{
    private $categories;

    public function __construct(tb_categories $categories) {
        $this -> categories = $categories;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $category = $this->categories->orderBy('id')->paginate(5);
        return view('categories.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     */
 
    public function create()
    {
        $data = $this->categories->all();
        $rescusive = new Recusive($data);
        $htmlOptions = $rescusive->categoriesRescusive($parentid=null);
        return view('categories.add', compact('htmlOptions'));
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->categories->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id

        ]);
        return redirect()->route('categories.index')->with('message','Thêm thành công!');

    }

    /**
     * Display the specified resource.
     */
    public function show(tb_categories $tb_categories)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = $this->categories->find($id);
        $htmlOptions = $this->getCategory($category->parent_id);
        return view('categories.edit', compact('category','htmlOptions'));

    }

    public function getCategory($parentid) {
        $data = $this->categories->all();
        $rescusive = new Recusive($data);
        $htmlOptions = $rescusive->categoriesRescusive($parentid);
        return $htmlOptions;
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $this->categories->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id
        ]);
        return redirect()->route('categories.index')->with('message_edit','Sửa thành công!');
    }

    public function delete($id) {
        $this->categories->find($id)->delete();
        return redirect()->route('categories.index')->with('message_delete','Xóa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tb_categories $tb_categories)
    {
        //
    }
}
