@extends('layout.dashboard')
@section('content')   
    <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-1">
              <h6>{{ $pages }}</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="container">
                <form role="form text-left" method="POST" action="{{ route('post.update', $post->id) }}">
                @csrf
                @method('PUT')
                  <div class="mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $post->title }}" aria-label="Name" aria-describedby="email-addon">
                    @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <textarea name="content" class="form-control" placeholder="Content" value="{{ $post->content }}" rows="5">{{ $post->content }}</textarea>
                    @if ($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <input type="text" name="slug" class="form-control" placeholder="Slug" value="{{ $post->slug }}" aria-label="Password" aria-describedby="password-addon">
                    @if ($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif  
                  </div>
                  <select class="form-select" name="status" aria-label="Default select example">
                    <option value="{{ $post->status }}" selected>{{ $post->status }}</option>
                    <option value="draft">Draft</option>
                    <option value="publish">Publish</option>
                    @if ($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
                  </select>
                  <div class="mb-3 text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Update Post</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection