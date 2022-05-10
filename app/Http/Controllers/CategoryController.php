<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'category'     => 'required',
            'description'   => 'required',
            'slug'      => 'required',
        ]);
           
        $data = $request->all();
        $model = Category::create($data);
        return redirect('category')->withSuccess('Berhasil menambahkan Category');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $model = Category::where('id', $id)->delete();
        return redirect('category')->withSuccess('Berhasil menghapus Category');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $model = Category::where('id', $id)->update([
            'category'     => $request->category,
            'description'   => $request->description,
            'slug'      => $request->slug,
        ]);
        return redirect('category')->withSuccess('Berhasil menambahkan Category');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        return view('category.edit', [
            'user' => Auth::user()->email,
            'pages'=> 'Edit Category',
            'category' => Category::where('id' , $id)->first(),
        ]);
    }
}
