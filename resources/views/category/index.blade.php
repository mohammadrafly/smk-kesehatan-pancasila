@extends('layout.dashboard')
@section('content')
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-1">
              <h6>{{ $pages }}</h6>
              <a class="btn bg-gradient-dark mb-0" href="{{ route('category.add') }}"><i class="fas fa-plus"></i>&nbsp;&nbsp;Add New Card</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center justify-content-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Content</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Slug</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Option</th>
                    </tr>
                  </thead>
                  <tbody>
                  @foreach ($category as $p)
                    <tr>
                      <td>
                        <div class="d-flex px-2">
                          <div>
                            <img src="{!! asset('assets_backend/img/small-logos/logo-spotify.svg') !!}" class="avatar avatar-sm rounded-circle me-2" alt="spotify">
                          </div>
                          <div class="my-auto">
                            <h6 class="mb-0 text-sm">{{ $p->category }}</h6>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="text-sm font-weight-bold mb-0">{{\Illuminate\Support\Str::limit($p->description, 20)}}</p>
                      </td>
                      <td>
                        <span class="text-xs font-weight-bold">{{ $p->slug }}</span>
                      </td>
                      <td>
                          <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="{{ route('category.delete', $p->id)}}"><i class="far fa-trash-alt"></i>Delete</a>
                          <a class="btn btn-link text-dark px-3 mb-0" href="{{ route('category.edit', $p->id)}}"><i class="fas fa-pencil-alt text-dark" aria-hidden="true"></i>Edit</a>
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                {{-- Pagination --}}
                <div class="d-flex justify-content-center">
                    {!! $category->links() !!}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection