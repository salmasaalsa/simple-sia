@extends("layouts.global")
@section("title") Create New Subject @endsection
@section("content")

  <div class="col-md-8">
        @if(session('status'))
        <div class="alert alert-success">
          {{session('status')}}
        </div>
      @endif 
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('subject.store')}}" method="POST">
      @csrf
        <label for="name">Subject Name :</label>
            <input class="form-control" type="text" name="subject" id="subject"/><br>
            <br><br>
      <input class="btn btn-primary" type="submit" value="Save"/>
    </form>
  </div>

@endsection