{{-- @extends('layouts.app')
@section('body')
<table class="table table-hover text-nowrap text-center">
    <thead>
      <tr>
        <th>Carrier ID</th>
        <th>Name</th>
        <th>Phone Number</th>
        <th>Address</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Vegatable</td>
        <td>11-7-2014</td>
        <td>
          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
        </td>
      </tr>
      <tr>
        <td>2</td>
        <td>Seafood</td>
        <td>11-7-2014</td>
        <td>
          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
        </td>
      </tr>
       <tr>
        <td>3</td>
        <td>Thailand</td>
        <td>11-7-2014</td>
        <td>
          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
        </td>
      </tr>
      <tr>
        <td>4</td>
        <td>USA</td>
        <td>11-7-2014</td>
        <td>
          <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
          <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button>
        </td>
      </tr>
    </tbody>
  </table>
@endsection --}}
@extends('layouts.app')
@section('body')
<section class="content">
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12">
@if (session('postAdded'))
<div class="alert alert-success offset-7 my-3 col-5 alert-dismissible fade show" role="alert">
    <div class="">
      {{session('postAdded')}}
    </div>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
@endif

@if (session('updated'))
<div class="alert alert-primary offset-7 my-3 col-5 alert-dismissible fade show" role="alert">
    <div class="">
      {{session('updated')}}
    </div>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
@endif

@if (session('deleted'))
<div class="alert alert-danger offset-7 my-3 col-5 alert-dismissible fade show" role="alert">
    <div class="">
      {{session('deleted')}}
    </div>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
@endif

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <a href="{{route('admin#directAddPost')}}"> <button class="btn btn-sm btn-outline-dark">Add Post</button></a>

              </h3>

              <div class="card-tools">
                <form action="#" method="GET">
                <div class="input-group input-group-sm" style="width: 150px;">

                        <input type="text" name="key" class="form-control float-right" placeholder="Search">

                        <span class="input-group-append">


                          <button type="submit" class="btn btn-default">
                              <i class="fas fa-search"></i>
                            </button>

                        </span>


                </div>
                </form>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
            @if ($data->count() === 0)
              <h3 class=" text-center my-4" >There is no Posts.Post A new ones.</h3>
            @else
            <table class="table table-hover text-nowrap text-center">
                <thead>
               <tr>
                <th>Post ID</th>
                <th>Post Img</th>
                <th>Post Title</th>
                <th>Category Description</th>
                <th>Post Category</th>
                <th>Created At</th>
                <th></th>
               </tr>
                </thead>
                <tbody>
                    @foreach ($data as $c)
                    <tr>
                       <td>{{$c->post_id}}</td>
                       <td class=" col-3">
                       @if ($c->image === null)
                        <img src="{{asset('defaultImage/default')}}" alt="">
                       @else
                       <img src="{{asset('img/'.$c->image)}}" style=" width: 100px ;height: 100px" alt="">
                       @endif
                       </td>
                       <td>{{$c->title}}</td>
                       <td>{{Str::of($c->description)->limit(40)}}</td>
                       <td>{{$c->category_id}}</td>
                       <td>{{$c->created_at->format('d-M-Y')}}</td>
                       <td>
                          <a href="{{route('admin#postEditPage',  $c->post_id)}}">
                            <button class="btn btn-sm bg-secondary text-white"><i class="fas fa-edit"></i></button>
                        </a>
                 <a href="{{route('admin#postDelete', $c->post_id)}}">
                    <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash"></i></button>
                </a>
             <a href="{{route('admin#postDetails',$c->post_id)}}">
                <button class="btn btn-sm bg-dark text-white"><i class="fas fa-info"></i></button>
            </a>
                       </td>
                     </tr>
                    @endforeach




                </tbody>
              </table>
            @endif
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

            {{-- {{
                $data->appends(request()->query())->links()
            }} --}}

        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
@endsection
