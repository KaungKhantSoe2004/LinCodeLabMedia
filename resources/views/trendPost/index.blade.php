@extends('layouts.app')
@section('body')
<table class="table table-hover text-nowrap text-center">
    <thead>
      <tr>
        <th> ID</th>
        <th>Title</th>
        <th>Image</th>
        <th>View Count</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
     @foreach ($posts as $p)
     <tr>
        <td>{{$p->post_id}}</td>
        <td>{{$p->title}}</td>
        <td class=" col-3">
            @if ($p->image === null)
             <img src="{{asset('defaultImage/default')}}" alt="">
            @else
            <img src="{{asset('img/'.$p->image)}}" style=" width: 100px ;height: 100px" alt="">
            @endif
            </td>
            <td>
             <i class=" fas fa-eye"></i>   {{$p->count}}
            </td>
        <td>

            <a href="{{route('admin#postDetails',$p->post_id)}}">    <button class="btn  btn-sm bg-dark text-white"><i class="fas p-2 fa-info"></i></button></a>
          {{-- <button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button> --}}
        </td>
      </tr>
     @endforeach

    </tbody>
  </table>
@endsection
