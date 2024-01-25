@extends('layouts.app')
@section('body')


<section class="content">
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-10 offset-1 mt-5">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <legend class="text-center">Change Password</legend>
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
                    <form class="form-horizontal" action="{{route('admin#updatePassword')}}" method="POST">
@csrf

                      <div class="form-group row">
                        <div for="inputName" class="col-sm-2 col-form-label">Old Password</div>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="oldPassword"  placeholder="Enter Your Old Password ...">
@if (session('noMatch'))
   <div class=" text-danger">{{session('noMatch')}}</div>
@endif
                          @error('oldPassword')
                           <div class=" text-danger">
                            {{$message}}
                           </div>
                        @enderror
                        </div>
                      </div>


                      <div class="form-group  row">
                        <div  class="col-sm-2 col-form-label">New Password</div>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="newPassword"  placeholder="Enter Your New Password ...">
                          @error('newPassword')

                          <div class=" text-danger">
                           {{$message}}
                          </div>
                       @enderror
                        </div>
                      </div>


                      <div class="form-group row">
                        <div class="col-sm-2 col-form-label"> Password Confirmation</div>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="againPassword"  placeholder="Enter Your New Password Again...">
                          @error('againPassword')

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
