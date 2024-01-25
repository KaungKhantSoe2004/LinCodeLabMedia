@extends('layouts.app')
@section('body')


<section class="content">
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-10 offset-2 mt-5">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <legend class="text-center"> + Add Post</legend>
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
                    <form class="form-horizontal" action="{{route('admin#addPost')}}" method="POST" enctype="multipart/form-data">
@csrf

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="title"  placeholder="Enter Your Post Title...">
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
                        <label class="col-sm-2 col-form-label"> Post Img</label>
                        <div class="col-sm-10 py-2">
                            <input type="file" class=" form-input" name="image"  placeholder="Enter Your Post Img...">
                            {{-- @if (session('noMatch'))
                               <div class=" text-danger">{{session('noMatch')}}</div>
                            @endif --}}
                                                      @error('image')
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
                          <textarea  class=" form-control" name="description" placeholder="Enter Your Post Description" id="" cols="30" rows="10"></textarea>
                          @error('description')
                          <div class=" text-danger">
                           {{$message}}
                          </div>
                       @enderror
                        </div>
                      </div>


                      <div class="form-group row">
                        <label class="col-sm-2 col-form-label"> Post Category</label>
                        <div class="col-sm-10">
                           <select name="category" class=" form-control" id="">
                            <option value="">Choose a Category</option>
                        @foreach ($categories as $ca)
                        <option value="{{$ca->category_id}}"> {{$ca->title}} </option>
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
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn bg-dark text-white">Save</button>
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
