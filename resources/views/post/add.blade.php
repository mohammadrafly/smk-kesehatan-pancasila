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
                <form role="form text-left" method="POST" action="{{ route('post.add.proses') }}">
                @csrf
                  <div class="mb-3">
                    <input type="text" name="title" class="form-control" placeholder="Title" aria-label="Name" aria-describedby="email-addon">
                    @if ($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <textarea name="content" class="form-control" placeholder="Content" aria-label="Email" aria-describedby="email-addon" rows="5" placeholder="Content"></textarea>
                    @if ($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <input type="text" name="slug" class="form-control" placeholder="Slug" aria-label="Password" aria-describedby="password-addon">
                    @if ($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif  
                  </div>
                  <div class="mb-3">
                    
                    <select class="form-select" name="id_category" aria-label="Default select example">
                        <option selected>Category</option>
                        @foreach ($category as $cat)
                        <option value="{{ $cat->id }}">{{ $cat->category }}</option>
                        @endforeach
                        @if ($errors->has('status'))
                        <span class="text-danger">{{ $errors->first('status') }}</span>
                        @endif
                    </select>
                    
                  </div>
                  <select class="form-select" name="status" aria-label="Default select example">
                    <option selected>Status</option>
                    <option value="draft">Draft</option>
                    <option value="publish">Publish</option>
                    @if ($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                    @endif
                  </select>
                  <div class="mb-3 text-center">
                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Add Post</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection