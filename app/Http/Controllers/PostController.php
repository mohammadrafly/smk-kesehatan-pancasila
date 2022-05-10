<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title'         => 'required',
            'content'       => 'required',
            'slug'          => 'required',
            'status'        => 'required',
            'id_category'   => 'required',
        ]);
           
        $data = $request->all();
        $model = Post::create($data);
        return redirect('post')->withSuccess('Berhasil menambahkan Post');
    }

    public function delete(Request $request)
    {
        $id = $request->id;
        $model = Post::where('id', $id)->delete();
        return redirect('post')->withSuccess('Berhasil menghapus Post');
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $model = Post::where('id', $id)->update([
            'title'         => $request->title,
            'content'       => $request->content,
            'slug'          => $request->slug,
            'status'        => $request->status,
            'id_category'   => $request->id_category
        ]);
        return redirect('post')->withSuccess('Berhasil menambahkan Post');
    }

    public function edit(Request $request)
    {
        $id = $request->id;
        return view('post.edit', [
            'user' => Auth::user()->email,
            'pages'=> 'Edit Post',
            'post' => Post::where('id' , $id)->first(),
        ]);
    }
}
