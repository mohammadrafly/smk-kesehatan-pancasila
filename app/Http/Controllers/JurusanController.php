<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Jurusan;
use Illuminate\Support\Facades\Auth;

class JurusanController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'content'       => 'required',
            'slug'          => 'required',
        ]);
           
        $data = $request->all();
        $model = Jurusan::create($data);
        return redirect('jurusan')->withSuccess('Berhasil menambahkan Jurusan');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $model = Jurusan::where('id', $id)->delete();
        return redirect('jurusan')->withSuccess('Berhasil menghapus Jurusan');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $model = Jurusan::where('id', $id)->update([
            'title'         => $request->title,
            'content'       => $request->content,
            'slug'          => $request->slug,
        ]);
        return redirect('jurusan')->withSuccess('Berhasil menambahkan Jurusan');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        return view('jurusan.edit', [
            'user' => Auth::user()->email,
            'pages'=> 'Edit Jurusan',
            'jurusan' => Jurusan::where('id' , $id)->first(),
        ]);
    }
}
