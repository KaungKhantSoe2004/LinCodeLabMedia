@extends('layouts.app')
@section('body')
<section class="content">
    <div class="container-fluid">
      <div class="row mt-4">
        <div class="col-8 offset-3 mt-5">
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <legend class="text-center">User Profile</legend>
              </div>
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">

                    @if (session('updateSuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <div class="">
        {{session('updateSuccess')}}
      </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif


 @if (session('changePass'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
      <div class="">
        {{session('changePass')}}
      </div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                    @endif

                    <form class="form-horizontal" action="{{route('admin#updateAdminProfile')}}" method="POST">
@csrf

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="adminName" value="{{old('adminName',$data->name)}}"  placeholder="Enter Your Name ...">

                          @error('adminName')
                           <div class=" text-danger">

                            {{$message}}
                           </div>
                        @enderror
                        </div>
                      </div>


                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="adminEmail" value="{{old('adminEmail',$data->email)}}"  placeholder="Enter Your Email ...">
                          @error('adminEmail')

                          <div class=" text-danger">
                           {{$message}}
                          </div>
                       @enderror
                        </div>
                      </div>



                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Phone</label>
                        <div class="col-sm-10">
                          <input type="number" class="form-control" name="adminPhone" value="{{old('adminPhone',$data->phone)}}"  placeholder="Enter Your Phone Number ...">
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-10">
                          <textarea  class="form-control " name="adminAddress"  placeholder="Enter Your Address ...">
                            {{old('adminAddress',$data->address)}}
                          </textarea>
                        </div>
                      </div>

                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Gender</label>
                        <div class="col-sm-10">
                        <select name="adminGender" class=" form-control" id="">
                            <option value="male" @if ($data->gender === 'male')
                                selected
                               @endif >Male</option>
                            <option
                            @if ($data->gender === "female")
                             selected
                            @endif
                            value="female">Female</option>
                            <option @if ($data->gender === null)
                             selected
                            @endif >Choose Gender</option>
                        </select>
                        </div>
                      </div>


                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn bg-dark text-white">Update</button>
                        </div>
                      </div>

                      <div class="form-group row mt-2">
                        <div class="offset-sm-2 col-sm-10">
                          <a href="{{route("admin#changePasswordPage",Auth::user()->id)}}">Change Password</a>
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
