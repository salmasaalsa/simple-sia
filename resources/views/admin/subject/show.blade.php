@extends('layouts.global')
@section('title') Detail Subject Name @endsection 
@section('content')

<div class="col-md-8">
    <div class="card">
      <div class="card-body">
        <b>Subject Name :</b> <br>
            {{$subject->subject}}
            <br><br>
      </div>
    </div>
  </div>



@endsection