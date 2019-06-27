@extends('layouts.global')
@section('title') Detail Teacher User @endsection 
@section('content')

<div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <b>Full Name :</b> <br>
            {{$teacher->full_name}}
            <br><br>
        <b>Date of Birth :</b> <br>
            {{$teacher->date_of_birth}}
            <br><br>
        <b>Place of Birth :</b> <br>
            {{$teacher->place_of_birth}}
            <br><br>
        <b>Address :</b> <br>
            {{$teacher->address}}
            <br><br>
        <b>Phone :</b> <br>
            {{$teacher->phone}}
            <br><br>
        <b>Email :</b> <br>
            {{$teacher->email}}
            <br><br>
      </div>
    </div>
  </div>



@endsection