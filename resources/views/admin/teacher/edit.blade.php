@extends('layouts.global')
@section('title') Edit Teacher @endsection 

@section('content')

<div class="col-md-8">
  @if(session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
  @endif 

  <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('teacher.update', ['id'=>$teacher->id_teacher])}}" method="POST">
    @csrf
    <input type="hidden" value="PUT" name="_method">
        <label for="full_name">Full Name :</label>
            <input value="{{$teacher->full_name}}" class="form-control" placeholder="Full Name" type="text" name="full_name" id="full_name"/><br>
        <label for="date_of_birth">Date of Birth :</label>
            <input value="{{$teacher->date_of_birth}}" class="form-control" placeholder="01/01/2000" type="date" name="date_of_birth" id="birth"/><br>
        <label for="place_of_birth">Place of Birth :</label>
            <input value="{{$teacher->place_of_birth}}" class="form-control" placeholder="place_of_birth" type="text" name="place_of_birth" id="place_of_birth"/><br>
        <label for="address">Address :</label>
            <input value="{{$teacher->address}}" class="form-control" placeholder="Jl. Damai" type="text" name="address" id="address"/><br>
        <label for="phone">Phone :</label>
            <input value="{{$teacher->phone}}" class="form-control" placeholder="089898989890" type="number" name="phone" id="phone"/><br>
        <label for="email">Email :</label>
            <input value="{{$teacher->email}}" class="form-control" placeholder="blabla@gmail.com" type="email" name="email" id="email"/><br>
    <input class="btn btn-primary" type="submit" value="Save"/>
  </form>
</div>
@endsection 