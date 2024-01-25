@extends('layouts.app')
@section('body')

<div class=" p-5">

    <div class=" col-10 mt-3 offset-1  ">
        <h4 > <i class="  ms-4 fas fa-arrow-left" onclick="history.back()"></i></h4>
        <div class=" card-header d-flex justify-content-center">
<img src="{{asset('img/'.$data->image)}}" style=" width: 400px; height: 400px" alt="">

        </div>
        <div class=" card-body">
<div>
    <h3>{{$data->title}}</h3>
</div>
<div>
    <div >{{$data->description}}</div>
</div>
        </div>
    </div>

</div>
@endsection
