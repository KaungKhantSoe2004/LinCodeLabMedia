@extends('layouts.app')
@section('body')
<section class="content">
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-12">
@if (session('categoryAdded'))
<div class="alert alert-success offset-7 my-3 col-5 alert-dismissible fade show" role="alert">
    <div class="">
      {{session('categoryAdded')}}
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
                <a href="{{route('admin#categoryAddPage')}}"> <button class="btn btn-sm btn-outline-dark">Add Category</button></a>

              </h3>

              <div class="card-tools">
                <form action="{{route("admin#category")}}" method="GET">
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
              <table class="table table-hover text-nowrap text-center">
                <thead>
               <tr>
                <th>Category ID</th>
                <th>Category Title</th>
                <th>Category Description</th>
                <th>Created At</th>
                <th></th>
               </tr>
                </thead>
                <tbody>
                    @foreach ($data as $c)
                    <tr>
                       <td>{{$c->category_id}}</td>
                       <td>{{$c->title}}</td>
                       <td>{{Str::of($c->description)->limit(40)}}</td>
                       <td>{{$c->created_at->format('d-M-Y')}}</td>
                       <td>
                          <a href="{{route('admin#categoryEditPage',  $c->category_id)}}">
                            <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button>
                        </a>
                 <a href="{{route('admin#categoryDelete', $c->category_id)}}">
                    <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash"></i></button>
                </a>
                       </td>
                     </tr>
                    @endforeach




                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

            {{
                $data->appends(request()->query())->links()
            }}

        </div>
      </div>

    </div><!-- /.container-fluid -->
  </section>
@endsection
