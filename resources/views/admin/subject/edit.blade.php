@extends('layouts.global')
@section('title') Edit Teacher @endsection 

@section('content')

<div class="col-md-8">
  @if(session('status'))
    <div class="alert alert-success">
      {{session('status')}}
    </div>
  @endif 

  <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('subject.update', ['id'=>$subject->id_subject])}}" method="POST">
    @csrf
    <input type="hidden" value="PUT" name="_method">
        <label for="full_name">Subject Name :</label>
            <input value="{{$subject->subject}}" class="form-control" placeholder="Subject Name" type="text" name="subject" id="subject"/><br>
        <input class="btn btn-primary" type="submit" value="Save"/>
  </form>
</div>
@endsection 