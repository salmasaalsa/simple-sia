@extends("layouts.global")
@section("title") Create New Student Attendance @endsection
@section("content")

  <div class="col-md-8">
        @if(session('status'))
        <div class="alert alert-success">
          {{session('status')}}
        </div>
      @endif
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('presences.store')}}" method="POST">
      @csrf

         <label for="name">Student Name :</label>
        <input class="form-control" type="text" name="name" id="name"/><br>
        <label for="name">Date :</label>
        <input class="form-control" type="date" name="date" id="date"/><br>
        <label for="">Status :</label><br>
           <select name="status" id="status">
                <option>Masuk</option>
                <option>Izin</option>
                <option>Alfa</option>
           </select>
                    <br><br>
        <div class="clearfix"></div>
      <input class="btn btn-primary" type="submit" value="Save"/>
    </form>
  </div>

@endsection
