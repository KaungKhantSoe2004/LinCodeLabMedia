@extends('layouts.app')
@section('body')



    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row mt-4">
          <div class="col-12">
         <div class=" row">
            <h5 class="col-3 p-2 my-2 offset-1">
                <i class="fas fa-list"></i> Total - {{$data->total()}}
            </h5>

           @if (request('key'))
           <h5 class="col-3 p-2 my-2 offset-5">
            <i class="fas fa-key"></i> Search Key - {{request('key')}}
        </h5>
           @endif
         </div>

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">User Table</h3>

{{-- <h5 class=" offset-1">
   Total <i class="fas fa-list"></i>
</h5> --}}


                <div class="card-tools">
                <form action="{{route('admin#adminList')}}" method="GET">
                    @csrf
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="key" class="form-control float-right" placeholder="Search">

                        <div class="input-group-append">
                          <button type="submit" class="btn btn-default">
                            <i class="fas fa-search"></i>
                          </button>
                        </div>
                      </div>
                </form>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">

                @if (session('accDel'))
                    <div class="alert alert-danger offset-7 my-3 col-5 alert-dismissible fade show" role="alert">
      <div class="">
        {{session('accDel')}}
      </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif



             <table class="table table-hover text-nowrap text-center">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($data as $a)
                    <tr>
                        <td>{{$a->id}}</td>
                        <td>{{$a->name}}</td>
                        <td>{{$a->email}}</td>
                        <td>{{$a->phone}}</td>
                        <td>{{$a->address}}</td>
                        <td>{{$a->gender}}</td>
                        <td>
                          {{-- <button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button> --}}
                     @if ($a->id !== Auth::user()->id)
                     <a href="{{route('admin#accountDelete',$a->id)}}">
                        <button class="btn btn-sm bg-danger text-white">

                            <i class="fas fa-trash-alt"></i>

                     </button>
                     </a>
                     @endif
                        </td>
                      </tr>
                  @endforeach


                </tbody>

              </table>

              </div>

              <!-- /.card-body -->
            </div>
            {{
                $data->appends(request()->query())->links()
            }}
            <!-- /.card -->
          </div>
        </div>

      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection
