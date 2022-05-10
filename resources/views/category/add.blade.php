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
                <form role="form text-left" method="POST" action="{{ route('category.add.proses') }}">
                @csrf
                  <div class="mb-3">
                    <input type="text" name="category" class="form-control" placeholder="Category" aria-label="Name" aria-describedby="email-addon">
                    @if ($errors->has('category'))
                    <span class="text-danger">{{ $errors->first('category') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <textarea name="description" class="form-control" placeholder="Description" aria-label="Email" aria-describedby="email-addon" rows="5" placeholder="description"></textarea>
                    @if ($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                    @endif
                  </div>
                  <div class="mb-3">
                    <input type="text" name="slug" class="form-control" placeholder="Slug" aria-label="Password" aria-describedby="password-addon">
                    @if ($errors->has('slug'))
                    <span class="text-danger">{{ $errors->first('slug') }}</span>
                    @endif  
                  </div>
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