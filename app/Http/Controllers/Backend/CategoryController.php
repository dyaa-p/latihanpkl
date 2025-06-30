<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Alert;
use Str;

class CategoryController extends Controller
{

    public function index()
    {
        $category = Category::latest()->get();

        $title = 'Hapus Data!';
        $text = "Apakah Anda Yakin?";
        confirmDelete($title, $text);
        
        return view ('backend.category.index', compact('category'));
    }

    public function create()
    {
        return view ('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validasi

        $validated = $request->validate([
            'name' =>'required|unique:categories',
        ]);
        //import

        $category = new Category();
        $category->name =$request->name;
        $category->slug =Str::slug($request->name, '-');
        $category->save();
        toast('Data Berhasil Disimpan', 'success');
        return redirect()->route('backend.category.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'name' =>'required',
        ]);

        $category = Category::findOrFail($id);
        $category->name =$request->name;
        $category->slug =Str::slug($request->name, '-');
        $category->save();
        toast('Data Berhasil Diedit', 'success');
        return redirect()->route('backend.category.index');
    }

    public function destroy(string $id)
    {
        $category = Category::findOrFaild($id);
        $category->delete();
        toast('Data berhasil Dihapus', 'success');
        return redirect()->route('backend.category.index');
    }
}
