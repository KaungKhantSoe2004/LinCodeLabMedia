@extends('layouts.app')
@section('body')


<section class="content">
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-10 offset-2 mt-5">
          <div class="col-md-9">
  {{-- <a href="{{route('admin#back')}}"> --}}
    <button onclick="history.back()" class=" mb-4 btn btn-danger">  Back</button>
</a>
            <div class="card">

              <div class="card-header p-2">
                <legend class="text-center"> Edit Post</legend>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    {{-- @if (session('updateSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <div class="">
        {{session('updateSuccess')}}
      </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif --}}
                    <form class="form-horizontal" action="{{route('admin#updatePost')}}" enctype="multipart/form-data"  method="POST">
@csrf

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="hidden" value="{{$data->post_id}}" name="id">
                          <input type="text" class="form-control" value="{{old('title', $data->title)}}" name="title"  placeholder="Edit Your Category Title...">
{{-- @if (session('noMatch'))
   <div class=" text-danger">{{session('noMatch')}}</div>
@endif --}}
                          @error('title')
                           <div class=" text-danger">
                            {{$message}}
                           </div>
                        @enderror
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">

                            <input class=" form-control" name="image" type="file">
                          {{-- <textarea  class=" form-control" name="description" placeholder="Edit Your Category Description" id="" cols="30" rows="10">{{
                            old('description', $data->description)
                            }}</textarea> --}}
                          @error('image')
                          <div class=" text-danger">
                           {{$message}}
                          </div>
                       @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Category Type</label>
                        <div class="col-sm-10">

<select name="category" class=" form-control" id="">

    <option value="" >Choose A Category Type</option>
    @foreach ($categories as $e)
     <option @if ($e->category_id === $data->category_id)
         selected
     @endif value="{{$e->category_id}}">{{$e->title}}</option>
    @endforeach
</select>
                          @error('category')
                          <div class=" text-danger">
                           {{$message}}
                          </div>
                       @enderror
                        </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          {{-- <textarea  class=" form-control" placeholder="Enter Your Category Description" name="description"> --}}

                          {{-- </textarea> --}}
                          <textarea  class=" form-control" name="description" placeholder="Edit Your Category Description" id="" cols="30" rows="10">{{
                            old('description', $data->description)
                            }}</textarea>
                          @error('description')
                          <div class=" text-danger">
                           {{$message}}
                          </div>
                       @enderror
                        </div>
                      </div>




                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn bg-dark text-white">Update</button>
                        </div>
                      </div>



                    </form>

                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


@endsection
